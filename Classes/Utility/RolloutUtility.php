<?php


class Tx_Rollout_Utility_RolloutUtility {

	protected $config = null;

	protected $cookieKey = 'tx_rollout';

	protected $defaultLifetime = 2592000; // 30 Tage (60*60*24*30)

	/**
	 * Loades The Extension Configuration
	 * @return array the configuration Array
	 */
	public function loadConfiguration(){
		if($this->config!==null) { // Configuration is already loaded don't do that again
			return;
		}
		if(isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rollout'])){
			$this->config = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rollout'];
		}else{
			$this->config = array(
				'features' => array()
			);
		}
	}

	/**
	 * Returns the Configuration of the extension
	 * @return array configuration Array
	 */
	public function getConfiguration(){
		$this->loadConfiguration();
		return $this->config;
	}

	/**
	 * returns the Configuration of a Specified Feature
	 * @param  string $feature the feature identifier
	 * @return array          the feature configuration
	 */
	public function getFeatureConfiguration($feature){
		if(isset($this->config['features'][$feature])){
			return $this->config['features'][$feature];
		}
	}

	/**
	 * Initalizies Features
	 * @return null
	 */
	public function initializeFeatures(){
		foreach ($this->config['features'] as $name => $featureConfiguration){
			$this->setFeatureCookie($name, $featureConfiguration);
		}
	}

	/**
	 * is The Feature Active for The Current User
	 * @param  string  $feature the name of the feature
	 * @return boolean          if the feature is active for current user
	 */
	public function isFeatureActiveForUser($feature){
		if($this->getCookieValue($feature) < $this->getThreshold($feature)){
			return true;
		}else{
			return false;
		}
	}

	protected function setFeatureCookie($name,$featureConfiguration){
		global $_COOKIE;
		$fullCookieName = $this->getCookieName($name);
		$lifetime = isset($featureConfiguration['lifetime']) ? $featureConfiguration['lifetime'] :
		$expire = time() + $this->defaultLifetime;
		$path ='/';
		$domain = $this->getCookieDomain();
		//$domain ='dev.aerticket.de'; // TODO: how to retrive the cookie domain
		$secure = false; // These Cookie is availible in http and https
		$httponly = false; // cookie is accessible via javascript
		if(array_key_exists($this->cookieKey, $_COOKIE) && array_key_exists($name, $_COOKIE[$this->cookieKey])){
			$value = $_COOKIE[$this->cookieKey][$name];
		}else{
			$value = mt_rand() / mt_getrandmax();
			// add newly created cookie to the $_COOKIE array
			$_COOKIE[$this->cookieKey][$name] = $value;
		}
		// Set the Cookie
		setcookie($fullCookieName, $value, $expire, $path, $domain, $secure, $httponly);
	}

	protected function getCookieName($feature){
		 return $this->cookieKey .'['.$feature .']';
	}

	protected function getCookieValue($feature){
		global $_COOKIE;
		return $_COOKIE[$this->cookieKey][$feature];
	}

	protected function getThreshold($feature){
		return $this->config['features'][$feature]['threshold'];
	}

	/**
	 * Returns a cookie Domain and is Coopied from
	 * @return [type] [description]
	 */
	protected function getCookieDomain() {
		$feUserAuth = t3lib_div::makeInstance('Tx_Rollout_Utility_UserAuthHelper');
		return $feUserAuth->getCookieDomain();
	}


}
?>
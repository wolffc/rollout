<?php


class Tx_Rollout_Utility_UserAuthHelper extends t3lib_userAuth {
	/**
	 * Provides the getCookieDomain function as Public Method as in Original Method its protected
	 * @return string the Cookie domain
	 */
	public function getCookieDomain(){
		return parent::getCookieDomain();
	}
}
?>
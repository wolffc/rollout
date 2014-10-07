<?php
/**
 * Hook Class For Preprocessing The Request to set Feature Details
 */


// if (is_array($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/index_ts.php']['preprocessRequest'])) {
// 	foreach ($TYPO3_CONF_VARS['SC_OPTIONS']['tslib/index_ts.php']['preprocessRequest'] as $hookFunction) {
// 		$hookParameters = array();
// 		t3lib_div::callUserFunction($hookFunction, $hookParameters, $hookParameters);
// 	}
// 	unset($hookFunction);
// 	unset($hookParameters);
// }
// 

class Tx_Rollout_Hooks_PrerocessRequestHook {

	protected $util;



	/**
	 * This initalisie the Rollout Parameters
	 * @param  array $Parameters  this array is always empty as the index_ts script will not provide any options
	 * @param  array $Parameters2 this array is always empty as the index_ts script will not provide any options
	 * @return null             no return value is passed
	 */
	public function hook($Parameters,$Parameters2){
		// > Load Configuration
		//t3lib_div::debug(t3lib_div::finalClassNameRegister,'finclass');
		$this->util = t3lib_div::makeInstance('Tx_rollout_Utility_RolloutUtility');
		$this->util->loadConfiguration();
		// > assign Feature Cookies if needed
		$this->util->initializeFeatures();
	}

	

	
}
?>
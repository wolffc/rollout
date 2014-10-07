<?php

/**
 * Use The first Possible Hook to Handle the Session / Cookie Handling
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/index_ts.php']['preprocessRequest']['tx_rollout'] = 'EXT:rollout/Classes/Hooks/PreprocessRequestHook.php:Tx_Rollout_Hooks_PrerocessRequestHook->hook';

/**
 * Provide a user Function for use as  Typoscript conditons
 * EXAMPLE: [userFunc = tx_rollout_isFeatureActiveForUser(feature_1)]
 * @param  string $feature name of the feature to compare
 * @return boolean          if the feature is active for the current user
 */
function tx_rollout_isFeatureActiveForUser($feature){
	$util = t3lib_div::makeInstance('Tx_rollout_Utility_RolloutUtility');
	$util->loadConfiguration();
	return $util->isFeatureActiveForUser($feature);
}
?>
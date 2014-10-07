<?php
$extensionClassesPath = t3lib_extMgm::extPath('rollout');

$default = array(
	'tx_rollout_utility_rolloututility' => $extensionClassesPath . '/Classes/Utility/RolloutUtility.php',
	'tx_rollout_utility_userauthhelper' => $extensionClassesPath .'/Classes/Utility/UserAuthHelper.php',
	);
return $default;
?>
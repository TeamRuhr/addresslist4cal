<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

if (TYPO3_MODE == 'FE') {
	// Use hook in cal extension to display the address records
	$GLOBALS['TYPO3_CONF_VARS']['FE']['EXTCONF']['ext/cal/model/class.tx_cal_base_model.php']['searchForObjectMarker'][]='EXT:addresslist4cal/hooks/class.tx_addresslist4cal_frontend_hooks.php:tx_addresslist4cal_frontend_hooks';
}
?>
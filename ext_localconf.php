<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

if (TYPO3_MODE == 'FE') {
    // Use hook in cal extension to display the address records
    $GLOBALS['TYPO3_CONF_VARS']['FE']['EXTCONF']['ext/cal/model/class.tx_cal_base_model.php']['searchForObjectMarker'][] = \TeamRuhr\Addresslist4cal\Hooks\FrontendHooks::class;
}

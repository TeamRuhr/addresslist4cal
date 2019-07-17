<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$tempColumns = array(
	'tx_addresslist4cal_addresses' => array(
		'exclude' => 1,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:addresslist4cal/Resources/Private/Language/locallang_db.xml:tx_cal_event.tx_addresslist4cal_addresses',
		'config' => Array (
			'type' => 'select',
			'foreign_table' => 'tt_address',
			'foreign_table_where' => 'ORDER BY tt_address.last_name',
			'size' => 6,
			'minitems' => 0,
			'maxitems' => 10,
		)
	),
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_cal_event', $tempColumns);
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_cal_event', '--div--;LLL:EXT:addresslist4cal/Resources/Private/Language/locallang_db.xml:tx_cal_event.tx_addresslist4cal_tablabel,tx_addresslist4cal_addresses;;;;1-1-1');

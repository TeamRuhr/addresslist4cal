<?php

namespace TeamRuhr\Addresslist4cal\Hooks;

/***************************************************************
 * Copyright notice
 *
 * (c) 2013-2013 Michael Oehlhof <typo3@oehlhof.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Service\MarkerBasedTemplateService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Class 'FrontendHooks' for the 'addresslist4cal' extension.
 *
 * This class implements a hook for the frontend rendering in cal.
 *
 * @package TYPO3
 * @subpackage tx_addresslist4cal
 *
 * @author Michael Oehlhof <typo3@teamruhr.de>
 */
class FrontendHooks
{

    /**
     * Hook for the frontend rendering in cal.
     *
     * @param $thisCal
     * @param $template
     * @param $sims
     * @param $rems
     * @param $wrapped
     * @param $view
     * @return void
     * @see cal/model/class.tx_cal_base_model.php:getMarker() Hook: postSearchForObjectMarker
     */
    function postSearchForObjectMarker($thisCal, $template, &$sims, &$rems, $wrapped, $view)
    {
        // First check if any tt_address records are selected.
        // If not, then nothing is to do in this hook.
        if (empty($thisCal->row['tx_addresslist4cal_addresses'])) {
            return;
        }
        // Include language constants from tt_address TCA description.
        $LANG = GeneralUtility::makeInstance('TYPO3\CMS\Lang\LanguageService');
        $LANG->init($GLOBALS['TSFE']->tmpl->setup['config.']['language']);
        $LANG->includeLLFile(ExtensionManagementUtility::extPath('tt_address') . 'locallang_tca.xml');
        // Get the template for a single tt_address record
        $templateService = GeneralUtility::makeInstance(MarkerBasedTemplateService::class);
        $addressTemplate = $templateService->getSubpart($template, '###ADDRESSLIST4CAL_ADDRESS###');
        $content = '';
        // Read record(s) from tt_address
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_address');
        $res = $queryBuilder->select('*')
            ->from('tt_address')
            ->where($queryBuilder->expr()->in('uid', $thisCal->row['tx_addresslist4cal_addresses']))
            ->groupBy('last_name')
            ->execute();

        if ($res) {
            while ($row = $res->fetch()) {
                // Get overload language record
                if ($GLOBALS['TSFE']->sys_language_content) {
                    $row = $GLOBALS['TSFE']->sys_page->getRecordOverlay('tt_address',
                        $row, $GLOBALS['TSFE']->sys_language_content,
                        $GLOBALS['TSFE']->sys_language_contentOL, '');
                }

                // Fill the marker array with data from tt_address record.
                $markContentArray = array();
                foreach ($row as $key => $value) {
                    $markContentArray['###' . strtoupper($key) . '###'] = $value;
                }
                // Get the configuration for this hook.
                $config = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_addresslist4cal.'];
                // Add a marker for the detail page, if defined
                if (($config['detailPage']) && ($config['addressUidParam'])) {
                    $url = $thisCal->local_cObj->typoLink_URL(
                        array(
                            'parameter' => $config['detailPage'],
                            'useCacheHash' => true,
                            'additionalParams' => '&' . $config['addressUidParam'] . '=' . $row['uid']
                        )
                    );
                } else {
                    $url = '';
                }
                $markContentArray['###DETAIL_PAGE_URL###'] = $url;
                // Replace gender and birthday with user readable text
                $markContentArray['###GENDER###'] = $LANG->getLL('tt_address.gender.' . $markContentArray['###GENDER###']);
                $dateFormat = $config['dateFormat'];
                if (empty($dateFormat)) {
                    $dateFormat = '%Y-%m-%d';
                }
                $markContentArray['###BIRTHDAY###'] = strftime($dateFormat,
                    intval($markContentArray['###BIRTHDAY###']));

                // Replace marker with data from marker array
                $content .= $thisCal->local_cObj->substituteMarkerArray($addressTemplate, $markContentArray);
            }
        }
        $sims['###ADDRESSLIST4CAL###'] = $content;
        $rems['###ADDRESSLIST4CAL_ADDRESS###'] = '';
    }
}

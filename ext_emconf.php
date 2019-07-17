<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "addresslist4cal".
 *
 * Auto generated 17-04-2014 22:35
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Address List for Calendar Events',
    'description' => 'Adds selection of tt_address records to the CAL extension.',
    'category' => 'plugin',
    'shy' => 0,
    'version' => '2.0.0',
    'dependencies' => 'cal,tt_address',
    'conflicts' => '',
    'priority' => '',
    'loadOrder' => '',
    'module' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => '',
    'clearcacheonload' => 0,
    'lockType' => '',
    'author' => 'Michael Oehlhof',
    'author_email' => 'typo3@oehlhof.de',
    'author_company' => '',
    'CGLcompliance' => '',
    'CGLcompliance_note' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.7.19-8.7.999',
            'cal' => '1.11.1',
            'tt_address' => '4.3.0-',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
    '_md5_values_when_last_written' => 'a:33:{s:9:"ChangeLog";s:4:"58d9";s:12:"ext_icon.gif";s:4:"477a";s:17:"ext_localconf.php";s:4:"2509";s:14:"ext_tables.php";s:4:"a6a8";s:14:"ext_tables.sql";s:4:"d23f";s:16:"locallang_db.xml";s:4:"6251";s:26:"Documentation/Includes.txt";s:4:"6d5f";s:23:"Documentation/Index.rst";s:4:"5b1a";s:26:"Documentation/Settings.yml";s:4:"be04";s:45:"Documentation/AdditionalInformation/Index.rst";s:4:"b77f";s:43:"Documentation/AdministratorManual/Index.rst";s:4:"6222";s:46:"Documentation/Images/manual_html_cal_event.png";s:4:"3fac";s:36:"Documentation/Introduction/Index.rst";s:4:"1355";s:37:"Documentation/KnownProblems/Index.rst";s:4:"502c";s:42:"Documentation/Localization.de_DE/Index.rst";s:4:"55c6";s:39:"Documentation/Localization.de_DE/README";s:4:"fe42";s:45:"Documentation/Localization.de_DE/Settings.yml";s:4:"273c";s:64:"Documentation/Localization.de_DE/AdditionalInformation/Index.rst";s:4:"49db";s:62:"Documentation/Localization.de_DE/AdministratorManual/Index.rst";s:4:"cc58";s:65:"Documentation/Localization.de_DE/Images/manual_html_cal_event.png";s:4:"7490";s:55:"Documentation/Localization.de_DE/Introduction/Index.rst";s:4:"58b7";s:56:"Documentation/Localization.de_DE/KnownProblems/Index.rst";s:4:"b76f";s:54:"Documentation/Localization.de_DE/UsersManual/Index.rst";s:4:"b15d";s:47:"Documentation/Localization.fr_FR.tmpl/Index.rst";s:4:"2101";s:44:"Documentation/Localization.fr_FR.tmpl/README";s:4:"1daf";s:50:"Documentation/Localization.fr_FR.tmpl/Settings.yml";s:4:"e828";s:35:"Documentation/UsersManual/Index.rst";s:4:"adef";s:27:"Documentation/_make/conf.py";s:4:"bb91";s:33:"Documentation/_make/make-html.bat";s:4:"6d1c";s:28:"Documentation/_make/make.bat";s:4:"4716";s:28:"Documentation/_make/Makefile";s:4:"c808";s:46:"Documentation/_make/_not_versioned/_.gitignore";s:4:"829c";s:49:"hooks/class.tx_addresslist4cal_frontend_hooks.php";s:4:"8578";}',
    'suggests' => array(),
);

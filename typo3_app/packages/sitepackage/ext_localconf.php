<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        /***************
         * Add default RTE configuration
         */
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['sitepackage'] = 'EXT:sitepackage/Configuration/RTE/Default.yaml';

        /******************************
         * Register TypoScript hook
         * for automatic inclusion
         * of our setup & constants.
         ******************************/
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Core/TypoScript/TemplateService']['runThroughTemplatesPostProcessing'][1501684692] =
            \KK\Sitepackage\Hooks\TsTemplateHook::class . '->addTypoScriptTemplate';


        /***************
         * PageTS
         ***************/
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            "@import 'EXT:sitepackage/Configuration/TsConfig/Page/All.tsconfig'"
        );
    }
);

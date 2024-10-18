<?php
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

class victory_options extends CModule
{
    var $MODULE_ID = 'victory.options';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME = 'Victory';
    var $PARTNER_URI = 'http://victory.su';

    function __construct() {
        $arModuleVersion = [];
        include('version.php');
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = Loc::getMessage('MODULE_VICTORY_OPTIONS_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('MODULE_VICTORY_OPTIONS_DESC');
        $this->PARTNER_NAME = Loc::getMessage('MODULE_VICTORY_OPTIONS_VENDOR_NAME');
        $this->PARTNER_URI = Loc::getMessage('MODULE_VICTORY_OPTIONS_VENDOR_URL');
    }

    function DoInstall() {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallFiles();
        Loader::includeModule($this->MODULE_ID);
    }

    function InstallFiles(){
        CopyDirFiles(__DIR__.'/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin', true);
        CopyDirFiles(__DIR__.'/css/', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/css/' . $this->MODULE_ID, true, true);
        CopyDirFiles(__DIR__.'/images/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/images/' . $this->MODULE_ID, true, true);
        return true;
    }

    function UnInstallFiles(){
        DeleteDirFiles(__DIR__.'/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin');
        DeleteDirFilesEx('/bitrix/css/' . $this->MODULE_ID . '/');
        DeleteDirFilesEx('/bitrix/images/' . $this->MODULE_ID . '/');
        return true;
    }

    function DoUninstall() {
        Loader::includeModule($this->MODULE_ID);
        $this->UnInstallFiles();
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}

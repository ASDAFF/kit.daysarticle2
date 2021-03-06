<?
global $MESS;
IncludeModuleLangFile(__FILE__);

Class kit_daysarticle2 extends CModule
{
    var $MODULE_ID = 'kit.daysarticle2';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = 'Y';

	function kit_daysarticle2()
	{
		$arModuleVersion = array();

		$path = str_replace('\\', '/', __FILE__);
		$path = substr($path, 0, strlen($path) - strlen('/index.php'));
		include($path.'/version.php');
	
        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        } else {
            $this->MODULE_VERSION = '1.0.0';
            $this->MODULE_VERSION_DATE = '2014.01.01';
        }

		$this->MODULE_NAME = GetMessage('RSDA2.MODULE_NAME');
		$this->MODULE_DESCRIPTION = GetMessage('RSDA2.MODULE_DESCRIPTION');
		$this->PARTNER_NAME = GetMessage('RSDA2.MODULE_DEVELOPER_NAME');
        $this->PARTNER_URI  = 'https://asdaff.github.io/';
	}

	// Install functions
	function InstallDB()
	{
		global $DB, $DBType, $APPLICATION;
		RegisterModule('kit.daysarticle2');
		$DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/kit.daysarticle2/install/db/'.$DBType.'/install.sql');
		return TRUE;
	}

	function InstallEvents()
	{
		RegisterModuleDependences('main', 'OnAdminTabControlBegin', 'kit.daysarticle2', 'CRSDA2Tab', 'MyOnAdminTabControlBegin');
		RegisterModuleDependences('main', 'OnBeforeProlog', 'kit.daysarticle2', 'CRSDA2Main', 'OnBeforePrologElementUpdate');
		RegisterModuleDependences('sale', 'OnSaleComponentOrderOneStepComplete', 'kit.daysarticle2', 'CRSDA2Main', 'OnSaleComponentOrderOneStepComplete');
		return TRUE;
	}

	function InstallOptions()
	{
		return TRUE;
	}

	function InstallFiles()
	{
		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/kit.daysarticle2/install/copyfiles/components', $_SERVER['DOCUMENT_ROOT'].'/bitrix/components', true, true);
		return TRUE;
	}

	function InstallPublic()
	{
		return TRUE;
	}

	// UnInstal functions
	function UnInstallDB($arParams = Array())
	{
		global $DB, $DBType, $APPLICATION;
		$DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/kit.daysarticle2/install/db/'.$DBType.'/uninstall.sql');
		UnRegisterModule('kit.daysarticle2');
		return TRUE;
	}

	function UnInstallEvents()
	{
		UnRegisterModuleDependences('main', 'OnAdminTabControlBegin', 'kit.daysarticle2', 'CRSDA2Tab', 'MyOnAdminTabControlBegin');
		UnRegisterModuleDependences('main', 'OnBeforeProlog', 'kit.daysarticle2', 'CRSDA2Main', 'OnBeforePrologElementUpdate');
		UnRegisterModuleDependences('sale', 'OnSaleComponentOrderOneStepComplete', 'kit.daysarticle2', 'CRSDA2Main', 'OnSaleComponentOrderOneStepComplete');
		return TRUE;
	}

	function UnInstallOptions()
	{
		COption::RemoveOption('kit.daysarticle2');
		return TRUE;
	}

	function UnInstallFiles()
	{
		return TRUE;
	}

	function UnInstallPublic()
	{
		return TRUE;
	}

    function DoInstall()
    {
		global $APPLICATION, $step;
		$keyGoodDB = $this->InstallDB();
		$keyGoodEvents = $this->InstallEvents();
		$keyGoodOptions = $this->InstallOptions();
		$keyGoodFiles = $this->InstallFiles();
		$keyGoodPublic = $this->InstallPublic();
		$APPLICATION->IncludeAdminFile(GetMessage('SPER_INSTALL_TITLE'), $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/kit.daysarticle2/install/install.php');
    }

    function DoUninstall()
    {
		global $APPLICATION, $step;
		$keyGoodFiles = $this->UnInstallFiles();
		$keyGoodEvents = $this->UnInstallEvents();
		$keyGoodOptions = $this->UnInstallOptions();
		$keyGoodDB = $this->UnInstallDB();
		$keyGoodPublic = $this->UnInstallPublic();
		$APPLICATION->IncludeAdminFile(GetMessage('SPER_UNINSTALL_TITLE'), $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/kit.daysarticle2/install/uninstall.php');
    }
}
?>
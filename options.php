<?
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

IncludeModuleLangFile(__FILE__);
IncludeModuleLangFile($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/main/options.php');

CModule::IncludeModule('catalog');
CModule::IncludeModule('kit.daysarticle2');

$aTabs = array(
	array('DIV' => 'kit_edit1', 'TAB' => GetMessage('RSDA2.TAB1_NAME'), 'ICON' => '', 'TITLE' => GetMessage('RSDA2.TAB1_TITLE')),
);

$tabControl = new CAdminTabControl('tabControl', $aTabs);

if(isset($_REQUEST['save']) && check_bitrix_sessid())
{
	COption::SetOptionString('kit.daysarticle2', 'init_jquery', $_REQUEST['init_jquery']=='Y' ? 'Y' : 'N' );
}

$tabControl->Begin();

?><form method="post" name="kit_daysarticle2_options" action="<?=$APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?=LANGUAGE_ID?>"><?
echo bitrix_sessid_post();





$tabControl->BeginNextTab();
$init_jquery = COption::GetOptionString("kit.daysarticle2", "init_jquery", "N");
?><tr><?
	?><td width="50%" valign="top"><?=GetMessage("RSDA2.INIT_JQUERY")?>:</td><?
	?><td width="50%"><input type="checkbox" name="init_jquery" value="Y"<?if($init_jquery=="Y"):?> checked="checked" <?endif;?> /></td><?
?></tr><?





$tabControl->Buttons(array());
$tabControl->End();
?></form>
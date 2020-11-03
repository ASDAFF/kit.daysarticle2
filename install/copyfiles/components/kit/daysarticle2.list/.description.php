<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("KT_COM_NAME"),
	"DESCRIPTION" => GetMessage("KT_COM_DESCRIPTION"),
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "collect_com",
		"SORT" => 2000,
		"NAME" => GetMessage("KT_COM_COMPONENTS"),
		"CHILD" => array(
			"ID" => "daysarticle2",
			"NAME" => GetMessage("KT_COM_SEC_NAME"),
			"SORT" => 10,
		)
	),
);
?>
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$fields_form = array (
				'NAME'	 => GetMessage("ITD_FM_PARAM_FIELDS_FORM_LIST_NAME"),
				'PHONE'	 => GetMessage("ITD_FM_PARAM_FIELDS_FORM_LIST_PHONE"),
				'EMAIL'	 => GetMessage("ITD_FM_PARAM_FIELDS_FORM_LIST_EMAIL"),
				'MSG'	 => GetMessage("ITD_FM_PARAM_FIELDS_FORM_LIST_MSG"),
			);

$key_fields_form = array_keys($fields_form);

if ( !empty( $arCurrentValues["FIELDS_FORM"] ) ) 
	$arCurrentValues["FIELDS_FORM"] = array_combine ($arCurrentValues["FIELDS_FORM"], $arCurrentValues["FIELDS_FORM"]);

$tmpl = '
<b>Сообщение с сайта:</b>
<br>
Имя: {{NAME}}
<br>
Телефон: {{PHONE}}
<br>
E-mail: {{EMAIL}}
<br>
Сообщение: {{MSG}}';



$arComponentParameters = array (
   "GROUPS" => array(),
   "PARAMETERS" => 
	array (
		"EMAIL_TO" => 
			array (
				"PARENT"  => "BASE",
				"NAME"	  => GetMessage("ITD_FM_PARAM_EMAIL"),
				"DEFAULT" => 'example@example.ru',
			),
		"EMAIL_THEME" => 
			array (
				"PARENT"  => "BASE",
				"NAME"	  => GetMessage("ITD_FM_PARAM_EMAIL_THEME"),
				"DEFAULT" => GetMessage("ITD_FM_PARAM_EMAIL_THEME_VALUE"),
			),
		"EMAIL_SENDER" => 
			array (
				"PARENT"  => "BASE",
				"NAME"	  => GetMessage("ITD_FM_PARAM_EMAIL_SENDER"),
				"DEFAULT" => 'Example <example@example.ru>',
			),
		"FIELDS_FORM" => 
			array (
				"PARENT"   => "BASE", 
				"NAME"	   => GetMessage("ITD_FM_PARAM_FIELDS_FORM"),
				"TYPE"	   => "LIST",
				"MULTIPLE" => "Y",
				"VALUES"   => $fields_form,
				"DEFAULT"  => $key_fields_form,
				"ADDITIONAL_VALUES" => "Y",
				"REFRESH" => "Y"
			),
	   "FIELDS_FORM_REQUIRED" => 
			array (
				"PARENT"	 => "BASE", 
				"NAME"		 => GetMessage("ITD_FM_PARAM_FIELDS_FORM_REQUIRED"),
				"TYPE"		 => "LIST",
				"MULTIPLE"	 => "Y",
				"VALUES"	 => $arCurrentValues["FIELDS_FORM"],
				"DEFAULT"	 => $arCurrentValues["FIELDS_FORM"],
			),
		"TMPL_MAIL" => 
			array (
				"PARENT"	 => "BASE", 
				"NAME"		 => GetMessage("ITD_FM_PARAM_MAIL_TEMPLATE"),
				"TYPE"		 => "CUSTOM",
				"DEFAULT"	 => $tmpl,
				"COLS"		 => 100,
			),
	),
);
?>

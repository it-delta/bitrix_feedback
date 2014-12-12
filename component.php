<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$mails						 = $arParams['EMAIL_TO'];
$arResult['FIELDS']			 = array_combine($arParams['FIELDS_FORM'], $arParams['FIELDS_FORM']);
$arResult['FIELDS_REQUIRED'] = array_combine($arParams['FIELDS_FORM'], $arParams['FIELDS_FORM']);
$tmpl						 = $arParams['TMPL_MAIL'];
$theme						 = $arParams['EMAIL_THEME'];
$sender						 = $arParams['EMAIL_SENDER'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{	

	$APPLICATION->RestartBuffer();
	error_reporting(0);
	header('Content-Type: application/json; charset=utf-8');
	
	/* Валидация */
	foreach ($arParams['FIELDS_FORM_REQUIRED'] as $value)
	{
		if ( empty($_POST[$value]) )
		{
			$result = array(
				'msg' => 'Одно из обязательных полей не заполнено',
				'type' => 'error'
			);
			echo json_encode($result);
			die;
		}
	}

	/* Формируем сообщение */
	$tmpl = htmlspecialchars_decode($tmpl);
	foreach ($_POST as $key => $value)
	{
		$replacement = '{{'.$key.'}}';
		$tmpl = str_replace($replacement, $value, $tmpl);
	}
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: ' . $sender . "\r\n";
	
	if ( mail($mails, $theme, $tmpl, $headers) )
	{
		$result = array(
			'msg' => 'Сообщение успешно отправлено',
			'type' => 'ok'
		);
	}
	else
	{
		$result = array(
			'msg' => 'При отправке сообщения возникли ошибки',
			'type' => 'error'
		);
	}
	
	echo json_encode($result);
	die;
}

$this->IncludeComponentTemplate();
?>

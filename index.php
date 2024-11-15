<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');


	require_once 'Tag.php';
	require_once 'Image.php';
	require_once 'Link.php';
	require_once 'HtmlList.php';
	require_once 'ListItem.php';
	require_once 'Form.php';
	require_once 'Input.php';
	require_once 'Submit.php';



	$list = new HtmlList('ul');
	
	echo $list->setAttr('class', 'eee')
		->addItem((new ListItem())->setText('item1')->setAttr('class', 'first'))
		->addItem((new ListItem())->setText('item2'))
		->addItem((new ListItem())->setText('item3'))
		->show();
?>
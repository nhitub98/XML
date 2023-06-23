<?php
$doc=new DOMDocument('1.0','utf-8'); //Khai báo DOM
	$root=$doc->createElement('note'); //Tạo 1 nút có tên note
	$doc->appendChild($root); 
	$from=$doc->createElement('from'); 
	$from->nodeValue='Tony Nguyen'; //Gán from là con của node
	$from->setAttribute('name','New york');
	$root->appendChild($from);
	$to=$doc->createElement('to');
	$to->nodeValue='Jack';$root->appendChild($to);
	$body=$doc->createElement('body');
	$body->nodeValue='Tai lieu mat';$root->appendChild($body);
	$doc->save('filesaukhi_taonote.xml'); echo ' Tao file thanh cong';
?>

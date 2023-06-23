<?php
$xmlDoc =new DOMDocument();
$xmlDoc->load("book.xml");
print $xmlDoc->saveXML();
?>

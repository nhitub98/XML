<?php
$doc = new DOMDocument();
$doc->load('book.xml');
$books = $doc->getElementsByTagName( "book" );
foreach( $books as $book ){
$authors = $book->getElementsByTagName( "author" );
$publishers = $book->getElementsByTagName( "publisher" );
$titles = $book->getElementsByTagName( "title" );
for($i=0;$i<count($titles);$i++){
    $title = $titles->item($i)->nodeValue;
      if ($title=='PHP Hacks'){
            $author = $authors->item($i)->nodeValue;
            $publisher = $publishers->item($i)->nodeValue;
            echo "$title- $author - $publisher\n";
       } }}
?>

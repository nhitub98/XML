<?php
$doc = new DOMDocument();
$doc->load('book.xml');
$books = $doc->getElementsByTagName( "book" );
foreach( $books as $book ){
$authors = $book->getElementsByTagName( "author" );
$publishers = $book->getElementsByTagName( "publisher" );
$titles = $book->getElementsByTagName( "title" );
for($i=0;$i<count($publishers);$i++){
    $publisher = $publishers->item($i)->nodeValue;
      if ($publisher=='O.Reilly'){
            $author = $authors->item($i)->nodeValue;
            $title = $titles->item($i)->nodeValue;
            echo "$title- $author \n";
       } }}
?>
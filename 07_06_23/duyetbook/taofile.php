<?php
$doc=new DOMDocument('1.0','utf-8');
 $root=$doc->createElement('books');
 $doc->appendChild($root);

 $book=$doc->createElement('book');
    $book->setAttribute('author','Jack Herrington');
    $root->appendChild($book);
    $book->setAttribute('publisher','O.Reilly');
    $root->appendChild($book);
    $book->setAttribute('title','PHP Hacks');
    $root->appendChild($book);
    $book=$doc->createElement('book');
    $book->setAttribute('author','Jack Herrington');
    $root->appendChild($book);
    $book->setAttribute('publisher','O.Reilly');
    $root->appendChild($book);
    $book->setAttribute('title','Podcasting Hacks');
    $root->appendChild($book);
    $book=$doc->createElement('book');
    $book->setAttribute('author','Jack Herrington');
    $root->appendChild($book);
    $book->setAttribute('publisher','Hermony');
    $root->appendChild($book);
    $book->setAttribute('title','Podcasting Hacks');
    $root->appendChild($book);
    $doc->save('book1.xml'); echo ' Tao file thanh cong';
?>
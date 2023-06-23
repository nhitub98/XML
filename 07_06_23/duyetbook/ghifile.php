<?php
$books = array();
$books [] = array('title' => 'PHP Hacks','author' => 'Jack Herrington',
'publisher' => "O'Reilly");
$books [] = array('title' => 'Podcasting Hacks','author' => 'Jack Herrington',
'publisher' => "O'Reilly");
?>
<books><?php 
foreach( $books as $book ){
?>
<book>
<title><?php echo( $book['title'] ); ?></title>
<author><?php echo( $book['author'] ); ?>
</author>
<publisher><?php echo( $book['publisher'] ); ?>
</publisher>
</book>
<?php
}
?></books>
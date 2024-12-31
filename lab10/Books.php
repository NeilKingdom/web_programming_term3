<?php
$selected = $_GET['q'];
//File object
$xmlfile = file_get_contents("Books.xml");
//HTML Document from file
$document = new DOMDocument();
$document->loadXML($xmlfile);
$books = $document->getElementsByTagName('book');

$display = array();

//Find matching category and add to array
foreach($books as $book) {
	foreach($book->childNodes as $line) {
        if($line->nodeName == "genre") {
	 	    if($line->nodeValue == $selected) {
	 			array_push($display, $book); 		
	 	 	}
	 	}
	}
}

//Display book info
foreach($display as $info) {
    foreach($info->childNodes as $line) {
        if($line->nodeName != "#text") {
            echo "<b>" . $line->nodeName . "</b>: " . $line->nodeValue . "<br>";
        }
    }
    echo "<br>";
}
?>
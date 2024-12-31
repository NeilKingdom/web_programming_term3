<?php
$dir = scandir("pages");
$notWanted = array('.', '..');
echo "<ul><h1>Menu</h1><br>";
foreach($dir as $item) {
    if(!in_array($item, $notWanted)) {
        $link = "pages/$item/index.html";
        echo '<li><a href="' . $link . '"> ' . $item . '</a></li><br>';
    }
}
echo "</ul>";
?>
<?php
$dir = scandir("../Lab6");
$home = "index.php";
$notWanted = array('.', '..', 'php_errorlog', 'StyleSheet.css', 'Footer.php', 'Header.php', 'Menu.php', 'index.php');

echo "<ul><h1>Menu</h1><br>";
echo '<li><a href="' . $home . '">Home</a></li><br>';
foreach($dir as $item) {
    if(!in_array($item, $notWanted)) {
        $link = "$item";
        $newname = str_replace(".php", "", $item);
        echo '<li><a href="' . $link . '"> ' . $newname . '</a></li><br>';
    }
}
echo "</ul>";
?>
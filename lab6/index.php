<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lab6</title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="StyleSheet.css"/>
    </head>
    <body>
        <header id="header">
            <?php include 'Header.php';?>
        </header>
        <nav id="menu">
            <?php include 'Menu.php';?>
        </nav>
        <div id="content">
            <?php
            $random = rand(1,100);
            $bottle = ($random == 1) ? "bottle" : "bottles";
            while($random != 0) {
                echo "$random $bottle of beer on the wall...<br>";
                echo "$random $bottle of beer...<br>";
                echo "You take one down, pass it around...<br>";
                $random--;
                $bottle = ($random == 1) ? "bottle" : "bottles";
                echo "$random $bottle of beer on the wall...<br><br>";     
            }
            echo "There are no more bottles of beer on the wall";
            ?>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
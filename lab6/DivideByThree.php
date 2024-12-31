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
            while($random != 0) {
                $bottle = ($random == 1) ? "bottle" : "bottles";
                if($random %3 == 0)
                    echo "$random bottles of beer is a multiple of three...<br>";
                else
                    echo "$random bottles of beer is NOT a multiple of three...<br>"; 
                $random--;
            }
            ?>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
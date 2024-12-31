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
            echo "<form action='Random.php' method='get'>";
            echo "Range 1: <input type='text' id='range1' name='range1'><br>";
			echo "Range 2: <input type='text' id='range2' name='range2'><br>";
            echo "<input value='Order' type='submit'>";
            echo "</form>";

            if(isset($_GET['range1']) && $_GET['range1'] >= 0 && isset($_GET['range2']) && $_GET['range2'] > 0) {
                $random = rand($_GET['range1'], $_GET['range2']);
                echo "The web server has selected the random number $random from the range " . $_GET['range1'] . " to " . $_GET['range2'] . "<br>";
                if($random % 2 == 0) 
                    echo "$random Bottles of beer can serve even number of guests.";
                else
                    echo "$random Bottles of beer can serve odd number of guests.";
            }
            else echo "Invalid range";
            ?>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
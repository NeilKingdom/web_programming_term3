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
        <div class="pattern">
            <?php
            $max_len = 11;

            for($i = 1; $i < ceil($max_len/2)+1; $i++) {
                $stars = ($max_len % 2 == 0) ? (($i+1)*2)-2 : $i+($i-1);
                $wlen = intdiv(($max_len-$stars), 2);

                for($a = 0; $a < $wlen; $a++)
                    echo "&nbsp;&nbsp;";
                for($b = 0; $b < $stars; $b++)
                    echo "*";  
                for($c = 0; $c < $wlen; $c++)
                    echo "&nbsp;&nbsp;";
                echo "<br>";
            }

            for($i = floor($max_len/2); $i > 0; $i--) {
                $stars = ($max_len % 2 == 0) ? ($i*2)-2 : ($i*2)-1; 
                $wlen = intdiv(($max_len-$stars), 2);

                for($a = 0; $a < $wlen; $a++)
                    echo "&nbsp;&nbsp;";
                for($b = 0; $b < $stars; $b++)
                    echo "*";  
                for($c = 0; $c < $wlen; $c++)
                    echo "&nbsp;&nbsp;";
                echo "<br>";
            }
            ?>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
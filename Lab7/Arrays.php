<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lab7</title>
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
            $November = array(
                            "Friday" => array("1st"=>6, "2nd"=>13, "3rd"=>20, "4th"=>27),
                            "Saturday" => array("1st"=>7, "2nd"=>14, "3rd"=>21, "4th"=>28),
                            "Sunday" => array("1st"=>1, "2nd"=>8, "3rd"=>15, "4th"=>22, "5th"=>29),
                            "Monday" => array("1st"=>2, "2nd"=>9, "3rd"=>16, "4th"=>23, "5th"=>30),
                            "Tuesday" => array("1st"=>3, "2nd"=>10, "3rd"=>17, "4th"=>24),
                            "Wednesday" => array("1st"=>4, "2nd"=>11, "3rd"=>18, "4th"=>25),
                            "Thursday" => array("1st"=>5, "2nd"=>12, "3rd"=>19, "4th"=>26)
                        );

            echo "<h2>Output-1</h2>";
            print_r($November);

            echo "<h2>Output-2</h2>";
            foreach($November as $parent => $child) 
                foreach($child as $key => $value) 
                    echo $value . " is the " . $key . " " . $parent . " in November.<br>";

            echo "<h2>Output-3</h2>";
            $reversed = array_reverse($November);
            print_r($reversed);

            echo "<h2>Output-4</h2>";
			$November["Tuesday"]["5th"] = 31;
            print_r($November);
            ?>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
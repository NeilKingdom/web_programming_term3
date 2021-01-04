<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Lab8</title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="form_style.css"/>
    </head>
    <body>
        <header id="header">
            <?php include 'Header.php';?>
        </header>

        <nav id='menu'>
            <?php include 'Menu.php';?>
        </nav>

        <div id='content'>
            <!--FORM INFO-->
            <div class='left'>
                <form action='Input.php' method='post'>

                    <div class='section_h'>
                        <strong>Personal Information</strong>
                    </div>

                    <div class='section_c'>
                        First Name<br><input type='text' name='fname'><br>
                        Last Name<br><input type='text' name='lname'><br>
                        Telephone Number<br><input type='number' name='pnumber'><br>
                        Email<br><input type='email' name='email'><br>
                        Birth Day<br><input type='date' name='bday'><br>
                    </div>

                    <div class='section_h'>
                        <strong>Profession</strong>
                    </div>

                    <div class='section_c'>
                        <input type='radio' name='profession' value='Student'>Student<br>
                        <input type='radio' name='profession' value='Doctor'>Doctor<br>
                        <input type='radio' name='profession' value='Farmer'>Farmer<br>
                        <input type='radio' name='profession' value='Engineer'>Engineer<br>
                    </div>

                    <div class='section_h'>
                        <strong>Favorite Sports</strong>
                    </div>

                    <div class='section_c'>
                        <select name="sport" multiple>
                            <option value="Hockey">Hockey</option>
                            <option value="Football">Football</option>
                            <option value="Carling">Carling</option>
                            <option value="Tennis">Tennis</option>
                        </select>
                    </div>

                    <span style='margin-left: 20px;'>
                        <input type='submit'>
                        <input type='reset'>
                    </span>
                </form>
            </div>

            <div class='right section_c'>
                <!--OUTPUT-->
                <h1>User Profile</h1>
                <?php
                if(isset($_POST['fname'])) 
                    echo "First name: " . $_POST['fname'] . "<br>";
                if(isset($_POST['lname'])) 
                    echo "Last name: " . $_POST['lname'] . "<br>";
                if(isset($_POST['pnumber'])) 
                    echo "Phone number: " . $_POST['pnumber'] . "<br>";
                if(isset($_POST['email'])) 
                    echo "Email: " . $_POST['email'] . "<br>";
                if(isset($_POST['bday'])) 
                    echo "Date of Birth: " . $_POST['bday'] . "<br>";
                if(isset($_POST['profession'])) 
                    echo "Profession: " . $_POST['profession'] . "<br>";
                if(isset($_POST['sport'])) 
                    echo "Favorite sport: " . $_POST['sport'] . "<br>";
                ?>
            </div>
        </div>

        <footer id='footer'>
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
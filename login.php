<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,900&display=swap" rel="stylesheet">
        <title>Mire Real Estate - Login Page</title>
        <style>
           
        </style>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
        <div id="bigDiv">
        <h1 id="login">Login</h1>
        <form method="post" action="<?php
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>">
            <div id="password_div">
                <label for="password" id="pass">Password: </label>
                <input type="password" id="password" name="password">
                <div id="showPass">
                    <span class="material-symbols-outlined" id='eye'>visibility</span>
                </div>
            </div>
            <input type="submit" ><br>
        </form>
        
        
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "Valmamucera95";

            $sql_createDB = "CREATE DATABASE IF NOT EXISTS MireDB";
            $db_conn = new mysqli($servername, $username, $password);
            $db_conn->query($sql_createDB);

            $dbname = "MireDB";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            }

            $sql_create_table = "CREATE TABLE IF NOT EXISTS AdminPassword (Admin_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, admin_password VARCHAR(30) NOT NULL)";
            $conn->query($sql_create_table);

            $sql = "SELECT admin_password FROM AdminPassword WHERE Admin_id = 1";
            $user_input_password = "";

            $result = $conn->query($sql);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_input_password = test_input($_POST["password"]);
                $real_password = $result->fetch_assoc()["admin_password"];

                if ($user_input_password == $real_password) {
                    header("Location:home.php");
                    $_SESSION['user'] = 'Admin';
                } else {
                    echo "<p class='error'>Wrong Password. Try Again</p>";
                }
            } 

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $conn->close();
        ?>

        <a href='userlogin.php'>
            <div id="loginUser">User Login</div>
        </a>
        <a href="changepass.php">
            <div id="changePass">Change Password</div>
        </a>
        
        <script>
            let showPass = document.getElementById('showPass');
            let show_password = false;

            showPass.onclick = function () {
                if(!show_password) {
                    document.getElementById('password').type = 'text';
                    show_password = true;
                    document.getElementById('eye').innerHTML = 'visibility_off';
                } else {
                    document.getElementById('password').type = 'password';
                    show_password = false;
                    document.getElementById('eye').innerHTML = 'visibility';
                }
            };
        </script>
        <script src="https://kit.fontawesome.com/194ef1d420.js" crossorigin="anonymous"></script>
        </div>
    </body>
</html>
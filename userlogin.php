<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <style>
            #showPass {
                width: 120px;
                height: 20px;
                border: 2px solid black;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Mire Real Estate</h1>
        </div>
        <form method='post' <?php
            echo htmlspecialchars($_SERVER['PHP_SELF']);
        ?>>
            <label for='username'>Username: </label>
            <input type='text' name='username' id='name'><br>
            <label for='password'>Password: </label>
            <input type='password' name='password' id='password'><br>
            <input type='submit'>
        </form>

        <div id="showPass">Show Password</div>

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

            $sql_create_table = "CREATE TABLE IF NOT EXISTS User (Username VARCHAR(30) PRIMARY KEY, user_password VARCHAR(30) NOT NULL)";
            $conn->query($sql_create_table);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user_name = $_POST['username'];
                $user_password = $_POST['password'];

                $sql = "SELECT user_password FROM User WHERE Username = '$user_name'";

                $result = $conn->query($sql);

                if ($user_password == $result->fetch_assoc()['user_password']) {
                    $_SESSION['user'] = $user_name;
                    header("Location:home.php");
                } else {
                    echo "<p>Wrong Username or password</p>";
                }
            }

            $conn->close();
        ?>

        <script>
            let showPass = document.getElementById('showPass');
            let show_password = false;

            showPass.onclick = function () {
                if(!show_password) {
                    document.getElementById('password').type = 'text';
                    show_password = true;
                    this.innerHTML = 'Hide Password';
                } else {
                    document.getElementById('password').type = 'password';
                    show_password = false;
                    this.innerHTML = 'Show Password';
                }
            };
        </script>
    </body>
</html>
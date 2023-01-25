<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add User</title>
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
            <div>
                Logged in as: <?php
                    // echo $_SESSION['user'];
                ?>
            </div>
        </div>
        <a href="home.php">
            <div>Home</div>
        </a>
        <h2>Add New User</h2>
        <form method="post" action="<?php
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>">
            <label for='username'>Username: </label>
            <input type="text" name="username" id="username"><br>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password"><br>
            <label for="confirm">Confirm Password: </label>
            <input type="password" name="confirm" id="confirm"><br>
            <input type="submit">
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

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $user_name = $_POST['username'];
                $user_password = $_POST['password'];
                $confirm = $_POST['confirm'];

                $sql_insert_data = "INSERT INTO User (Username, user_password) VALUES ('$user_name', '$user_password')";

                if (!empty($user_name) && !empty($user_password) && !empty($confirm)) {
                    if ($user_password == $confirm) {
                        $conn->query($sql_insert_data);
                        echo "<p class='success'>New user created successfully</p>";
                    } else {
                        echo "<p class='error'>Confirm Password</p>";
                    }
                } else {
                    echo "<p class='error'>Error creating new user</p>";
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
                    document.getElementById('confirm').type = 'text';
                    show_password = true;
                    this.innerHTML = 'Hide Password';
                } else {
                    document.getElementById('password').type = 'password';
                    document.getElementById('confirm').type = 'password';
                    show_password = false;
                    this.innerHTML = 'Show Password';
                }
            };
        </script>
    </body>
</html>
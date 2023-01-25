<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
    </head>
    <body>
        <?php
            $current_pass_error = $new_pass_error = $confirm_pass_error = ""; 
            $message = "";
        ?>
        <h1>Change Password</h1>
        <form method="post" action="<?php
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>">
            <label for="currentpass">Input Current Password: </label>
            <input type="password" id="currentpass" name="currentpass"><br>
            <span class="error"> <?php echo $current_pass_error; ?></span><br>
            <label for="newpass">Input New Password: </label>
            <input type="password" id="newpass" name="newpass"><br>
            <span class="error"> <?php echo $new_pass_error; ?></span><br>
            <label for="confirm">Confirm New Password</label>
            <input type="password" id="confirm" name="confirm"><br>
            <span class="error"> <?php echo $confirm_pass_error; ?></span><br>
            <input type="submit"><br>
            <span class="message"> <?php echo $message; ?></span><br>
        </form>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "Valmamucera95";
            $dbname = "MireDB";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            }

            $sql = "SELECT admin_password FROM AdminPassword WHERE Admin_id = 1";

            $result = $conn->query($sql);

            $user_current_password = $new_pass = $confirm = "";

            $real_password = $result->fetch_assoc()["admin_password"];

            if (empty($_POST["currentpass"])) {
                $current_pass_error = "Current Password is Required";
            } else {
                $user_current_password = test_input($_POST["currentpass"]);
            }

            if (empty($_POST["newpass"])) {
                $new_pass_error = "New Password is Required";
            } else {
                $new_pass = test_input($_POST["newpass"]);
            }

            if (empty($_POST["confirm"])) {
                $confirm_pass_error = "Confirm New Password";
            } else {
                $confirm = test_input($_POST["confirm"]);
            }

            $sql_update = "UPDATE AdminPassword SET admin_password = '$new_pass' WHERE Admin_id = 1";

            if ($user_current_password == $real_password && $new_pass == $confirm) {
                if ($conn->query($sql_update) === TRUE) {
                    header("Location:login.php");
                } else {
                    echo "Error updating record: ".$conn->error;
                }
            } 

            $conn->close();
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
    </body>
</html>
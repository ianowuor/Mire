<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="updatehouse.css">
        <title>Update Houses</title>
    </head>
    <body>
        <div id="mainDiv">
        
        <h2 id="add_house">Add House</h2>
        <form method="post" action="<?php
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>">
        <div id="row">
            <label for="description" id="house_type">House Type</label><br>
            <select id='description' name='description'>
                <option value='Bedsitter'>Bedsitter</option>
                <option value='One Bedroom'>One Bedroom</option>
                <option value='Two Bedroom'>Two Bedroom</option>
                <option value='Three Bedroom'>Three Bedroom</option>
            </select><br>
            <label for="house_number" id="house_number">House Number</label><br>
            <input type="text" id="house_number" name="house_number"><br>
        </div>
            <div id="row"><input type="submit"></div>
            
            
            <a href="home.php">
                <div id="back">Back</div>
            </a>
        </form>

        </div>


        <div>
            <div>
                Logged in as: <?php
                    echo $_SESSION['user'];
                ?>
            </div>
        </div>
        











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

            $sql_create_table = "CREATE TABLE IF NOT EXISTS House (House_Number VARCHAR(30) PRIMARY KEY, House_Description VARCHAR(30) NOT NULL)";
            $conn->query($sql_create_table);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $house_number_input = $_POST['house_number'];
                $house_description_input = $_POST['description'];

                // $sql = "SELECT House_Number FROM House";
                $sql_insert = "INSERT INTO House (House_Number, House_Description) VALUES ('$house_number_input', '$house_description_input')";

                if (!empty($_POST['house_number'])) {
                    $conn->query($sql_insert);
                    echo "New Record Created successfully";
                } else {
                    echo "House Number is required";
                }
            }

            // $sql_delete = "DELETE FROM House";
            // $conn->query($sql_delete);

            $conn->close();
        ?>
    </body>
</html>
<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="recordtenants.css">
        <title>Update Tenants</title>
    </head>
    <body>
        <div id="mainDiv">
       
        <h2 id="add_tenant">Add Tenant</h2>
        <form method="post" action="<?php 
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>">
            <div>
                <label for="house">House Type</label>
                <select id="house" name="house">
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

                    $sql_create_table = "CREATE TABLE IF NOT EXISTS Tenant (House_Number VARCHAR(30) PRIMARY KEY, Tenant_Name VARCHAR(30) NOT NULL, Phone_Number VARCHAR(30) NOT NULL, Id_Number VARCHAR(30) NOT NULL)";
                    $conn->query($sql_create_table);

                    $sql = "SELECT House_Number, House_Description FROM House WHERE House_Number NOT IN (SELECT House_Number FROM Tenant)";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['House_Number']."'>".$row['House_Number']." - ".$row['House_Description']."</option><br>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="tenant_name">Tenant Name: </label>
                <input type="text" name="tenant_name" id="tenant_name"><br>
                <label for="phone_number">Phone Number: </label>
                <input type="text" name="phone_number" id="phone_number"><br>
                <label for="id_number">Id Number: </label>
                <input type="text" name="id_number" id="id_number"><br>
                
            </div>

            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $house = $_POST['house'];
                    $tenant_name = $_POST['tenant_name'];
                    $phone_number = $_POST['phone_number'];
                    $id_number = $_POST['id_number'];

                    $sql_query = "INSERT INTO Tenant (House_Number, Tenant_Name, Phone_Number, Id_Number) VALUES ('$house', '$tenant_name', '$phone_number', '$id_number')";

                    if (!empty($house) && !empty($tenant_name) && !empty($phone_number) && !empty($id_number)) {
                        $conn->query($sql_query);
                    } else {
                        echo "Error creating new record";
                    }
                }

                $conn->close();
            ?>
        </form>


        <div>
            <div>
                Logged in as: <?php
                    echo $_SESSION['user'];
                ?>
            </div>
            <div id="row">
            <a href='home.php'>
            <div id="back">Back</div>
        </a>
        <input id="back" type="submit">
            </div>
        </div>
        
        </div>
        
    </body>
</html>
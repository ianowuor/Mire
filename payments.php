<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mire Real Estate - Payments</title>
    </head>
    <body>
        <div>
            <h1>Mire Real Estate</h1>
            <div>
                Logged in as: <?php
                    echo $_SESSION['user'];
                ?>
            </div>
        </div>
        <a href='home.php'>
            <div>Home</a>
        </a>
        <h2>Update Payment Manually</h2>
        <form method="post" action="<?php 
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>">
            <div>
                <label for="house">House</label><br>
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

                        $sql_create_table = "CREATE TABLE IF NOT EXISTS Payment (Payment_Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, House VARCHAR(30) NOT NULL, Amount_Paid INT(6) UNSIGNED NOT NULL)";
                        $conn->query($sql_create_table);

                        $sql = "SELECT House_Number from House";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='".$row['House_Number']."'>".$row['House_Number']."</option><br>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="amount">Amount: </label>
                <input type="text" name="amount" id="name">
                <input type="submit">
            </div>
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

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $house = $_POST['house'];
                $amount_paid = $_POST['amount'];

                $sql_query = "INSERT INTO Payment (House, Amount_Paid) VALUES ('$house', '$amount_paid')";

                if (!empty($house) && !empty($amount_paid)) {
                    $conn->query($sql_query);
                    echo "<p id='success'>Payment Complete</p>";
                } else {
                    echo "<p id='error'>Error creating new record</p>";
                }
            }

            $conn->close();
        ?>

        <a href='payreport.php'>
            <div>View Payment Report</div>
        </a>
    </body>
</html>
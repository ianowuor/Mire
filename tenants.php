<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="tenants.css">
        <title>Mire Real Estate - Tenants</title>
        <style>
            th, td {
                text-align: left;
                padding: 5px;
                border: 1px solid black;
                font-family:roboto,arial;
                border-color:grey;
                border-width: 2px;
                border-radius: 10px;
            }

            table {
                border-collapse: collapse;
                font-family:roboto,arial;
                color:grey;
                margin-bottom:30px;
            }
        </style>
    </head>
    <body>
        <div id="mainDiv">
               
        <h2 id="tenant_record">Tenant Record</h2>
        <table>
            <tr>
                <th>House Number</th>
                <th>Tenant Name</th>
                <th>Phone Number</th>
                <th>ID Number</th>
            </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "Valmamucera95";
                $dbname = "MireDB";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                if ($conn->connect_error) {
                    die("Connection failed: ".$conn->connect_error);
                }

                $sql = 'SELECT * FROM Tenant';
                // $sql_delete = "DELETE FROM Tenant";

                // $conn->query($sql_delete);
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row['House_Number']."</td><td>".$row['Tenant_Name']."</td><td>".$row['Phone_Number']."</td><td>".$row['Id_Number']."</td></tr>";
                    }
                } else {
                    echo "<p>No Tenant Record Available</p>";
                }

                $conn->close();
            ?>
        </table>

        <div>
            
            <div>
                <!--Logged in as: --><?php 
                    // echo $_SESSION['user'];
                 ?> 
            </div>
        </div>

        <div id="row">
        
        <a href='home.php'>
            <div id="back">Back</div>
        </a>
        <a href="recordtenants.php">
        <div id="back">add</div>
        </a>
        </div>
        


        </div>

        
    </body>
</html>
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
        <link rel="stylesheet" href="vacancy.css"> 
        <title>Mire Real Estate - Vacant Houses</title>
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
                color: grey;
                border-color:grey;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <div id="mainDiv">
       
<h2 id="vacant_houses">Vacant Houses</h2>
<table>
  <tr>
      <th>House number</th>
      <th>Description</th>
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

      $sql = "SELECT House_Number, House_Description FROM House WHERE House_Number NOT IN (SELECT House_Number FROM Tenant)";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr> <td>".$row['House_Number']."</td> <td>".$row['House_Description']."</td> </tr>";
          }
      }

      $conn->close();
  ?>
</table>
<div>
  
  
        </div>
<a href='home.php'>
  <div id="back">Back</div>
</a>
        </div>
        
    </body>
</html>
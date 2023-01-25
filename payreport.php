<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Payments Report</title>
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
        <a href="home.php">
            <div>Home<div>
        </a>
        <h2>Payment Report</h2>
        <a href="payments.php">
            <div>add</div>
        </a>
    </body>
</html>
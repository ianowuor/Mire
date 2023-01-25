<?php
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <title>Mire Real Estate - Home Page</title>
    </head>
    <body>
        <div id="header">
           
            <a href="login.php">
               <button id="login_button">Login</button>  
        </a>
        <div id="header_div">
        <img id="logo" src="download.png" alt="">
        <h1 id="header_title"><span id="MI_syllable">MI</span>RE</h1>
        </div>
  
    </div>


    <div id="body">
            <div id="section1"> 
            <button onclick="rooms()" id="rooms_available">
                    <p>Vacancy</p>
                </button>
                <button id="myclients">
                    <p>My Clients</p>
                </button>
                <button id="payments">
                    <p>Payments</p>
                </button>
                <button id="complains">
                    <p>Complains</p>
                </button>
                <button id="notes">
                    <p>Notes</p>
                </button>   
            </div>
            <div id="section2">
            </div>
            <div id="section3">
                <img id="calenderimg" src="january-1-calendar.jpg" alt="">
            </div>
            <div id="bod">
                <div id="log_bod">
                    <p id="content1">Login to:</p>
                    <p id="content2">Track Payments</p>
                    <p id="content3">Manage Property</p>
                    <p id="content4">Check Welfare Concerns</p>
                </div>
            </div>
            <script src="index.js"></script>
        
      
    </body>
</html>
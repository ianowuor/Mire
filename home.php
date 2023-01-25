<?php
    session_start();

    if (!$_SESSION['user']) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="home.css">
        <title>Mire Real Estate - Home</title>
    </head>
    <body>
    <div id="header">
        <a href="login.php">
            <button id="login_button">Login</button>  
        </a>
        <?php
            if ($_SESSION['user'] == 'Admin') {
                echo "<a href='adduser.php'><div id='add_user'>Add User</div></a>";
            }
        ?>
        <div id="header_div">
            <img id="logo" src="download.png" alt="">
            <h1 id="header_title"><span id="MI_syllable">MI</span>RE</h1>
        </div>
        <div id='current_user'>
            <?php echo $_SESSION['user'];?>
        </div>
    </div>   
    <div id="section1"> 
        <div id="row">
           <a >
               <div id="rooms_available" onclick="vacancy()">
                    Vacant Houses
                </div>
            </a>
            <a >
                <div id="myclients" onclick="mytenants()">My tenants</div>
             </a>
        </div>
        <div id="row">
            <button id="complains">
                <p>Complains</p>
            </button>
            <button id="notes">
                <p>Notes</p>
            </button> 
        </div>    
        <div id="row">
            <a href='payreport.php'>
                <div id="payments">Payment Report</div>
            </a>
            <a>
                <div id="add_house" onclick="update_tenants()">
                        Add House
                </div>
            </a>    
        </div>
    </div>
        <div id="section2">
            <div id="section2_2"></div>
        </div>
        <div id="section3">
            <div id="calendar">
                <div id="month">

                </div>
                <div id="line2"></div>
                <div id="date">
                <div id="column1">
                <div id="1">1</div>
                <div id="6">6</div>
                <div id="11">11</div>
                <div id="16">16</div>
                <div id="21">21</div>
                <div id="26">26</div>
                <div id="31">31</div>
                </div>

                <div id="column2">
                <div id="2">2</div>
                <div id="7">7</div>
                <div id="12">12</div>
                <div id="17">17</div>
                <div id="22">22</div>
                <div id="27">27</div>
                </div>
                
                <div id="column3">
                <div id="3">3</div>
                <div id="8">8</div>
                <div id="13">13</div>
                <div id="18">18</div>
                <div id="23">23</div>
                <div id="28">28</div>
                </div>
                

                <div id="column4">
                <div id="4">4</div>
                <div id="9">9</div>
                <div id="14">14</div>
                <div id="19">19</div>
                <div id="24">24</div>
                <div id="29">29</div>
                </div>
                
                <div id="column5">
                <div id="5">5</div>
                <div id="10">10</div>
                <div id="15">15</div>
                <div id="20">20</div>
                <div id="25">25</div>
                <div id="30">30</div>
                </div>

                </div>
                                

            </div>
        </div>
        <script src="home.js"></script>
    </body>
</html>


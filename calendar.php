<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $db="login_it";

    session_start();

    if(!isset($_SESSION["username"]))
    {
        header("location:login.php");
    }

    define('__HEADER_FOOTER_PHP__', true);

    $data=mysqli_connect($host,$user,$password,$db);

    $mysqli = require  __DIR__ . "/database.php";

    $username = $_SESSION["username"];

    $sql="SELECT * FROM tickets WHERE employeeid='".$username."'";
    $fetch_event=mysqli_query($data,$sql);
?>
<html>
<head>
    <title>Ticket Calendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0; padding: 40px ;background-color: cadetblue; color: aliceblue">
    <a style="text-decoration: none; color: aliceblue; font-size: xx-large " href="adminhome.php">iTicket</a>
</div>

<nav class="navbar navbar-expand-sm justify-content-center" style=" background-color: #3f7778; color: #f0f8ff">
    <ul class="navbar-nav">
        <li class="nav-item" ><a class="nav-link" href="adminhome.php" style="color: aliceblue; ">Home</a></li>

        <li class="nav-item" ><a class="nav-link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="color: aliceblue; ">About</a></li>

        <li class="nav-item" ><a class="nav-link" href="adminCreate.php" style="color: aliceblue; ">Register Users</a></li>

        <li class="nav-item" ><a class="nav-link" href="admin_dash.php" style="color: aliceblue; ">View Tickets</a></li>

        <!--    TOOK THIS FROM CODE I WROTE IN A PREVIOUS PROJECT, have to edit it. JUST PROOF OF CONCEPT HERE -->
        <?php if (isset($_SESSION['username'])): ?>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['username'] ?>'s Account
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" style = "color: #1C5E33" href="<?php echo "user_viewTickets.php" ?>">Dashboard</a></li>
                    <li><a class="dropdown-item" style = "color: #1C5E33" href="<?php echo "logout.php" ?>">LogOut</a></li>
                </ul>
            </div>
        <?php else: ?>
            <li class="nav-item" ><a class="nav-link rounded" href="<?php echo "login.php" ?>" style = "color: #174142; border: 2px solid #3f7778;  display: inline-block; background-color: #f0f8ff; padding: 5px"> Login</a></li>
        <?php endif; ?>

    </ul>
</nav>
    <h2><center>Ticket Calendar</center></h2>
    <div class="container">
        <div id="calendar"></div>
    </div>
    <br>
</body>
</html>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events:[
                <?php
                while($result = mysqli_fetch_array($fetch_event))
                { ?>
                {
                    title: '<?php echo $result['id']; ?>',
                    start: '<?php echo $result['date']; ?>',
                    end: '<?php echo $result['date']; ?>',
                    color: 'yellow',
                    textColor: 'black'
                },
                <?php } ?>
            ]
//This calendar was inspired by these two sources:
//https://codeshack.io/event-calendar-php/
//https://techareatutorials.com/how-to-fetch-events-from-the-database-in-javascript-fullcalendar/
        });
    });
</script>

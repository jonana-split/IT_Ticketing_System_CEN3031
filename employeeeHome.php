#!/usr/local/bin/php
<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$db="login_it";

session_start();

$data=mysqli_connect($host,$user,$password,$db);

$username=$_SESSION['username'];

$sql="SELECT * FROM users WHERE username='".$username."'";

$result=mysqli_query($data,$sql);

$row=mysqli_fetch_array($result);

if($row["usertype"]=="user")
{
    header("location:userhome.php");
}else if($row["usertype"]=="employee"){
    header("location:employeehome.php");
}

define('__HEADER_FOOTER_PHP__', true);
if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>adminHome</title>
</head>


<body style="font-family: K2D; background-color: #e0f2f3">

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

<div class="justify-content-center text-center" style="margin-top: 50px; color: #174142">
    <h5>Register Users Here</h5>
    <h3>Create Admins, Employees, and Users</h3>
    <br>

    <p style="text-align: center"><a href="adminCreate.php">Register Users</a></p>

    <br>

    <a href="logout.php"> Logout :D </a>

</div>

<footer class="text-center" style="background-color: #3f7778; color: #F0F8FFFF; padding: 15px">

    <p>&copy Debug Divas 2024</p>
    <p>CEN3031 Final Project</p>

</footer>
</body>

</html>
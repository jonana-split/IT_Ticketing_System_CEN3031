#!/usr/local/bin/php

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Register for iTicket</title>

    <!-- MAKE STYLE SHEET -->
    <style>
        form {
            margin: 0 auto;
            width: 350px;
            background-color: aliceblue;
            border: 2px #3f7778 solid;
            padding: 20px;
        }


    </style>
</head>

<body style="font-family: K2D; background-color: #e0f2f3">

<div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0; padding: 40px ;background-color: cadetblue; color: aliceblue">
    <h3>iTicket</h3>
</div>

<nav class="navbar navbar-expand-sm justify-content-center" style=" background-color: #3f7778; color: #f0f8ff">
    <ul class="navbar-nav">
        <li class="nav-item" ><a class="nav-link" href="index.php" style="color: aliceblue; ">Home</a></li>

        <li class="nav-item" ><a class="nav-link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="color: aliceblue; ">Create Ticket</a></li>

        <li class="nav-item" ><a class="nav-link" href="login.php" style="color: aliceblue; ">Login</a></li>

    </ul>
</nav>

<!-- CITE and change up the styling here and above a little: https://www.youtube.com/watch?v=ShbHwaiyOps -->

<br>
<h3 style="text-align: center; color: #3f7778">Register</h3>
<form class="" action="createAccount.php" method="POST" novalidate>
    <div class="input-group">
        <label style="padding: 5px; margin: 5px;text-align: left; ">Username</label>
        <input style="padding: 5px; margin: 5px; width: 100%" type="text" id="username" name="username">
    </div>

    <div class="input-group" >
        <label style="padding: 5px; margin: 5px;text-align: left; ">Password</label>
        <input style="padding: 5px; margin: 5px; width: 100%" type="password" id="password" name="password">
    </div>

    <div class="input-group" >
        <label style="padding: 5px; margin: 5px;text-align: left; ">Confirm Password</label>
        <input style="padding: 5px; margin: 5px; width: 100%" type="password" id="passwordConfirm" name="passwordConfirm">
    </div>

    <div class="input-group" >
        <label style="padding: 5px; margin: 5px;text-align: left; ">Email</label>
        <input style="padding: 5px; margin: 5px; width: 100%" type="email" id="email" name="email">
    </div>

    <br>

    <div class="input-group justify-content-center" >
        <button style="padding: 5px; margin: 5px; width: 40%;" type="submit" name="regAccount">Register</button>
    </div>

    <br>

    <p style="text-align: center">Already have an account? <a href="register.php">Login here.</a></p>
</form>

<br>

<footer class="text-center" style="background-color: #3f7778; color: #F0F8FFFF; padding: 15px">

    <p>&copy Debug Divas 2024</p>
    <p>CEN3031 Final Project</p>

</footer>

</body>
</html>

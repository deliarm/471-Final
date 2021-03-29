<?php
session_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href ="style.css">
</head>

<body>

    <div class="login-box">
        <h1>Login</h1>
        <!-- UID box-->
        <form action="login.php" method="post">
            <div class="txt_field">
                <input type="text" required id="UniversityID" name="UniversityID">
                <span></span>
                <label>University ID</label>
            </div>
            <!-- password box-->
            <div class="txt_field">
                <input type="password" required id="password" name="password">
                <span></span>
                <label>Password</label>
            </div>
            <!-- dropdwon-->
            <select name="priority" class="select-css">
                <option value = "Student">Student</option>
                <option value = "Admin">Administrator</option>
            </select>
            <br>
            <!-- sign in button-->
            <input type="submit" value="Sign In" id="SB">
            <div id="red-text" style="visibility: hidden"> 
                Invalid login 
            </div>
            <div class="register_Link">
                Not A student? <a href="#">Click Here</a>
            </div>

        </form>
    </div>



</body>
</html>
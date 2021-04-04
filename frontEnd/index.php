<?php
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
            <select id="priority" name="priority" class="select-css">
                <option value = "0">Student</option>
                <option value = "1">Administrator</option>
            </select>
            <br>
            <!-- sign in button-->
            <input type="submit" value="Sign In" id="SB">
            <br>
            <div class=red-text id=red-text style='width: 180px; height: 24px; margin-left: auto; margin-right: auto'>
                Invalid Login Credentials
            </div>
            <br>
            <div class="register_Link">
                Not A student? <a href="https://www.ucalgary.ca/future-students/undergraduate/apply">Click Here</a>
            </div>

        </form>
    </div>



</body>
</html>
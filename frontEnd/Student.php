<?php
    session_start();
?>

<html>
    <head>
        <meta charset= "US-ASCII">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "student.css">
        <script defer src = "https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <Title>
            Schedule Page
        </Title>
    </head>
    <body>
        <h1> Student <?php echo $_SESSION['Fname']; ?> <?php echo $_SESSION['Lname']; ?></h1>
<!--Searc Button-->
<div class = "Search-Courses-Box" >
    <input class = "Search-Text" type="text" name = "" placeholder = "Type in Your Course!" >
    <a class = "search-button" href = "#">
    <i class = "fas fa-search"></i>
    </a>

</div>

<div class="button-container">
    <button class = "View-Current-Courses" id="View-Current-Courses">View Current Courses</button>
    <button class = "Select-Courses" id="Select-Courses">Select Courses</button>
</div>


    </body>
</html>
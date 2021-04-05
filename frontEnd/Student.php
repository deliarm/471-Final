<?php
    session_start(); // delete theste 3 lines 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset= "US-ASCII">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Student Page</Title>
    <link rel="stylesheet" href="admin.css">
</head>
    
<body>

<header>
    <nav>
        <h1> Hello <?php echo $_SESSION['Fname']; ?> <?php echo $_SESSION['Lname'];?> </h1> // delete this line
        
        <ul class="tabs">
            <li class="tab is-active">
                <a data-switcher data-tab="1"> Enroll in a Course </a>
            </li>
            <li class="tab">
                <a data-switcher data-tab="2"> Drop a Course </a>
            </li>
            <li class="tab">
                <a data-switcher data-tab="3"> View Courses </a>
            </li>
        </ul>
    </nav>
</header>



<main>
    <section class="pages"> 
    <div class="page is-active" data-page="1">
        <h2>Page 1 working</h2>
        <p>Welcome to the enroll page</p>
    </div>

    <div class="page" data-page="2">
        <h2>Page 2</h2>
        <p>Welcome to the drop Course page</p>
    </div>

    <div class="page" data-page="3">
        <h2>Page 3</h2>
        <p>Welcome to the view page</p>
    </div>
    </section>
</main>

// insert footer
<!--Footer-->
<div class = "Footer">
    <div class = "Inner_Footer">
        <div class = "logo_container">
            <img src = img/Logo.jpg></img>
        </div>
        <div class = "Links">
            <h1>Github Accounts</h1>
            <a href = "https://github.com/nchahal3">Navroop Chahal</a> 
            <a href = "https://github.com/deliarm">Deliar Mohammadi</a>
            <a href = "https://github.com/jessicaljx1">Jiexin (Jessica) Liu</a>
        </div>
        <div class = "Links">
            <h1>Academics</h1>
            <a href = "https://www.ucalgary.ca">Ucalgary</a> 
            <a href = "https://contacts.ucalgary.ca/directory/departments">Department & Programs</a>
            <a href = "https://www.ucalgary.ca/future-students">Undergraduate Studies</a>
            <a href = "https://library.ucalgary.ca">University Library</a>
        </div>
        <div class = "Links">
            <h1>Media & Publications</h1>
            <a href = "https://www.ucalgary.ca/ucalgary-news">News</a> 
            <a href = "https://ucalgary.ca/student-services/marcom/uthisweek">UThisWeek</a>
            <a href = "https://www.su.ucalgary.ca">Student Union</a>
        </div>
        <div class = "Links">
            <h1>External</h1>
            <a href = "localhost/htdocs/index.php">Logout</a> 
        </div>
    </div>
</div>
   
<script src="admin.js"></script>
</body>
</html>

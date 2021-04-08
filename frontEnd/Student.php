<?php
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset= "US-ASCII">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Student Page</Title>
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js"></script>
    <script src="stickyFooter.js"></script>
</head>
    
<body>

<header>
    <nav>
        <h1> Hello <?php echo $_SESSION['Fname']; ?> <?php echo $_SESSION['Lname'];?> <?php echo $_SESSION['ID'];?> </h1> 
        
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

    <!-- BEGIN ENROLL PAGE -->
    <div class="page is-active" data-page="1">
        <h2>Enroll In A Course</h2>
        <br>
        <div class="enrollBox">
            <form action="enroll.php" method="post" onsubmit="setTimeout(function(){window.location.reload();},10);">
                <?php
                    $temp = $_SESSION['ID'];
                    $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                    $sql = "SELECT * FROM course";
                    $result = mysqli_query($link,$sql);
                    if($result->num_rows != 0){
                        echo '<select name="course" id="course">';
                        echo '<option value="none"> Select A Course</option>';
                        $num_results = mysqli_num_rows($result);
                        for ($i=0;$i<$num_results;$i++) {
                            $row = mysqli_fetch_array($result);
                            $num  = $row['Number'];
                            $name = $row['Name'];
                            $Dname = $row['DeptName'];
                            $profID = $row['ProfessorUID'];
                            
                            $sql2    = "SELECT * FROM person WHERE UniversityID=$profID";
                            $result2 = mysqli_query($link,$sql2);
                            $row2 = mysqli_fetch_array($result2);
                            $First = $row2['Fname'];
                            $Last = $row2['Lname'];
                            echo '<option value="'.$num.'">'.$Dname. " " .$num. " \t, ".$name." ,\t Professor: ".$First." ".$Last. '</option>';
                        }
                        echo '</select>';
                        echo '</label>';
                    }
                    mysqli_close($link);
                ?>
                <br>
                <select name="semester" id="semester">
                    <option value="Fall 2021"> Fall 2021</option>
                    <option value="Winter 2022"> Winter 2022</option>
                    <option value="Spring 2022"> Spring 2022</option>
                    <option value="Summer 2022"> Summer 2022</option>
                </select>
                <br>
                <input type="submit" value="Enroll In Course" id="SB">
                <br>
                <br>
                <div class=greentext5 id=greentext5 style='width: 260px; height: 20px; margin-left: auto; margin-right: auto' >
                    Successfully Enrolled in Course
                </div>
                <div class=redtext5 id=redtext5 style='width: 200px; height: 20px; margin-left: auto; margin-right: auto' >
                    Failed To Enroll in Course
                </div>
            </form>
        </div>
    </div>
    <!-- END ENROLL PAGE -->



    <!-- BEGIN DROP PAGE -->
    <div class="page" data-page="2">
        <h2>Drop A Course</h2>
        <br>
        <div class="dropBox">
            <form action="drop.php" method="post" onsubmit="setTimeout(function(){window.location.reload();},10);">
                <?php
                    $temp = $_SESSION['ID'];
                    $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                    $sql = "SELECT * FROM enrolled WHERE StudentUID=$temp";
                    $result = mysqli_query($link,$sql);
                    if($result->num_rows != 0){
                        echo '<select name="dropped" id="course">';
                        echo '<option value="none"> Select A Course</option>';
                        $num_results = mysqli_num_rows($result);
                        for ($i=0;$i<$num_results;$i++) {
                            $row = mysqli_fetch_array($result);
                            $num  = $row['CourseNum'];
                            $name = $row['CourseName'];
                            
                            $sql2 = "SELECT * FROM course WHERE Number=$num";
                            $result2 = mysqli_query($link,$sql2);
                            $row2 = mysqli_fetch_array($result2);
                            $Dname = $row2['DeptName'];
                           
                            echo '<option value="'.$num.'">' .$Dname. "\t,".$num. " \t, " .$name. '</option>';
                        }
                        echo '</select>';
                        echo '</label>';
                    }
                    mysqli_close($link);
                ?>
                <br>
                <br>
                <input type="submit" value="Drop Course" id="SB">
                <br>
                <br>
                <div class=greentext6 id=greentext6 style='width: 260px; height: 20px; margin-left: auto; margin-right: auto' >
                    Successfully Enrolled in Course
                </div>
                <div class=redtext6 id=redtext6 style='width: 200px; height: 20px; margin-left: auto; margin-right: auto' >
                    Failed To Enroll in Course
                </div>
            </form>
        </div>
    </div>
    <!-- END DROP PAGE -->



    <!-- BEGIN VIEW PAGE -->
    <div class="page" data-page="3">
        <h2>Page 3</h2>
        <p>Welcome to the view page</p>
    </div>
    </section>
    <!-- BEGIN VIEW PAGE -->


</main>



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
            <a href = "http://localhost/471-final/frontEnd/index.php">Logout</a> 
        </div>
    </div>
</div>
   
<script src="admin.js"></script>
</body>
</html>

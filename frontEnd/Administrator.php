<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset= "US-ASCII">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Admin Page</Title>
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js"></script>
    <script src="stickyFooter.js"></script>
</head>
    
<body>


<header>
    <nav>
        <h1> Hello <?php echo $_SESSION['Fname']; ?> <?php echo $_SESSION['Lname'];?> </h1>
        <ul class="tabs">
            <li class="tab is-active">
                <a data-switcher data-tab="1"> Add Course </a>
            </li>
            <li class="tab">
                <a data-switcher data-tab="2"> Remove Course </a>
            </li>
            <li class="tab">
                <a data-switcher data-tab="3"> Add Student </a>
            </li>
            <li class="tab">
                <a data-switcher data-tab="4"> Remove Student </a>
            </li>
        </ul>
    </nav>
</header>

<main>
    <section class="pages"> 
        <!-- START  OF ADD COURSE PAGE -->
        <div class="page is-active" data-page="1">
            <h2>Add a New Course</h2>
            <div class="newCourse-box">
                <form action="addCourse.php" method="post">

                    <div class="txt_field">
                        <input type="text" required id="CourseNum" name="CourseNum" >
                        <span></span>
                        <label> New Course Number</label>
                    </div>
                    <div class="txt_field">
                        <input type="txt_field" required id="CourseName" name="CourseName">
                        <span></span>
                        <label> New Course Name</label>
                    </div>

                    <?php
                        $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                        $sql = "SELECT DepartmentName FROM department";

                        $result = mysqli_query($link,$sql);
                        if ($result -> num_rows != 0) {
                            echo '<select name="DepartmentName">';
                            echo '<option value="none">Select Department</option>';
                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $DepName = $row['DepartmentName'];
                                echo '<option value="'.$DepName.'">' .$DepName. '</option>';
                            }
                            echo '</select>';
                            echo '</label>';
                        }
                        mysqli_close($link);
                    ?>
                    <br>

                    <?php
                        $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                        $sql = "SELECT UniversityID FROM professor";

                        $result = mysqli_query($link,$sql);
                        if ($result -> num_rows != 0) {
                            echo '<select name="ProfID">';
                            echo '<option value="none">Select Professor</option>';
                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $Pnum = $row['UniversityID'];
                                $sql2 = "SELECT * FROM person WHERE UniversityID=$Pnum";
                                $result2 = mysqli_query($link,$sql2);
                                if($result2 -> num_rows != 0){
                                    $sec = mysqli_fetch_array($result2);
                                    $Fname = $sec['Fname'];
                                    $Lname = $sec['Lname'];
                                }
                                echo '<option value="'.$Pnum.'">' .$Pnum." \t, ".$Fname." ".$Lname. '</option>';
                            }
                            echo '</select>';
                            echo '</label>';
                        }
                        mysqli_close($link);
                    ?>
                    <br>

                    <?php
                        $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                        $sql = "SELECT * FROM classroom";

                        $result = mysqli_query($link,$sql);
                        if ($result -> num_rows != 0) {
                            echo '<select name="RoomID">';
                            echo '<option value="none">Select Room and Building</option>';
                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $room = $row['RoomNum'];
                                $name2 = $row['Building']; 
                                echo '<option value="' .$room. '">' .$room." \t, ".$name2. '</option>';
                            }
                            echo '</select>';
                            echo '</label>';
                        }
                        mysqli_close($link);
                    ?>
                   
                    <br>
                    <!-- sign in button-->
                    <input type="submit" value="Add Course" id="SB">
                    <br>
                    <br>
                    <div class=redtext id=redtext style='width: 300px; height: 20px; margin-left: auto; margin-right: auto' >
                        Failed to insert course due to invalid input
                    </div>
                    <div class=greentext id=greentext style='width: 300px; height: 20px; margin-left: auto; margin-right: auto' >
                        Successfully Added New Course
                    </div>
                </form>
            </div>
        </div>
        <!-- END OF ADD COURSE PAGE -->




        <!-- START OF REMOVE COURSE PAGE -->
        <div class="page" data-page="2">
            <h2>Remove A Course </h2>
            <br>
            <div class="removeCourseBox">
                <form action="removeCourse.php" method="post" >
                    <?php
                        $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                        $sql = "SELECT * FROM course";

                        $result = mysqli_query($link,$sql);
                        if ($result -> num_rows != 0) {
                            echo '<select name="Courses">';
                            echo '<option value="none">Select Course To Be Removed</option>';
                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $num  = $row['Number'];
                                $name = $row['Name'];
                                $dept = $row['DeptName'];
                                echo '<option value="'.$num.'">' .$num. " \t, ".$name." \t, ".$dept. '</option>';
                            }
                            echo '</select>';
                            echo '</label>';
                        }
                        mysqli_close($link);
                    ?>
                    <br>
                    <input type="submit" value="Remove Course" id="SB">
                    <br>
                    <br>
                    <div class=greentext2 id=greentext2 style='width: 280px; height: 20px; margin-left: auto; margin-right: auto' >
                        Successfully Removed Course
                    </div>
                    <div class=redtext2 id=redtext2 style='width: 280px; height: 20px; margin-left: auto; margin-right: auto' >
                        Error Removing Course, Try Again
                    </div>
                </form>
            </div>
        </div>
        
        <!-- END OF REMOVE COURSE PAGE -->





        <!-- START OF ADD STUDENT PAGE -->
        <div class="page" data-page="3">
            <h2>Add A New Student</h2>
            <div class="AddStudentBox">
                <form action="AddStudent.php" method="post">
                <div class="txt_field">
                    <input type="text" required id="idNum" name="idNum" >
                    <span></span>
                    <label> New ID Number</label>
                </div>
                <div class="txt_field">
                    <input type="txt_field" required id="Fname" name="Fname">
                    <span></span>
                    <label> Student's First Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" required id="CourseNum" name="CourseNum" >
                    <span></span>
                    <label> New Course Number</label>
                </div>
                <div class="txt_field">
                    <input type="txt_field" required id="CourseName" name="CourseName">
                    <span></span>
                    <label> New Course Name</label>
                </div>


                </form>
            </div>
        </div>
        <!-- END OF ADD STUDENT PAGE -->






        <!-- START OF REMOVE STUDENT PAGE -->
        <div class="page" data-page="4">
            <h2>Page 4</h2>
            <p>Welcome to the remove student page</p>
        </div>
        <!-- END OF REMOVE STUDENT PAGE -->

    </section>
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

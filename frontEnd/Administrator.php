<?php
    session_start();
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
            <h2>Add a New Course Below</h2>
            <div class="newCourse-box">
                <form action="addCourse.php" method="put">
                    <div class="txt_field">
                        <input type="text" required id="CourseNum" name="CourseNum" placeholder="New Course Number">
                    </div>
                    <!-- password box-->
                    <div class="txt_field">
                        <input type="txt_field" required id="CourseName" name="CourseName" placeholder="New Course Name">
                    </div>

                    <?php
                        $link = mysqli_connect("localhost","root","navjesdel123","finalproject");
                        $sql = "SELECT DepartmentName FROM department";

                        $result = mysqli_query($link,$sql);
                        if ($result -> num_rows != 0) {
                            echo '<label>Department:';
                            echo '<select name="DepartmentName">';
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
                            echo '<label>Professor:';
                            echo '<select name="ProfID">';

                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $num = $row['UniversityID'];
                                $sql2 = "SELECT * FROM person WHERE UniversityID=$num";
                                $result2 = mysqli_query($link,$sql2);
                                if($result2 -> num_rows != 0){
                                    $sec = mysqli_fetch_array($result2);
                                    $Fname = $sec['Fname'];
                                    $Lname = $sec['Lname'];
                                }
                                echo '<option value="'.$num.'">' .$num." \t, ".$Fname." ".$Lname. '</option>';
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
                            echo '<label>Classroom Number:';
                            echo '<select name="RoomID">';

                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $name = $row['RoomNum'];
                                $name2 = $row['Building']; 
                                echo '<option value="' .$name. '">' .$name." \t, ".$name2. '</option>';
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
                </form>
            </div>
        </div>
        <!-- END OF ADD COURSE PAGE -->


        <!-- START OF REMOVE COURSE PAGE -->
        <div class="page" data-page="2">
            <h2>Page 2</h2>
            <p>Welcome to the remove Course page</p>
        </div>
        <!-- END OF REMOVE COURSE PAGE -->


        <!-- START OF ADD STUDENT PAGE -->
        <div class="page" data-page="3">
            <h2>Page 3</h2>
            <p>Welcome to the add student page</p>
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







<script src="admin.js"></script>
</body>
</html>

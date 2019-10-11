<?php
        include ("custom_functions.php");
        $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");


        $id = $_GET["id"];
        $varsity=$_GET["varsity_name"];
        $dept = $_GET["department"];
        $semester = $_GET["semester"];
        $session = $_GET["session"];
        $lecture_link = $_GET["fileurl"];
        $video_link = $_GET["video_url"];
        $message = $_GET["message"];

        $query = "INSERT INTO lectureupload(StudentId,varsity_name, department, semester, session, fileUrl,video_url,message) 
                                VALUES ('$id','$varsity','$dept','$semester','$session','$lecture_link','$video_link','$message')";

        $query2="UPDATE lectureupload_crowd_source_system SET status='1' WHERE StudentId='".$id."'";

        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query2);
        if ($result & $result2) {
           // $error="data inserted successfully";
            phpalert('Data inserted successfully');
        } else {
           // $error="data insertion failed";
            phpalert('Data insertion failed');
        }


        header("Location: admin_panel.php");

        ?>
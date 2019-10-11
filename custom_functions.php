<?php

    function phpalert($msg)
    {
        echo ' <script type="text/javascript">alert("'.$msg.' ")</script>';
    }

    function codeToSession($msg)
    {

        $session_list = array("1701"=>"spring 17","1702"=>"Fall 17","1801"=>"spring 18","1802"=>"Fall 18","1901"=>"spring 19","1902"=>"Fall 19"
                        ,"2001"=>"spring 20");

        $val=$session_list[$msg];
        return $val;
    }
    function codeToSemester($msg)
    {

        $semester_list = array("1"=>"1.1", "2"=>"1.2", "3"=>"2.1","4"=>"2.2","5"=>"3.1","6"=>"3.2",
            "7"=>"4.1","8"=>"4.2");

        $val=$semester_list[$msg];
        //echo $val;
        return $val;
    }
    function getvarsityImagePath($var)
    {
        $images_path=array("aust"=>"images/varsity/aust.jpg","buet"=>"images/varsity/Buet.jpg","cuet"=>"images/varsity/CUET.jpg","ruet"=>"images/varsity/ruet.jpg",
            "kuet"=>"images/varsity/kuet.jpg","sust"=>"images/varsity/SUST.jpg","du"=>"images/varsity/DU.jpg");

        $path=$images_path[$var];
        return $path;

    }


?>
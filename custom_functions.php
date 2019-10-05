<?php
    function phpalert($msg)
    {
        echo ' <script type="text/javascript">alert("'.$msg.' ")</script>';
    }


    function load_university_names()
    {

        $GLOBALS['varsity_names']= array("1"=>"aust","2"=>"buet","3"=>"cuet","4"=>"kuet","5"=>"ju","6"=>"du","7"=>"dm","8"=>"ruet","9"=>"sust");

        /*foreach($varsity_names as $x=>$x_value)
        {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }*/
        //echo $varsity_names['1'];
    }
    load_university_names();
?>
<?php



    function phpalert($msg)
    {
        echo ' <script type="text/javascript">alert("'.$msg.' ")</script>';
    }

    function getVarsityName()
    {
        $varsity='';
        if(isset($GLOBALS['varsity_name']))
        {
            echo "HI";
            $varsity=$GLOBALS['varsity_name'];
        }
        return $varsity;
    }
    function setVarsityName($varsity)
    {
        $GLOBALS['varsity_name']=$varsity;

    }

?>
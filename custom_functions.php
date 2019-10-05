<?php
    function phpalert($msg)
    {
        echo ' <script type="text/javascript">alert("'.$msg.' ")</script>';
    }

    function getVarsityName()
    {
        return $GLOBALS['varsity_name'];
    }
    function setVarsityName($varsity)
    {
        $GLOBALS['varsity_name']=$varsity;

    }

?>
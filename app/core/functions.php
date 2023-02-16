<?php 

    function show($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function check_error(){
        if(isset($_SESSION['error']) && $_SESSION['error']!="")
        {
            
            echo "<script>alert('".$_SESSION['error']."')</script>";
            unset($_SESSION['error']);
        }
    }
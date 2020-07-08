<?php
    if(isset($_POST["contact-submit"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        
        echo $name." ".$email;
    }
    else
    {
        header("Location: ../../index.php?#contact-me");
    }
?>
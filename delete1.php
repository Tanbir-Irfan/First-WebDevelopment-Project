<?php
    require_once("connection.php");
    $username=$_REQUEST["username"];
    $password=$_REQUEST["password"];
    if($username!=""&&$password!="")
    {

    }
    else{
        if($email!=""&&$password==""){
            echo "Enter the password";
        }
        else{
            echo "blank";
        }
    }
?>
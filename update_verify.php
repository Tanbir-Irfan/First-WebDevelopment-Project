<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    #para{
        margin-left:500px;
        margin-top:100px;
    }
    .div1{
        margin-left:430px;
    }
    label{
        color: #473953;
    }
    input{
        width:165px;
        height:25px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body> 
    <div id="para">
    <p>&nbsp;</p>
    </div>
    
    <p style="background: #575b6e;margin-left: 335px;font-size: 17px;margin-bottom: 30px;padding: 8px;margin-top: 0px;border-radius: 5px;color: #ebefef;text-align: center; width:445px;">/* Please enter your email and password to verify for updating */</p>

    <?php
        if(isset($_REQUEST["warning"]))
        {?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#para").html('<p style="color:red;margin-left: -195px;">There is no account with this email and please create an account with  this email</p>');
            });
        </script>
        <?php
        }
        if(isset($_REQUEST["inform"]))
        {?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#para").html('<p style="color:Green;margin-left: -135px;">/* Please enter your email id and password for updating */</p>');
            });
        </script>
        <?php 
        } 
        if(isset($_REQUEST["comment"]))
        {?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#para").html('<p style="color:Green;margin-left: -135px;">/* Account Updated Successfully and Go Back for log in */</p>');
            });
        </script>
        <?php }?>
    <div class="div1">
        <form action="logindb.php?update" method="POST">
        <label><b>Username&nbsp;:</b></label>
            <input type="email" name="email" placeholder="name@gmail.com" value="<?php
            if(isset($_REQUEST["emailid"]))
            {
                $emailid=$_REQUEST["emailid"];
                echo $emailid;
            }
            ?>">
            <?php
                if(isset($_REQUEST["email_"]))
                {
                    $email_=$_REQUEST["email_"];
                    echo "<font color='red'><sup>*</sup>$email_</font>";
                }
            ?>
            <br><br>
            <label><b>Password&nbsp;&nbsp;:</b></label>
            <input type="password" name="password" placeholder="******"
            value="<?php
                if(isset($_REQUEST["password_"]))
                {
                    $password=$_REQUEST["password_"];
                    echo $password;
                }
            ?>">
            <?php
                if(isset($_REQUEST["password"]))
                {
                    $password=$_REQUEST["password"];
                    echo "<font color='red'><sup>*</sup>$password</font>";
                }
            ?>
            <br><br>
            <button type="button" style="background:#6b6b6b;height:25px;margin-left:35px;" name="button"><a href="login.php" style="text-decoration:none;color:white;display:block;font-weight:bold;padding:4px;">&laquo;
            &nbsp;Go Back</a></button>
            <input type="submit" name="submit" style="background: #6b6b6b;color: white;padding: 5px 15px;width: 70px;font-weight: bold;float: right;margin-bottom: 15px;margin-right:480px;" value="Submit">
        </form>
    </div>
</body>

</html>
</html>
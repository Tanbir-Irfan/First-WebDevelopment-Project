<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    #para{
        margin-left:140px;
        margin-top:100px;
    }
    .div1{
        margin-left:430px;
    }
    .div2{
        margin-left:345px;
        margin-top: 35px;
    }
    .div2 ul{
        list-style-type:none;
    }
    .div2 ul li{
            
    }
    .div2 ul li a{
        display:block;
        float:left;
        color:black;
        margin-left:15px;
        color: #473953;
    }
    label{
        color: #473953;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body> 
    <div id="para">
    <p>&nbsp;</p>
    </div>
    
    <p style="background: #575b6e;margin-left: 500px;font-size: 20px;width: 90px;margin-bottom: 30px;padding: 5px;margin-top: 0px;border-radius: 5px;color: #ebefef;font-weight: bold;text-align: center;">Log In</p>

    <?php
        if(isset($_REQUEST["warning"]))
        {?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#para").html('<p style="color:red;margin-left: 155px">There is no account with this email and please create an account with  this email</p>');
            });
        </script>
        <?php
        }
        if(isset($_REQUEST["inform"]))
        {?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#para").html('<p style="color:Green;margin-left: 240px;">/* Please enter your email id and password for login */</p>');
            });
        </script>
        <?php } ?>
    
    <div class="div1">
        <form action="logindb.php" method="POST">
        <label><b>Username&nbsp;:</b></label>
            <input type="email" name="email" placeholder="name@gmail.com" style="width:150px;height:20px;" value="<?php
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
            <input type="password" name="password" placeholder="******" style="width:150px;height:20px;"
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
            <input type="submit" name="submit" style="background: #6b6b6b;color: white;padding: 5px 15px;margin-top: -5px;width: 70px;font-weight: bold;float: right;margin-bottom: 15px;margin-right:467px;" value="Submit">
        </form>
    </div>
    <div class="div2">
        <ul>
            <li><a href="create_account.php">Create Account</a></li>
            <li><a href="update_verify.php">Update Account</a></li>
            <li><a href="delete_verify.php">Delete Account</a></li>
        </ul>
    </div>
</body>

</html>
</html>
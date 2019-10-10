<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
    body{
        margin:0;
    }
    .div1{
        margin-left: 400px;
        padding-top: 20px;
    }    
    fieldset{
        width:255px;
        padding-right:0px;
        font-size: 14px;
        margin-left:400px;
        float:left;
    }
    input
    {
        width:165px;
        height:25px;
    }
    #status{
        margin-left:500px;
    }
    #status p{
        margin-top:15px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <div id="status">
        <p>&nbsp;</p>
    </div>
    <?php
        if(isset($_REQUEST["warning"]))
        {?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#status").html('<p style="color:green;margin-left:-65px;">/* Please fill up all the fields */</p>');
                });
            </script>
    <?php }
        else if(isset($_REQUEST["comment"]))
        {?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#status").html('<p style="color:green;margin-left:-70px;">Account Created Successfully!!!</p>');
                });
            </script>
    <?php }
        else if(isset($_REQUEST["inform"]))
        {?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#status").html('<p style="color:red;margin-left:-100px;">An account with this email is already exit</p>');
                });
            </script>
    <?php }
    ?>
    <form action="create_account_data.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend style="font-size: 22px;color: #403f3f;text-align: center;border-bottom:1.5px solid #656565;margin-bottom:2px;"><b>Personal Information</b></legend><br>
            <label>First Name&nbsp;:</label>
            <input type="text" name="fname" placeholder="first name" value="<?php
                if(isset($_REQUEST["i1"])){
                    if($_REQUEST["i1"]!="n")
                    {
                        echo $_REQUEST["i1"];
                    }
                }
                else if(isset($_REQUEST["fname"]))
                {
                    echo $_REQUEST["fname"];
                }
            ?>"><br><br>
            <label>Last Name&nbsp;:</label>
            <input type="text" name="lname" placeholder="last name" value="<?php
                if(isset($_REQUEST["i2"])){
                    if($_REQUEST["i2"]!="n")
                    {
                        echo $_REQUEST["i2"];
                    }
                }
                else if(isset($_REQUEST["lname"]))
                {
                    echo $_REQUEST["lname"];
                }
            ?>"><br><br>
            <label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input type="email" name="email" placeholder="address@gmail.com" value="<?php
                if(isset($_REQUEST["i3"])){
                    if($_REQUEST["i3"]!="n")
                    {
                        echo $_REQUEST["i3"];
                    }
                }
                else if(isset($_REQUEST["email"]))
                {
                    echo $_REQUEST["email"];
                }
            ?>"><br><br>
            <label>Password&nbsp;&nbsp;&nbsp;:</label>
            <input type="password" name="password" placeholder="********" value="<?php
                if(isset($_REQUEST["i4"])){
                    if($_REQUEST["i4"]!="n")
                    {
                        echo $_REQUEST["i4"];
                    }
                }
            ?>"><br><br>
            <label>Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input type="file" name="file" style="width:184px;" accept="image/*"><br><br>
            <label>Comment&nbsp;&nbsp;:</label><br>
            <textarea rows="10" cols="40" style="margin-top: 5px;" name="comment" placeholder="comment..."><?php 
                if(isset($_REQUEST["i6"]))
                {
                    if($_REQUEST["i6"]!="n")
                    {
                        echo $_REQUEST["i6"];
                    }
                }
                else if(isset($_REQUEST["comment_"]))
                {
                    echo $_REQUEST["comment_"];
                }
            ?></textarea>
            <br>
            <button type="button" style="background:#6b6b6b;height:25px;" name="button"><a href="login.php" style="text-decoration:none;color:white;display:block;font-weight:bold;padding:4px">&laquo;
            &nbsp;Go Back</a></button>
            <input type="submit" name="submit" style="margin-left:88px;background:#6b6b6b;color:white;padding:5px 15px;margin-top: 10px;width:70px;font-weight:bold;" value="Submit">
            </fieldset>
        </form>
        <div id="fill" style="margin-top:65px;">
            <div id="fill1"><p>&nbsp;</p></div>
            <div id="fill2" style="margin-top: 30px;"><p>&nbsp;</p></div>
            <div id="fill3" style="margin-top: 30px;"><p>&nbsp;</p></div>
            <div id="fill4" style="margin-top: 28px;"><p>&nbsp;</p></div>
            <div id="fill5" style="margin-top: 20px;"><p>&nbsp;</p></div>
            <div id="fill6" style="margin-top: 100px;"><p>&nbsp;</p></div>
        </div>

        <?php
        if(isset($_REQUEST["field"]))
        {
            $count=1;
            while($count<7)
            {
                if($_REQUEST["i"."$count"]=="n")
                {?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#fill"+"<?php echo $count?>").html('<p style="color:red;">Please fill up this field</p>');
                        });
                    </script>
                <?php }
                $count++;
            }
        }
        ?>
</body>

</html>
</html>
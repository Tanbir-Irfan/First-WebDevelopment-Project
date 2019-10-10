<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script 
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
</head>

<body>
<?php
    require_once("connection.php");
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    if($email!=""&&$password!="")
    {
        $myquery1="SELECT email,pwd FROM student_details";
        $runquery1=mysqli_query($connectDB,$myquery1);
        $count1=0;
        $count1=0;
        while($array=mysqli_fetch_array($runquery1))
        {
            if($array['email']==$email && $array['pwd']==$password)
            {
                $count1++;
            }
            else if($array['email']==$email && $array['pwd']!=$password)
            {
                $count2++;
            }
        }
        if($count1)
        {
            if(isset($_REQUEST["update"])){
                $myquery="SELECT * FROM student_details WHERE email='$email'";
                $runquery=mysqli_query($connectDB,$myquery);
                $ar=mysqli_fetch_array($runquery);
                header("location:update_account.php?uni_id=$ar[0]&i1=$ar[1]&i2=$ar[2]&i3=$ar[3]&i4=$ar[4]&i5=$ar[5]&i6=$ar[6]");
            }
            if(isset($_REQUEST["delete"])){
                $myquery2="DELETE FROM student_details WHERE email='$email'";
                $runquery2=mysqli_query($connectDB,$myquery2);
                if($runquery2){
                    header("location:delete_verify.php?comment");
                }
            }
            else{
                echo "Success";
            }
            
        }
        else if($count2){
            if(isset($_REQUEST["update"])){
                header("location:update_verify.php?emailid=$email&password=Password is wrong");
            }
            else if(isset($_REQUEST["delete"])){
                header("location:delete_verify.php?emailid=$email&password=Password is wrong");
            }
            else{
                header("location:login.php?emailid=$email&password=Password is wrong");
            }
        }
        else{
            if(isset($_REQUEST["update"]))
            {
                header("location:update_verify.php?warning&emailid=$email");
            }
            else if(isset($_REQUEST["delete"]))
            {
                header("location:delete_verify.php?warning&emailid=$email");
            }
            else{
                header("location:login.php?warning&emailid=$email");
            }
        }
        
    } 
    else{
        if($email!=""&&$password=="")
        {
            if(isset($_REQUEST["update"]))
            {
                header("location:update_verify.php?emailid=$email&password=Enter the password");
            }
            else if(isset($_REQUEST["delete"]))
            {
                header("location:delete_verify.php?emailid=$email&password=Enter the password");
            }
            else{
                header("location:login.php?emailid=$email&password=Enter the password");
            }
        }
        else if($email==""&&$password!="")
        {
            if(isset($_REQUEST["update"]))
            {
                header("location:update_verify.php?email_=Enter the email&password_=$password");
            }
            else if(isset($_REQUEST["delete"]))
            {
                header("location:delete_verify.php?email_=Enter the email&password_=$password");
            }
            else{
                header("location:login.php?email_=Enter the email&password_=$password");
            }
        }
        else{
            if(isset($_REQUEST["update"]))
            {
                header("location:update_verify.php?inform");
            }
            else if(isset($_REQUEST["delete"]))
            {
                header("location:delete_verify.php?inform");
            }
            else{
                header("location:login.php?inform");
            }
        }
    }   
?>
</body>

</html>
</html>

                            <!-- // $myquery2="DELETE FROM student_details WHERE email='$email'";
                            // $runquery2=mysqli_query($connectDB,$myquery2);
                            // if($runquery2)
                            // {
                                
                            // }
                            // else{
                            //     echo mysqli_error("$connectDB");
                            // } -->

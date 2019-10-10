<?php
    require_once("connection.php");
    $fname= $_REQUEST["fname"];
    $lname=$_REQUEST["lname"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $file = $_FILES["file"];
    $file_path=$file["tmp_name"];
    $fileName=$file["name"];
    $comment=$_REQUEST["comment"];
    $imgName="ii".uniqid().".jpg";
    echo $uni_id=$_REQUEST["uni_id"];
    if($fname!="" && $lname!="" && $email!="" && $password!="" && $fileName!="" && $comment!="")
    {
        $myquery1="SELECT email,id FROM student_details";
        $runquery1=mysqli_query($connectDB,$myquery1);
        // $myqueryid="SELECT id FROM student_details WHERE email='$email'";
        // $runqueryid=mysqli_query($connectDB,$myqueryid);
        // $arid=mysqli_fetch_array($runqueryid);
        if($runquery1)
        {
            $count=0;
            $findid=0;
            while($ar=mysqli_fetch_array($runquery1))
            {
                if($ar['email']==$email)
                {
                    $count++;
                    $findid=$ar['id'];
                }
            }
            if(!$count)
            {
                move_uploaded_file($file_path,"Image/".$imgName);
                if(isset($_REQUEST["update"]))
                {
                    $myquery3="UPDATE student_details SET fname='$fname',lname='$lname',email='$email',pwd='$password',img='$imgName',comment='$comment' WHERE id='$uni_id'";
                    $runquery3=mysqli_query($connectDB,$myquery3);
                    if($runquery3)
                    {
                        header("location:update_verify.php?comment");
                    }
                    else{
                        echo mysqli_error($connectDB);
                    }
                }
                else           
                {
                    $myquery2="INSERT INTO student_details (fname,lname,email,pwd,img,comment) VALUES('$fname','$lname','$email','$password','$imgName','$comment')";
                    $runquery2=mysqli_query($connectDB,$myquery2);
                    if($runquery2)
                    {
                        header("location:create_account.php?comment");
                    }
                    else{
                        echo mysqli_error($connectDB);
                    }
                }
            }
            else{
                if(isset($_REQUEST["update"]))
                {
                    if($findid==$uni_id)
                    {
                        move_uploaded_file($file_path,"Image/".$imgName);
                        $myquery3="UPDATE student_details SET fname='$fname',lname='$lname',email='$email',pwd='$password',img='$imgName',comment='$comment' WHERE email='$email'";
                        $runquery3=mysqli_query($connectDB,$myquery3);
                        if($runquery3)
                        {
                            header("location:update_verify.php?comment");
                        }
                        else{
                            echo mysqli_error($connectDB);
                        }
                    }
                    else{
                        header("location:update_account.php?uni_id=$uni_id&fname=$fname&lname=$lname&email=$email&password=$password&comment_=$comment&inform");
                    }
                }
                else{
                    header("location:create_account.php?fname=$fname&lname=$lname&email=$email&comment_=$comment&inform");
                }
            }
        }
        else{
            echo mysqli_error($connectDB);
        }
    }
    else
    {
        if($fname=="" && $lname=="" && $email=="" && $password=="" && $fileName=="" && $comment=="")
        {
            if(isset($_REQUEST["update"]))
            {
                header("location:update_account.php?uni_id=$uni_id&warning");
            }
            else{
                header("location:create_account.php?warning");
            }
        }
        else{
            $array=array("$fname","$lname","$email","$password","$fileName","$comment");
            $count=0;
            $index=0;
            while($count<6)
            {
                if($array[$count]=="")
                {
                    $inform[$index]="n";
                    $index++;
                }
                else{
                    $inform[$index]=$array[$count];
                    $index++;
                }
                $count++;
            }
            if(isset($_REQUEST["update"]))
            {
                header("location:update_account.php?uni_id=$uni_id&i1=$inform[0]&i2=$inform[1]&i3=$inform[2]&i4=$inform[3]&i5=$inform[4]&i6=$inform[5]&field");
            }
            else{
                header("location:create_account.php?i1=$inform[0]&i2=$inform[1]&i3=$inform[2]&i4=$inform[3]&i5=$inform[4]&i6=$inform[5]&field");
            }
        }
    }
?>
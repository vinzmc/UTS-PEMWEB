<?php 
    require_once('connect.php');

    $fname = $lname = $email = $password = $date = $gender = $role = '';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['pwd']);
    $date = $_POST['date'];
    $gender = $_POST['gender'];

    if(empty($fname)){
        header("Refresh: 0; url=regist.php");
        echo '<script language="javascript">alert("Please Fill The First Name Field");</script>';
        die;
    }else if(empty($lname)) {
        header("Refresh: 0; url=regist.php");
        echo '<script language="javascript">alert("Please Fill The Last Name Field");</script>';
        die;
    }else if(empty($email)){
        header("Refresh: 0; url=regist.php");
        echo '<script language="javascript">alert("Please Fill The Email Field");</script>';
        die;
    }else if(empty($password)){
        header("Refresh: 0; url=regist.php");
        echo '<script language="javascript">alert("Please Fill The Password Field");</script>';
        die;
    }else if(strlen($password) <= 8){
        header("Refresh: 0; url=regist.php");
        echo '<script language="javascript">alert("Your Password Must Be Atleast 8 Characters");</script>';
        die;
    }else if(empty($date)){
        header("Refresh: 0; url=regist.php");
        echo '<script language="javascript">alert("Please Fill The Birth Date Field");</script>';
        die;
    }else{
        $sql = "INSERT INTO user_login (FirstName, LastName, Email, Password, Date, Gender, role_id) VALUES ('$fname', '$lname', '$email', '$password', '$date', '$gender', 1)";
        $result = mysqli_query($db, $sql);
        if($result){
            header("Location: index.php");
        }else{
            echo "Error";
        }
    }

?>
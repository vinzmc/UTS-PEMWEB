<?php
session_start();

include "connect.php"; 

if(isset($_POST['order'])){

    $menu = $harga = $desc = $jumlah = $harga_new = '';
    

    $menu = $_POST['menu'];
    $nama = $_SESSION['name'];
    $harga = $_POST['harga'];
    $desc = $_POST['desc'];

    $jumlah = $_POST['jumlah'];
    $harga_new = $_POST['harga'] * $jumlah;

    $sql = "INSERT INTO `order` (`OrderID`, `NamaProducts`, `Harga`, `Jumlah`, `NamaUser`) VALUES (NULL, '$menu', '$harga_new', '$jumlah', '$nama')";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "
            <div class='alert alert-success' style='margin: 100px auto; max-width: 80%;'>
                <p>Berhasil dipesan!</p>
                <a href='index.php'>Balik ke halaman utama</a>
            </div>
            ";
    }else{
        echo $result;
    }

}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div>
        <nav class="navbar fixed-top navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="index.php">Restoran UTS IF430</a>
            <form class="form-inline">
                <?php if(isset($_SESSION['name'])): ?>
                    <p style="margin: 0;">Welcome, <?= $_SESSION['name'] ?>!</p>
                <?php endif; ?>


                <a href="login.php" class="btn btn-outline-success" type="button" style="margin-left: 35px;">Login</a>

                <a href="regist.php" class="btn btn-outline-success" type="button" style="margin: 0px 10px 0px 10px;">Register</a>

                <?php if(isset($_SESSION['login'])): ?>
                    <?php if($_SESSION['login'] == "admin"): ?>
                    <a href="admin_home.php" class="btn btn-outline-success" style="margin-right: 10px;" type="button">Admin Page</a>
                    <?php endif; ?>
                <?php endif; ?>

                
                <?php if(isset($_SESSION['login'])): ?>
                    <a href="logout.php" class="btn btn-outline-danger" type="button">Logout</a>
                <?php endif; ?>


            </form>
        </nav>
    </div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>
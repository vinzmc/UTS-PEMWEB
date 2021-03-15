<?php
    session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<?php
    $menu = $_GET['menu'];
    $harga = $_GET['harga'];
    $desc = $_GET['desc'];
?>

<div>
        <nav class="navbar fixed-top navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="index.php">Restoran UTS IF430</a>
            <form class="form-inline">
                <?php if (isset($_SESSION['name'])) : ?>
                    <p style="margin: 0;">Welcome, <?= $_SESSION['name'] ?>!</p>
                    <a href="logout.php" class="btn btn-outline-danger ml-2" type="button">Logout</a>
                    <?php if ($_SESSION['login'] == "admin") : ?>
                        <a href="admin_home.php" class="btn btn-outline-success" style="margin-left: 10px;" type="button">Admin Page</a>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (!isset($_SESSION['name'])) : ?>
                    <a href="login.php" class="btn btn-outline-success" type="button" style="margin: 0px 10px 0px 35px;">Login</a>
                <?php endif; ?>

                <?php if(isset($_SESSION['login'])): ?>
                    <a href="list_order.php" class="btn btn-outline-success" type="button" style="margin-left: 10px;">Order</a>
                <?php endif; ?>


            </form>
        </nav>
    </div>

    <div class="container" style="padding-top: 100px">

        <?php if(!isset($_SESSION['login'])): ?>
            <div class="alert alert-danger">
                <p style="margin: 0;">Anda harus login sebelum dapat melakukan order!</p>
                <a href="login.php">Sudah punya akun? Masuk disini</a>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['login'])): ?>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title"><?= $menu ?></h5>
                <p class="card-text"><?= $desc ?></p>
                <h4 class="card-text">Rp. <?= $harga ?></h4>
                <form action="order_code.php" class="row g-3" method="POST">
                    <div class="col-auto">
                        <input type="hidden" name="menu" value="<?= $menu ?>">
                        <input type="hidden" name="harga" value="<?= $harga ?>">
                        <input type="hidden" name="desc" value="<?= $desc ?>">
                        <input type="number" min="0" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                    </div>
                    <div class="col-auto">
                        <button name="order" type="submit" class="btn btn-primary mb-3">Order</button>
                    </div>
                </form>
                
            </div>
        </div>
        <?php endif; ?>


    </div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>
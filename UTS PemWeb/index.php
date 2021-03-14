<?php
session_start();

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
            <a class="navbar-brand active" href="index.php">Restoran UTS IF430</a>
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
            </form>
        </nav>
    </div>
    <div class="container" style="padding-top: 100px">
        <div class="row">
            <?php
            include "connect.php";

            $record = mysqli_query($db, "SELECT Gambar, Nama, Kategori, ProductsId FROM `products` ORDER BY `Kategori`");
            while ($data = mysqli_fetch_array($record)) {
            ?>
                <div class="col">
                    <div class="card text-center" style="width: 18rem;">
                        <img src="<?php echo $data['Gambar']; ?>" alt="" style="height: 250px;" href="#">
                        <div class="card-body">
                            <a class="card-title" href="#"><?php echo $data['Nama']; ?></a>
                            <p class="card-text"><?php echo $data['Kategori']; ?></p>
                            <a href='javascript:void(0)' class="btn btn-primary get_id" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $data['ProductsId']; ?>">Deskripsi</a>
                        </div>
                    </div>
                    <br></br>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="load_data"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $(".get_id").click(function() {
                    const ids = $(this).data('id');
                    $.ajax({
                        url: "desc.php",
                        method: 'POST',
                        data: {
                            id: ids
                        },
                        success: function(data) {
                            $('#load_data').html(data);

                        }

                    })
                })

            })
        </script>
</body>

</html>
<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

                <?php if(isset($_SESSION['login'])): ?>
                    <a href="list_order.php" class="btn btn-outline-success" type="button" style="margin-left: 10px;">Order</a>
                <?php endif; ?>
            </form>
        </nav>
    </div>
    <div class="container" style="padding-top: 100px">
        <form action="" method="POST" style="margin-bottom: 20px;">
            <select class="form-select" aria-label="Default select example" name="Kategori">
                <option value="All">Show all</option>
                <option value="Appetizer">Appetizer</option>
                <option value="Desert">Desert</option>
                <option value="Seafood">Seafood</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Drinks">Drinks</option>
            </select>
            <button type="submit" class="btn btn-primary" name="cari">Sort</button>
        </form>
        <div class="row">
            <?php
            include "connect.php";

            $sql = '';

            $kategori = ' ';
            if(isset($_POST['cari'])){
                $kategori = $_POST['Kategori'];
                if($kategori == 'All'){
                    $sql = "SELECT * FROM `products`";
                }else{
                    $sql = "SELECT * FROM `products` WHERE Kategori = '$kategori'";
                }
            }else{
                $sql = "SELECT * FROM `products`";
            }

            


            $record = mysqli_query($db, $sql);
            while ($data = mysqli_fetch_array($record)) {
            ?>
                <div class="col" data-aos="zoom-in">
                    <div class="card text-center" style="width: 18rem;">
                        <img src="<?php echo $data['Gambar']; ?>" alt="" style="height: 250px;" href="#">
                        <div class="card-body">
                            <a class="card-title" href="#"><?php echo $data['Nama']; ?></a>
                            <p class="card-text"><?php echo $data['Kategori']; ?></p>
                            <a href='javascript:void(0)' class="btn btn-primary get_id" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $data['ProductsId']; ?>">Deskripsi</a>
                            <a href='<?= 'order.php?' . 'menu=' . $data['Nama'] . '&harga=' . $data['Harga'] . '&desc=' . $data['Deskripsi'] ?>' class="btn btn-primary order">Order</a>
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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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
        <script>
            AOS.init();
        </script>
</body>

</html>
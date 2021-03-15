<?php
session_start();

if ($_SESSION['login'] != "admin") {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div>
        <nav class="navbar fixed-top navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="index.php">Restoran UTS IF430</a>
            <form class="form-inline">
                <?php if (isset($_SESSION['login'])) : ?>
                    <p style="margin: 0;">Welcome, <?= $_SESSION['name'] ?>!</p>
                    <a href="logout.php" class="btn btn-outline-danger" type="button" style="margin: 0px 0px 0px 35px;">Logout</a>
                <?php endif; ?>
            </form>
        </nav>
    </div>


    <div class="container" style="padding-top: 70px">
        <div class="container-fluid ">
            <!-- Button trigger modal -->
            <div class="clearfix">
                <div class="float-left">
                    <h1>Admin Page</h1>
                </div>
                <div class="float-right">
                    <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#Tambah">
                        Tambah menu
                    </button>
                </div>
            </div>
        </div>


        <div class="list-group">
            <?php
            include "connect.php";

            $record = mysqli_query($db, "SELECT * FROM `products` ORDER BY `Kategori`");
            while ($data = mysqli_fetch_array($record)) :
            ?>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?= $data['Nama']; ?></h5>
                        <small>
                            <button type="button" class="btn btn-primary updateMenu" data-toggle="modal" data-target="#Tambah" name="update" data-id="<?= $data['ProductsId']; ?>">
                                <i class="fa fa-pencil-square-o"></i><!-- Edit button-->
                            </button>
                            <button type="button" class="btn btn-outline-danger hapusMenu" name="delete" data-toggle="modal" data-id="<?= $data['ProductsId']; ?>">
                                <i class="fa fa-minus-circle"></i><!-- delete button -->
                            </button>
                        </small>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <img class="img-fluid img-thumbnail" src="<?php echo $data['Gambar']; ?>" alt="" style="height: 80px; width:80px" href="#">
                        </div>
                        <div class="col-md-10">
                            <p class="mb-1"><?= $data['Deskripsi']; ?></p>
                        </div>

                    </div>
                    <small class="float-right font-weight-bold">Rp. <?= number_format($data['Harga'], 0); ?></small>
                </a>
            <?php endwhile; ?>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="judulLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulLabel">Tambah Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="modul_admin/menuModul.php" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Makanan</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id">ID</label>
                                <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control" id="id" name="id" placeholder="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Makanan yang sangat lezatzzz" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Link/URL Gambar</label>
                            <input type="url" class="form-control" id="gambar" name="gambar" placeholder="" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="tambah" class="btn btn-primary" value="Tambah"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $('#Tambah').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })

        $(function() {
            $('.tambahMenu').on('click', function() {
                $('#judulLabel').html('Tambah Menu');
                $('.modal-footer input[type=submit]').val('Tambah');
                $('.modal-footer input[type=submit]').attr("name", "tambah");
                if ($('#id')[0].hasAttribute('readonly')) {
                    $('#id')[0].removeAttribute('readonly');
                }

                $('#id').val(null);
                $('#nama').val(null);
                $('#harga').val(null);
                $('#deskripsi').val(null);
                $('#kategori').val(null);
                $('#gambar').val(null);
            });

            $('.updateMenu').on('click', function() {
                $('#judulLabel').html('Update Menu');
                $('.modal-footer input[type=submit]').val('Update');
                $('.modal-footer input[type=submit]').attr("name", "update");
                const id = $(this).data('id');

                if (!$('#id')[0].hasAttribute('readonly')) {
                    $('#id')[0].setAttributeNode(document.createAttribute('readonly'));
                }
                $.ajax({
                    url: 'modul_admin/menuModul.php',
                    data: {
                        id: id,
                        gUpdate: true
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('#id').val(data.ProductsId);
                        $('#nama').val(data.Nama);
                        $('#harga').val(data.Harga);
                        $('#deskripsi').val(data.Deskripsi);
                        $('#kategori').val(data.Kategori);
                        $('#gambar').val(data.Gambar);
                    }
                });
            });

            $('.hapusMenu').on('click', function() {
                if (confirm('Hapus menu?')) {


                    const id = $(this).data('id');

                    $.ajax({
                        url: 'modul_admin/menuModul.php',
                        data: {
                            id: id,
                            hapus: true
                        },
                        method: 'post',
                        success: function() {
                            setTimeout(function() { // delay 0.5s
                                location.reload(); // reload
                            }, 500);
                        }
                    });
                }
            });

        });
    </script>
    <?php

    ?>
</body>

</html>
<?php
    session_start();

    if(isset($_SESSION['login'])){
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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
        include "connect.php";

        $errors = [];

        if(isset($_POST['login'])){
            $secretKey = "6Lf8xX0aAAAAAK415ObzSCfBECDJk1Fxd-9WuSDZ";
            $responseKey = $_POST['g-recaptcha-response'];
            $userIP = $_SERVER['REMOTE_ADDR'];
    
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
            $response = file_get_contents($url);
            $response = json_decode($response);

            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!$email){$errors[] = 'Email tidak bisa kosong';}
            if(!$password){$errors[] = 'Password tidak bisa kosong';}

            if($response->success && empty($errors)){
                $query = mysqli_stmt_init($db);
                mysqli_stmt_prepare($query, "SELECT * FROM user_login WHERE Email = ?");
                mysqli_stmt_bind_param($query, 's', $email);

                $password = md5($password);

                mysqli_stmt_execute($query);
                $result = mysqli_stmt_store_result($query);

                mysqli_stmt_num_rows($query);
                

                if(mysqli_stmt_num_rows($query) == 1){
                    mysqli_stmt_execute($query);
                    $resultPass = mysqli_stmt_get_result($query);
                    $row = mysqli_fetch_array($resultPass, MYSQLI_ASSOC);


                    if($row['Password'] == $password){
                        //$_SESSION['login'] = "user";
                        //header('Location: index.php');
                        $_SESSION['name'] = $row['FirstName'];
                        if($row['role_id'] == 1){
                            $_SESSION['login'] = "user";
                            header('Location: index.php');
                        } else {
                            $_SESSION['login'] = "admin";
                            header('Location: index.php');
                        }
                    } 
                }
            }
        }

    ?>

    <div>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="index.php">Restoran UTS IF430</a>
        </nav>
    </div>

    <h3 class="text-center mt-5">Login</h3>

    <div class="container">
        <?php if(!empty($errors)): ?> 
            <div class="alert alert-danger"> 
                <?php foreach($errors as $error){
                    echo $error. "</br>";
                }
                ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($email)){echo $email;} ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <div class="g-recaptcha" data-sitekey="6Lf8xX0aAAAAAGMn4UiF5X8ZbM_6_kiL4BeYP10A" style="margin-bottom: 10px;"></div>
            <a>Dont Have Account ? </a><a href="regist.php">Create Here !</a><br></br>
            <button name="login" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar fixed-top navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.php">Restoran UTS IF430</a>
    </nav>

    <div>
        <div class="d-flex justify-content-center" style="padding-top: 100px">
            <div class="card text-center" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <form action="regist_code.php" method="POST" id="regist">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Birth Date">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
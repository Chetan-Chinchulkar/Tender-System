<!-- create login system with mysql database -->
<?php
include 'include/connection.php';

// start session
session_start();
?>

<!-- include right_bar.php -->
<?php
include 'include/navbar.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tender </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />


</head>
<body>
    <!-- <h1>hi there</h1> -->


        <div class="main-wthree">
            <div class="container">
                <div class="sin-w3-agile">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <a href="login.php">
                                <img src="download.png" alt="Company Logo" style="width:200px">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <h1 style="text-align: left;color:aliceblue"> 
                                <b>Login </b>
                            </h1>

                        </div>
                    </div>
                    <!-- <span style="color:white">

                        <h1 style="text-align: center;"> Login </h1>
                    </span>
                    <h2><a href="login.php"><img src="download.png" alt="Company Logo" style="width:200px"></a></h2> -->
                    </br>
                    </br>
                    </br>
                    </br>
                    <form action="" method="POST">
                        <div class="username">
                            <span class="username">Username:</span>
                            <input type="text" name="username" class="name" placeholder="Enter Username" >
                            <div class="clearfix"></div>
                        </div>
                        <div class="password-agileits">
                            <span class="username">Password: <i class="fa fa-eye" aria-hidden="false" style="padding-left: 20px;"></i></span>
                            <input type="password" name="password" class="password" placeholder="Enter Password">

                            <div class="clearfix"></div>
                        </div>


                        <div class="login-w3">
                            <input type="submit" name="submit1" class="login" value="Log In">
                        </div>
                        <div class="alert alert-danger" id="failure" style="margin-top: 80px; display:none;">
                            <strong>Does not Match</strong> Invalid Username or Password.
                        </div>
                    </form>
                </div>

              
            </div>

            
        </div>


</body>

</html>

<?php
include 'include/footer.php';

?>


<?php
        if (isset($_POST["submit1"])) {
            $count = 0;

            $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);
            if ($count == 0) {
        ?>
                <script type="text/javascript">
                    document.getElementById('failure').style.display = "block";
                </script>
            <?php
            } else {
                $_SESSION["username"] =  $_POST["username"];
            ?>
                <!-- display success message -->
                <div>
                    <h1 style="text-align: center;">Welcome <?php echo $_SESSION["username"]; ?></h1>
                </div>
                <script type="text/javascript">
                    window.location = "add_tender.php";
                </script>
<?php
    }
}
?>
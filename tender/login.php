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
    <link href="css/custom.css" rel='stylesheet' type='text/css' /> 
    

</head>
<style>
    .main-wthree{
		background:#0b4268 !important;

    }
    .form-div{
    padding: 5% ;
    background-color: white;
    border-radius: 10px;
    width: 60%;
    text-align: center;
    margin: auto;
    }
    /* submit button with full width and rounded corners */
    .top-logo{
        display: none;
    }
</style>
<body>
    <!-- <h1>hi there</h1> -->


        <div class="main-wthree">
            <div class="container" >
                <div class=" form-div">

                    <h2 style="margin-bottom:30px;"><a href="login.php"><img src="download.png" alt="Company Logo" style="width:200px"></a></h2>
                    <span style="color:white">

                        <h1 style="text-align: center; color:black"> Sign In </h1>
                    </span>
                    
                    <form action="login.php" method="POST">
                        <div class="form-group">

                            <input type="text" name="username" class="form-control" aria-describedby="userHelp" placeholder="Username">
                            <!-- <small id="userHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">

                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <!-- <input type="submit" name="submit" class="login" value="Log In"> -->
                        <button type="submit" name="submit" class="btn btn-dark btn-submit">Sign In</button>

                        <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button> -->
                        <div class="alert alert-success" id="success" role="alert" style="display: none;">
                            This is a success alert—check it out!
                        </div>
                        <div class="alert alert-danger" id="failure" style="margin-top: 80px; display:none;">
                            <strong>Does not Match</strong> Invalid Username or Password.
                        </div>
                    </form>

                    <!-- <form action="" method="POST">
                        <div class="username">

                            <input type="text" name="username" class="name" placeholder="Enter Username" >
                            <div class="clearfix"></div>
                        </div>
                        <div class="password-agileits">

                            <input type="password" name="password" class="password" placeholder="Enter Password">

                            <div class="clearfix"></div>
                        </div>


                        <div class="login-w3">
                            <input type="submit" name="submit1" class="login" value="Log In">
                        </div>
                        <div class="alert alert-success" id="success" role="alert" style="display: none;">
                        This is a success alert—check it out!
                        </div>
                        <div class="alert alert-danger" id="failure" style="margin-top: 80px; display:none;">
                            <strong>Does not Match</strong> Invalid Username or Password.
                        </div>
                    </form> -->
                </div>

              
            </div>

            
        </div>


</body>

</html>

<?php
include 'include/footer.php';

?>


<?php
        if (isset($_POST["submit"])) {
            $count = 0;

            $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $_SESSION['logged_in'] = true; 

                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password']; 
                $userid = $_GET["userid"];
                $_SESSION['userid'] = $userid;
                // $_SESSION['userid'] = mysqli_query($link, "select userid from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
                // $_SESSION['serialno'] = $_POST['user_id'];

                ?>
                <script type="text/javascript">
                document.getElementById('success').style.display = "block";
                window.location.href = "add_tender.php";
                </script>
                 
                <?php
            } else {
                $count = 0;
                $error = "Your Login Name or Password is invalid";
                ?>
                <script type="text/javascript">
                    document.getElementById('failure').style.display = "block";
                </script>
            <?php
            }
            
}
?>
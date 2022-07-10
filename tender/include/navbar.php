


<!DOCTYPE html>
<html>
    <head>
        <!-- show progress bar showing all options with links -->
        <title>Tender</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/index.css" rel='stylesheet' type='text/css' />
        <link href="css/custom.css" rel='stylesheet' type='text/css' />

    </head>
    <style>
       
    nav{
        background-color: #0b4268 !important;
    }

    .active{
        color:yellow;
    }
    </style>
    <body>


        <!-- make a navbar  with the links of other pages-->
        <nav class="navbar navbar-expand navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Tender</a>
                </div>
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="add_tender.php">Tender</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_bid.php"> Bid</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_mode.php"> Mode</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_fee.php"> Fee</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_EMD.php"> EMD</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_manpower.php"> Manpower</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_ppt.php"> Presentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_allocation.php">Allocation</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_opening.php"> Opening</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_refund.php"> Refund</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_tender_additional.php">Additional</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <!-- logout option -->
                    <li class="nav-item"><a class="nav-link" onclick="logout()">Logout</a></li>
                </ul>
            </div>
        </nav>

        
        <script>
            // code to logour if clicked on logout
            function logout(){
                var r = confirm("Are you sure you want to logout?");
                if (r == true) {
                    window.location.href = "logout.php";
                } else {
                    window.location.href = "add_tender_mode.php";
                }
            }
        </script>
    </body>
</html>

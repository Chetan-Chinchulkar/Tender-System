<!-- add mode of submission options of soft copy, hard copy or both -->


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
    <title>Tender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />
    <link href="css/custom.css" rel='stylesheet' type='text/css' />
    </head>
    <style>
        #softcopy_div{
            display: none;
        }
    </style>
    <body>
        <div class="main-wthree">
            <div class="container">
        <!-- create form  -->
                <form action="add_tender_mode.php" method="POST">
                    
                    <!-- options for submission as hard copy or soft copy -->
                    <div class="form-group">
                        <label for="mode_of_submission">Mode of Submission</label>
                        <select class="form-control" name="mode_of_submission" id="mode_of_submission">
                            <option value="hard copy">Hard Copy</option>
                            <option value="soft copy">Soft Copy</option>
                        </select>
                    </div>
                    <!-- options of courier, post or by hand if Hard copy is selected -->
                    <div class="form-group hardcopy_div" id="hardcopy_div">
                        <label for="hardcopy">Hardcopy</label>
                        <select class="form-control" name="hardcopy" id="hardcopy">
                            <option value="post">Post</option>
                            <option value="courier">Courier</option>
                            <option value="by hand">By Hand</option>
                        </select>
                    </div>
                    <!-- option for email ID and link if soft copy is selceted -->
                    <div class="form-group softcopy_div" id="softcopy_div">
                        
                        <!-- email id -->
                        <div class="form-group softcopy_div" id="softcopy_email_id">
                            <label for="email_id">Email ID</label>
                            <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email ID">
                        </div>
                        <!-- link -->
                        <div class="form-group softcopy_div" id="softcopy_link">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>

        <script>
            // java script for displaying either hard copy or soft copy for mode_of_submission
            mode = document.getElementById("mode_of_submission");
            hardcopy = document.getElementById("hardcopy_div");
            softcopy = document.getElementById("softcopy_div");

            mode.addEventListener("change", function(){
                if(mode.value == "hard copy"){
                    hardcopy.style.display = "block";
                    softcopy.style.display = "none";
                }
                else{
                    hardcopy.style.display = "none";
                    softcopy.style.display = "block";
                }
            });

        </script>
    </body>
</html>

<?php
include 'include/footer.php';

?>


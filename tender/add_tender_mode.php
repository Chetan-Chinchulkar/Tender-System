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
                <form action="add_tender_mode.php" method="POST" enctype="multipart/form-data">
                    
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
                        <!-- file uplaod -->
                        <div class="form-group softcopy_div" id="softcopy_file_upload">
                            <label for="file_upload">File Upload</label>
                            <input name="file_upload" type="file" class="form-control" id="file_upload" placeholder="File Upload">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div class="alert alert-success" id="success" role="alert" style="display: none;" >
                        Tender details added successfully!
                        
                    </div>
                    <div class="alert alert-warning" id="failure" style="display: none;">
                    
                    <strong>Warning!</strong> Check the data entered!
                    
                    </div>
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


<!-- php code to submit the form data in database -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if logged in is true
    if ($_SESSION["logged_in"] == true) {
        // get the values from the form
        $mode_of_submission = $_POST["mode_of_submission"];
        $hardcopy = $_POST["hardcopy"] ?? NULL;
        $email_id = $_POST["email_id"] ?? NULL;
        $softcopy_link = $_POST["link"] ?? NULL;
        
        $userid = $_SESSION["userid"];

        $file_upload = NULL;

        if (isset($_FILES["file_upload"]["name"]) && $mode_of_submission == "soft copy") {
            $ext =  pathinfo($_FILES["file_upload"]["name"], PATHINFO_EXTENSION);
            $file_upload = $userid."_softcopy.".$ext;

            // upload file
            $target_dir = "uploads/mode-softcopy/";
            $target_file = $target_dir . $file_upload;
            $uploadOk = 1;

            // No need to check the existence of file, simply overwrite

            // Check file size
            if ($_FILES["file_upload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                exit;
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["file_upload"]["name"])). " has been uploaded.";
                } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
                }
            }
            // update query to add details
            $sql = "UPDATE tender_table SET ModeSubmission = '$mode_of_submission', HardCopyType = NULL, SoftcopyEmail = '$email_id', SoftcopyLink = '$softcopy_link', SoftCopyFile = '$file_upload' WHERE userid = '$userid'";
            $res = mysqli_query($link, $sql) or die(mysqli_error($link));
        } elseif ($mode_of_submission == "hard copy") {
            echo "Hardcopy";
            echo $hardcopy;
            // exit;
            // update query to add details
            $sql = "UPDATE tender_table SET ModeSubmission = '$mode_of_submission', HardcopyType = '$hardcopy', SoftcopyEmail = NULL, SoftcopyLink = NULL, SoftCopyFile = NULL WHERE userid = '$userid'";
            $res = mysqli_query($link, $sql) or die(mysqli_error($link));
            exit;
        } else {
            exit;
        }
        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_fee.php";
        </script>
        <?php

    }
    else {
        ?>
        <script>
            document.getElementById('failure').style.display = 'block';
            alert("Please login to continue");
            // window.location.href = "login.php";
        </script>
        <?php
    }
}
?>

<!-- add mode of submission options of soft copy, hard copy or both -->

<!DOCTYPE html>
<html>
    <head>
    <title>Tender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />
    </head>
    <body>
        <!-- create form  -->
        <form action="add_tender_mode.php" method="POST">
            <div class="form-group">
                <label for="mode_of_submission">Mode of Submission</label>
                <input type="text" class="form-control" id="mode_of_submission" name="mode_of_submission" placeholder="Mode of Submission">
            </div>
            <!-- options for submission as hard copy or soft copy -->
            <div class="form-group">
                <label for="mode_of_submission">Mode of Submission</label>
                <select name="mode_of_submission" id="mode_of_submission">
                    <option value="hard copy">Hard Copy</option>
                    <option value="soft copy">Soft Copy</option>
                </select>
            </div>
            <!-- options of courier, post or by hand if Hard copy is selected -->
            <div class="form-group">
                <label for="hardcopy">Hardcopy</label>
                <select name="hardcopy" id="hardcopy">
                    <option value="post">Post</option>
                    <option value="courier">Courier</option>
                    <option value="by hand">By Hand</option>
                </select>
            </div>
            <!-- option for email ID and link if soft copy is selceted -->
            <div class="form-group">
                <label for="softcopy">Softcopy</label>
                <select name="softcopy" id="softcopy">
                    <option value="email ID">Email ID</option>
                    <option value="link">Link</option>
                </select>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

        <script>
            // java script for displaying either hard copy or soft copy for mode_of_submission
            var hardcopy = document.getElementById("hardcopy");
            var softcopy = document.getElementById("softcopy");
            var mode_of_submission = document.getElementById("mode_of_submission");
            var hardcopy_div = document.getElementById("hardcopy_div");
            var softcopy_div = document.getElementById("softcopy_div");
            var email_div = document.getElementById("email_div");
            var link_div = document.getElementById("link_div");
            var email_id = document.getElementById("email_id");
            var link = document.getElementById("link");
            var submit = document.getElementById("submit");
            var hardcopy_option = document.getElementById("hardcopy_option");
            var softcopy_option = document.getElementById("softcopy_option");
            var email_option = document.getElementById("email_option");
            var link_option = document.getElementById("link_option");

            hardcopy.addEventListener("change", function() {
                if (hardcopy.value == "post") {
                    hardcopy_div.style.display = "block";
                    softcopy_div.style.display = "none";
                    email_div.style.display = "none";
                    link_div.style.display = "none";
                    submit.style.display = "block";
                    hardcopy_option.style.display = "block";
                    softcopy_option.style.display = "none";
                    email_option.style.display = "none";
                    link_option.style.display = "none";
                } else if (hardcopy.value == "courier") {
                    hardcopy_div.style.display = "block";
                    softcopy_div.style.display = "none";
                    email_div.style.display = "none";
                    link_div.style.display = "none";
                    submit.style.display = "block";
                    hardcopy_option.style.display = "block";
                    softcopy_option.style.display = "none";
                    email_option.style.display = "none";
                    link_option.style.display = "none";
                } else if (hardcopy.value == "by hand") {
                    hardcopy_div.style.display = "block";
                    softcopy_div.style.display = "none";
                    email_div.style.display = "none";
                    link_div.style.display = "none";
                    submit.style.display = "block";
                    hardcopy_option.style.display = "block";
                    softcopy_option.style.display = "none";
                    email_option.style.display = "none";
                    link_option.style.display = "none";
                }
            });

            softcopy.addEventListener("change", function() {
                if (softcopy.value == "email ID") {
                    hardcopy_div.style.display = "none";
                    softcopy_div.style.display = "block";
                    email_div.style.display = "block";
                    link_div.style.display = "none";
                    submit.style.display = "block";
                    hardcopy_option.style.display = "none";
                    softcopy_option.style.display = "block";
                    email_option.style.display = "block";
                    link_option.style.display = "none";
                } else if (softcopy.value == "link") {
                    hardcopy_div.style.display = "none";
                    softcopy_div.style.display = "block";
                    email_div.style.display = "none";
                    link_div.style.display = "block";
                    submit.style.display = "block";
                    hardcopy_option.style.display = "none";
                    softcopy_option.style.display = "block";
                    email_option.style.display = "none";
                    link_option.style.display = "block";
                }
            });

        </script>
    </body>
</html>


<!-- php code for form submission -->
<?php
    if(isset($_POST['mode_of_submission'])){
        $mode_of_submission = $_POST['mode_of_submission'];
        $res = mysqli_query($link, "insert into mode_of_submission (mode_of_submission) values ('$mode_of_submission')");
        if($res){
            echo "Mode of Submission Added Successfully";
        }
        else{
            echo "Mode of Submission Not Added";
        }
    }
?>
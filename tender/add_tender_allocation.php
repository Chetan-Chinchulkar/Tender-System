
<!-- allocation details -->

<!DOCTYPE html>
<html>
    <head>
        <title>Tender</title>
    </head>
    <body>
        <form action="add_tender.php" method="POST">
            <!-- allocation details in textarea -->
            <div class="form-group">
                <label for="allocation_details">Allocation Details</label>
                <textarea class="form-control" id="allocation_details" name="allocation_details" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </body>
</html>

<!-- code to submit the form -->
<?php
    if (isset($_POST["submit2"])) {
        $count = 0;

        $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if ($count == 0) {
            echo "<script>document.getElementById('failure').style.display = 'block';</script>";
        } else {
            $res = mysqli_query($link, "insert into tender values('$_POST[allocation_details]')") or die(mysqli_error($link));
            echo "<script>document.getElementById('success').style.display = 'block';</script>";
        }
    }
?>
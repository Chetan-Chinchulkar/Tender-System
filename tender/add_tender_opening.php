<!-- details of tech opeening and financial opening -->

<!DOCTYPE html>
<html>
    <head>
        <title>Tender</title>
    </head>
    <body>
        <!-- create form  -->
        <form action="add_tender_opening.php" method="POST">
            <div class="form-group">
                <label for="tech_opening">Tech Opening</label>
                <input type="text" class="form-control" id="tech_opening" name="tech_opening" placeholder="Tech Opening">
            </div>
            <div class="form-group">
                <label for="financial_opening">Financial Opening</label>
                <input type="text" class="form-control" id="financial_opening" name="financial_opening" placeholder="Financial Opening">
            </div>
            <!-- add remarks too -->
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </body>
</html>


<!-- php code to submit form details -->
<?php
    if (isset($_POST["submit1"])) {
        $count = 0;

        $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if ($count == 0) {
            echo "<script>document.getElementById('failure').style.display = 'block';</script>";
        } else {
            $res = mysqli_query($link, "insert into tender values('$_POST[tech_opening]','$_POST[financial_opening]','$_POST[remarks]')") or die(mysqli_error($link));
            echo "<script>document.getElementById('success').style.display = 'block';</script>";
        }
    }
?>
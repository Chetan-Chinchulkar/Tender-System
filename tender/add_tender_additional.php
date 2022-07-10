

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
        <!-- code for textarea for performance gurantee -->
        <form action="add_tender.php" method="POST">
            <div class="form-group">
                <label for="performance_guarantee">Performance Guarantee</label>
                <textarea class="form-control" id="performance_guarantee" name="performance_guarantee" rows="3"></textarea>
            </div>
            <!-- textarea for contract signing -->
            <div class="form-group">
                <label for="contract_signing">Contract Signing</label>
                <textarea class="form-control" id="contract_signing" name="contract_signing" rows="3"></textarea>
            </div>
            <!-- date range for contract period -->
            <div class="form-group">
                <label for="contract_period">Contract Period</label>
                <input type="text" class="form-control" id="contract_period" name="contract_period" placeholder="Enter Contract Period">
            </div>
            <!-- date for expiry -->
            <div class="form-group">
                <label for="expiry">Expiry</label>
                <input type="text" class="form-control" id="expiry" name="expiry" placeholder="Enter Expiry">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
</html>


<!-- code for submit form -->

<?php
    if (isset($_POST["submit"])) {
        $count = 0;

        $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if ($count == 0) {
            echo "<script>document.getElementById('failure').style.display = 'block';</script>";
        } else {
            $res = mysqli_query($link, "insert into tender values('$_POST[performance_guarantee]','$_POST[contract_signing]','$_POST[contract_period]','$_POST[expiry]')") or die(mysqli_error($link));
            echo "<script>document.getElementById('success').style.display = 'block';</script>";
        }
    }
?>
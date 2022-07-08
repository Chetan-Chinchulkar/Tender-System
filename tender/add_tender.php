<!-- get data for serial number, city, state, client name, description, tender number, tender date -->

<!DOCTYPE html>
<!-- html code -->
<html>
    <head>
        <title>Tender</title>
    </head>
    <body>
        <!-- create form  -->
        <form action="add_tender.php" method="POST">
            <div class="form-group">
                <label for="serial_number">Serial Number</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Serial Number">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="City">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State">
            </div>
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="tender_number">Tender Number</label>
                <input type="text" class="form-control" id="tender_number" name="tender_number" placeholder="Tender Number">
            </div>
            <div class="form-group">
                <label for="tender_date">Tender Date</label>
                <input type="date" class="form-control" id="tender_date" name="tender_date" placeholder="Tender Date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </body>
</html>


<!-- add php code to submit the form details -->
<?php
if (isset($_POST["submit1"])) {
    $count = 0;

    $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
        echo "<script>document.getElementById('failure').style.display = 'block';</script>";
    } else {
        $res = mysqli_query($link, "insert into tender values('$_POST[serial_number]','$_POST[city]','$_POST[state]','$_POST[client_name]','$_POST[description]','$_POST[tender_number]','$_POST[tender_date]')") or die(mysqli_error($link));
        echo "<script>document.getElementById('success').style.display = 'block';</script>";
    }
}
?>
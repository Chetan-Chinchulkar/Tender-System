
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
<!-- html code -->
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
        td{
            text-align: center;
            color: black !important;
        }
        th{
            text-align: center !important;
        }
        .main-container{
            border: 1px solid grey !important;
            border-radius: 10px !important;
            /* margin: auto !important; */
            padding: 1.5% ;
            min-width: 70%;
            
        }
    </style>
    <body>
        <div class="main-wthree">
            <div class="container main-container">
                <!-- display all details in table -->
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                <b>Serial No</b>
                            </th>
                            <th>
                                <b>City</b>
                            </th>
                            <th>
                                <b>State</b>
                            </th>
                            <th>
                                <b>Client Name</b>
                            </th>
                            <th>
                                <b>Description</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tender_table";
                        $result = mysqli_query($link, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['SerialNo']."</td>";
                            echo "<td>".$row['City']."</td>";
                            echo "<td>".$row['State']."</td>";
                            echo "<td>".$row['ClientName']."</td>";
                            echo "<td>".$row['Description']."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>

<?php
include 'include/footer.php';

?>
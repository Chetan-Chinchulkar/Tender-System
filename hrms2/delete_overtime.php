<?php
include "include/connection.php";
$id = $_GET["id"];
mysqli_query($link, "delete from overtime where id=$id") or die(mysqli_error($link));
?>
<script type="text/javascript">
    window.location = "overtime.php";
</script>
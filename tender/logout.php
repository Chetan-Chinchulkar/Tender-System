<?php
session_start();
$_SESSION['logged_in'] = false;
session_destroy();
?>
<script type="text/javascript">
    window.location = "login.php";
</script>
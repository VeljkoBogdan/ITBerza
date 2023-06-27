<?php
if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true){
    echo '<script>
    alert("Access denied, login first");
    window.location.href="login.php";
    </script>';
}
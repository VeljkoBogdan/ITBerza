<?php
session_start();
require_once 'db-config.php';
require 'ban-check.php';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
        $id = $_GET['id'];

        $sql = "UPDATE jobs SET is_enabled = 1 WHERE id_job = '$id'";
        $confirm = $conn->query($sql);

        header("Location: index.php");
    }
}

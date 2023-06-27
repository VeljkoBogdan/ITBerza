<?php
session_start();
require 'db-config.php';
require 'ban-check.php';
require 'login-check.php';
require_once 'job-form-handler.php';

// Create an instance of the JobFormHandler class and handle the form submission
$jobFormHandler = new JobFormHandler($conn);
$jobFormHandler->handleFormSubmission();

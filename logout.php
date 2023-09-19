<?php
include_once './auth_user.php';
session_start();
if (session_destroy()) {
    header("Location: login.php");
}
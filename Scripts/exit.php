<?php
include '../inc/config.php';
session_unset();
ob_clean();
header('Location: ../index.php');
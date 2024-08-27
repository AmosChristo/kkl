<?php
session_start();
session_destroy();
setcookie('email', '', 0, '/');
header('location:login');

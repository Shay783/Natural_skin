<?php
session_start();
session_destroy();
header("Location: savon.php");
exit;

<?php
if(session_status()===PHP_SESSION_NONE) session_start();
function require_login(){ if(!isset($_SESSION["user"])){header("Location: /internship_placement_management_system/login.php");exit;} }
function require_role($role){require_login();if($_SESSION["user"]["role"]!==$role){http_response_code(403);exit("Access denied");}}
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,"UTF-8");}
?>
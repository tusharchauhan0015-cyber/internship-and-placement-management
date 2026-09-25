<?php
require "config/database.php";require "config/auth.php";$title="Register";$error="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
$name=trim($_POST["name"]);$email=trim($_POST["email"]);$pass=$_POST["password"];$role=$_POST["role"];
if(!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($pass)<6)$error="Use a valid email and a password of at least 6 characters.";
else{$q=$db->prepare("SELECT id FROM users WHERE email=?");$q->execute([$email]);
if($q->fetch())$error="Email already registered.";else{$hash=password_hash($pass,PASSWORD_DEFAULT);
$db->prepare("INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)")->execute([$name,$email,$hash,$role]);$uid=$db->lastInsertId();
if($role==="student")$db->prepare("INSERT INTO students(user_id) VALUES(?)")->execute([$uid]);
if($role==="company")$db->prepare("INSERT INTO companies(user_id,company_name,verification_status) VALUES(?,?,?)")->execute([$uid,$name,"approved"]);
header("Location: login.php");exit;}}}
include "includes/header.php";?>
<div class="row justify-content-center"><div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h3>Create Account</h3>
<?php if($error):?><div class="alert alert-danger"><?=e($error)?></div><?php endif;?>
<form method="post"><input class="form-control mb-3" name="name" placeholder="Full name / Company name" required>
<input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-3" type="password" name="password" placeholder="Password (6+ chars)" required>
<select class="form-select mb-3" name="role"><option value="student">Student</option><option value="company">Company</option></select>
<button class="btn btn-primary w-100">Register</button></form></div></div></div></div><?php include "includes/footer.php";?>
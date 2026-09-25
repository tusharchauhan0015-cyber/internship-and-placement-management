<?php
require "config/database.php";require "config/auth.php";$title="Login";$error="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
$q=$db->prepare("SELECT * FROM users WHERE email=? AND status='active'");$q->execute([trim($_POST["email"])]);$u=$q->fetch();
if($u&&password_verify($_POST["password"],$u["password"])){$_SESSION["user"]=["id"=>$u["id"],"name"=>$u["name"],"role"=>$u["role"],"email"=>$u["email"]];
$dest=$u["role"]==="admin"?"admin/dashboard.php":($u["role"]==="company"?"company/dashboard.php":"student/dashboard.php");header("Location: $dest");exit;} $error="Invalid email or password.";}
include "includes/header.php";?><div class="row justify-content-center"><div class="col-md-5"><div class="card shadow-sm"><div class="card-body"><h3>Login</h3>
<?php if($error):?><div class="alert alert-danger"><?=e($error)?></div><?php endif;?>
<form method="post"><input class="form-control mb-3" type="email" name="email" placeholder="Email" required><input class="form-control mb-3" type="password" name="password" placeholder="Password" required><button class="btn btn-primary w-100">Login</button></form>
</div></div></div></div><?php include "includes/footer.php";?>
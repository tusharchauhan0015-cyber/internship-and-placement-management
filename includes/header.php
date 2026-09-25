<?php require_once __DIR__."/../config/auth.php"; ?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title??"PlacementHub")?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light"><nav class="navbar navbar-dark bg-primary"><div class="container">
<a class="navbar-brand" href="/internship_placement_management_system/">PlacementHub</a><div>
<?php if(isset($_SESSION["user"])): ?><span class="text-white me-2">Hi, <?=e($_SESSION["user"]["name"])?></span><a class="btn btn-light btn-sm" href="/internship_placement_management_system/logout.php">Logout</a>
<?php else: ?><a class="btn btn-light btn-sm me-2" href="/internship_placement_management_system/login.php">Login</a><a class="btn btn-warning btn-sm" href="/internship_placement_management_system/register.php">Register</a><?php endif;?>
</div></div></nav><main class="container py-4">
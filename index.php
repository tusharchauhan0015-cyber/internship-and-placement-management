<?php
require "config/database.php";require "config/auth.php";$title="Home";
$jobs=$db->query("SELECT j.*,c.company_name FROM jobs j JOIN companies c ON c.id=j.company_id WHERE j.status='open' ORDER BY j.created_at DESC LIMIT 9")->fetchAll();
include "includes/header.php";?>
<div class="p-5 bg-white rounded shadow-sm mb-4"><h1>Internship & Placement Management System</h1><p class="lead">A platform for students, companies and placement administrators.</p></div>
<h3>Latest Opportunities</h3><div class="row"><?php foreach($jobs as $j):?><div class="col-md-4 mb-3"><div class="card h-100 shadow-sm"><div class="card-body">
<h5><?=e($j["title"])?></h5><p><?=e($j["company_name"])?></p><p><?=e($j["location"])?> · <?=e($j["job_type"])?></p>
<a class="btn btn-outline-primary" href="job.php?id=<?=$j["id"]?>">View Opportunity</a></div></div></div><?php endforeach;?></div>
<?php include "includes/footer.php";?>
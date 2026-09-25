<?php
require "config/database.php";require "config/auth.php";$id=(int)($_GET["id"]??0);
$q=$db->prepare("SELECT j.*,c.company_name FROM jobs j JOIN companies c ON c.id=j.company_id WHERE j.id=?");$q->execute([$id]);$job=$q->fetch();if(!$job)exit("Job not found");
$applied=false;if(isset($_SESSION["user"])&&$_SESSION["user"]["role"]==="student"){$q=$db->prepare("SELECT a.id FROM applications a JOIN students s ON s.id=a.student_id WHERE a.job_id=? AND s.user_id=?");$q->execute([$id,$_SESSION["user"]["id"]]);$applied=(bool)$q->fetch();}
$title=$job["title"];include "includes/header.php";?><div class="card shadow-sm"><div class="card-body"><h2><?=e($job["title"])?></h2><h5><?=e($job["company_name"])?></h5>
<p><?=nl2br(e($job["description"]))?></p><p><b>Location:</b> <?=e($job["location"])?> | <b>Type:</b> <?=e($job["job_type"])?> | <b>CGPA:</b> <?=e($job["min_cgpa"])?></p><p><b>Skills:</b> <?=e($job["skills_required"])?></p>
<?php if(isset($_SESSION["user"])&&$_SESSION["user"]["role"]==="student"):?>
<?php if($applied):?><span class="badge bg-success">Already Applied</span><?php else:?><form method="post" action="student/apply.php"><input type="hidden" name="job_id" value="<?=$job["id"]?>"><button class="btn btn-primary">Apply Now</button></form><?php endif;?>
<?php else:?><a href="login.php" class="btn btn-primary">Login as Student to Apply</a><?php endif;?></div></div><?php include "includes/footer.php";?>
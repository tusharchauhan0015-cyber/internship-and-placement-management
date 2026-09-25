<?php
require "../config/database.php";require "../config/auth.php";require_role("student");$job=(int)($_POST["job_id"]??0);
$s=$db->prepare("SELECT id FROM students WHERE user_id=?");$s->execute([$_SESSION["user"]["id"]]);$st=$s->fetch();
if($st){$q=$db->prepare("SELECT id FROM applications WHERE job_id=? AND student_id=?");$q->execute([$job,$st["id"]]);if(!$q->fetch())$db->prepare("INSERT INTO applications(job_id,student_id) VALUES(?,?)")->execute([$job,$st["id"]]);}
header("Location: dashboard.php");exit;?>
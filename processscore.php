<?php
require_once("include/initialize.php");  
$score = 0;
$studentid = $_SESSION['StudentID'];
$lessonid = $_POST['LessonID'];

$sql = "Update tblscore Set Submitted = 1 WHERE LessonID='{$lessonid}' and StudentID='{$studentid}'";
$mydb->setQuery($sql);
$mydb->executeQuery();

$sql = "SELECT SUM(Score) as 'SCORE' FROM tblscore  WHERE LessonID='{$lessonid}' and StudentID='{$studentid}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();
$score  = $res->SCORE;




message("Exercises already submitted.","sucess");
redirect("index.php?q=quizresult&id={$lessonid}&score={$score}");

?>
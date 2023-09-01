<?php 
$studentid = $_SESSION['StudentID'];
	if (isset($_GET['score'])) {
		# code...
		echo	$score = '<h1>Your Score is : ' . $_GET['score'].'</h1>';
	}

?>
<h1>Question</h1>
<h5>Choose the correct answer.</h5>
<div style="height:250px;overflow-y:auto;"> 
<?php  

@$id = $_GET['id'];
if($id==''){
redirect("index.php");
}
  
  $sql = "SELECT * FROM tblexercise WHERE LessonID = '{$id}'";
  $mydb->setQuery($sql);
  $cur = $mydb->loadResultList();

  foreach ($cur as $res) {
  	# code...
  	$sql = "SELECT * FROM tblscore s,tblexercise e WHERE s.ExerciseID=e.ExerciseID AND e.ExerciseID='{$res->ExerciseID}' and StudentID='{$studentid}'";
  	$mydb->setQuery($sql);
  	$ans = $mydb->loadSingleResult();

  	 
 
?> 
<form> 
<div><?php echo $res->Question ; ?></div>
<div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->Answer==$res->ChoiceA) ? 'CHECKED' : ''; ?>> A. <?php echo $res->ChoiceA; ?></div>
<div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->Answer==$res->ChoiceB) ? 'CHECKED' : ''; ?>> B. <?php echo $res->ChoiceB; ?></div>
<div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->Answer==$res->ChoiceC) ? 'CHECKED' : ''; ?>> C. <?php echo $res->ChoiceC; ?></div>
<div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->Answer==$res->ChoiceD) ? 'CHECKED' : ''; ?>> D. <?php echo $res->ChoiceD; ?></div> 
</form>
<?php } ?>
</div>
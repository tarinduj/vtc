<?php
$assignId=$_GET['assignId'];
$student_id=$_GET['stuId'];
$courseId=$_GET['courseId'];
if(isset($_POST['grade'])){
	$marks=$_POST['marks'];
	if($marks>=0 && $marks <=100){
		$conn=mysqli_connect('localhost','root','','vtc');
		$sql="UPDATE student_assignments SET  marks='$marks', graded_status=1 where student_id='$student_id'&& assignment_id='$assignId';";
		mysqli_query($conn, $sql);
		$result=mysqli_query($conn,$sql);
		header("Location: ../assignment_view.html?assignId=$assignId&courseId=$courseId");
	}else{
		header("Location: ../assignment_view.html?assignId=$assignId&courseId=$courseId");
	}
}
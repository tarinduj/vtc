<?php
$conn=mysqli_connect('localhost','root','','vtc');
$sql="SELECT * FROM student_assignments WHERE assignment_id='$assignId';";
$result=mysqli_query($conn,$sql);
$assignments=array();
while($row=mysqli_fetch_assoc($result)){
	$assignments[]=$row;
}

echo " <br><ul class=\"list1\">";
	foreach ($assignments as $assignment) {
		$student_id=$assignment['student_id'];
		$gradedStatus=$assignment['graded_status'];
		if($gradedStatus==0){
			echo "<li><a href=\"gradeAssignment.html?stuId=$student_id&assignId=$assignId&courseId=$course_id\">$student_id</a></li><br>";
		}
	}
echo "</ul></div>";
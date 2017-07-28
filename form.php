<?php


$connect = mysqli_connect("localhost","aaditya","adimanav","aaditya");
//Sending form data to sql db.

$name = $branch = $rollno = $mobno = $college = $year = $event = "";             
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $branch = test_input($_POST["branch"]);
  $rollno = test_input($_POST["rollno"]);
  $mobno = test_input($_POST["mobno"]);
  $college = test_input($_POST["college"]);
    $year = test_input($_POST["year"]);
    $event = test_input($_POST["event"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

mysqli_query($connect,"INSERT INTO data (name,branch,rollno,year,marks)
VALUES ('$_POST[name]', '$_POST[branch]', '$_POST[rollno]', '$_POST[year]','$_POST[college]')");

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

fwrite($myfile, $name);
fwrite($myfile, $branch);
fwrite($myfile, $rollno);
fwrite($myfile, $mobno);
fwrite($myfile, $college);
fwrite($myfile, $year);
fwrite($myfile, $event);
fclose($myfile);

?>
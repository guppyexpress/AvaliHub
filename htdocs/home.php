<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>AvaliHub</title>
	 <link rel="stylesheet" type="text/css" href="css/home.css"> 
     <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    
</head>
<body>

     <h1 class='account'>Hello, <?php echo $_SESSION['name']; ?>
<br>


<form action="logout.php">
    <input type="submit" value="logout?" />
</form>

</h1>

     
     
<h2 class='uploadStuff'>
     <form action="upload.php" method="post" enctype="multipart/form-data"> 
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form> 
</h2>
</body>


<body>
<!--first block of php code -->
<?php

$search= $_POST['search_entered'];

$searchoriginal= $search;

$search= strtolower($search);

$search= trim($search);



$search= explode(" ", $search);

$countsearchterms= count($search);



$submitbutton= $_POST['submit'];

?>





<!--html code-->
<form action="" method="POST">
Enter Search Query: <input type="text" name="search_entered" value='<?php echo $searchoriginal;?>'/><?php if($submitbutton) { if(empty($searchoriginal)) { echo "<redtext>A search 
query must be entered</redtext>"; } } ?> <br><br>
<input type="submit" name="submit" value="Search"/><br><br>
</form>






<!--second block of php-->
<?php

$directory = "uploads/";


if ($submitbutton){
if (!empty($searchoriginal)) 
{
if (is_dir($directory)){

  if ($open = opendir($directory)){
if ($countsearchterms == 1)
{
    while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);
	
	
      if ((strpos("$file",  "$search[0]") !== false) && (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")))
	{
	
	 echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
      
}

    }
}
else if ($countsearchterms == 2) {
while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);
	

      if (((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false)) && (($fileextension == "jpg") 
|| ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp"))) {
	$array[] += "$file";
	 echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
}
 
	
    }
    

}

else if ($countsearchterms == 3) {
while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);
	

      if (((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)) 
&& (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")))
	{
	$array[] += "$file";
	 echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
}
 
	
    }
    

}

else if ($countsearchterms == 4) {
while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);
	

      if (((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false))
&& (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")))
	{
	$array[] += "$file";
	echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
}
 
	
    }
    

}

else if ($countsearchterms == 5) {
while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);
	

      if (((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false)
&& (strpos("$file",  "$search[4]") !== false)) && (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")))
	{
	$array[] += "$file";
	echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
}
}  
}
else if ($countsearchterms == 6) {
while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);
	

      if (((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false)
&& (strpos("$file",  "$search[4]") !== false) && (strpos("$file",  "$search[5]") !== false)) && (($fileextension == "jpg") || ($fileextension == "jpeg") 
|| ($fileextension == "png") || ($fileextension == "bmp")))
	{
	$array[] += "$file";
	echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
}
}  
}
else if ($countsearchterms == 7) {
while (($file = readdir($open)) !== false){
	$fileoriginal= $file;
	$file= strtolower($file);
	$position= strpos("$file", ".");
	$fileextension= substr($file, $position + 1);
	$fileextension= strtolower($fileextension);

      if (((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false)
&& (strpos("$file",  "$search[4]") !== false) && (strpos("$file",  "$search[5]") !== false) && (strpos("$file",  "$search[6]") !== false))
&& (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")))
	{
	$array[] += "$file";
	echo "<img style='width: 200px;' src='/uploads/$fileoriginal'>". "<br><br><hr>";
}
}  
}
closedir($open);
    }

  }//while loop





}
}
?>





     <h2 class='logo'>
<img src="../images/AvalihubTransparent.png" alt="AvaliHub icon">
</h2>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

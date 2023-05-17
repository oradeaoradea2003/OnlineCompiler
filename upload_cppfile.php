<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Compilation Lucian</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="w3.css">

<style type="text/css">
textarea {
 background-color: yellow;
 font-size: 0.35em;
 font-weight: bold;
 font-family: Verdana, Arial, Helvetica, sans-serif;
 border: 1px solid black;
}
</style>
<script src=""></script>
<body>






<?php
if ($_FILES["file"]["error"] > 0)
  {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
  
$target_dir = "./";
$target_file = $target_dir . basename($_FILES["file"]["name"]);


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>




<?php
$file1 = $target_file;
#content="cucu";
$myfile = fopen( $file1, "r") or die("Unable to open file!");
 while(!feof($myfile)) {
  $content= $content.fgets($myfile);
}
fclose($myfile);
// echo $content; 
?>
<form action="compile.php" method="post">
<div class="w3-container w3-blue  w3-cell" style="float: left; width: 100%;">

<div class="w3-container w3-blue  w3-cell" style="float: left; width: 100%;">
<textarea autocomplete="off"  spellcheck="false"  name="idtextarea" id="idtextarea" style="width: 100%;"  rows="15">
<?php
echo $file1;
 echo htmlspecialchars($content); 
?>
</textarea>
</div>

<div class="w3-container w3-red w3-cell w3-round-xlarge" style="float: left; width: 50%;">
<input type="submit" class="w3-button w3-green w3-round-xlarge" style="float: left; width: 100%;" id="idbutsubmit" name="idbutsubmit" value="COMPILE and RUN">
</div>
</form>

<div class="w3-container w3-red w3-cell w3-round-xlarge" style="float: left; width: 10%;">
<button class="w3-button w3=blue w3-round-xlarge" id="buttoncopy" name="buttoncopy" >COPY CODE</button>
</div>
<script>
//document.getElementById('idtextarea2').value ="fff";
</script>



  
</body>
</html>
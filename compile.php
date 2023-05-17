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

echo "START THE JOB..";
//print_r($_POST['idtextarea']);
//exit("die here");

$text = trim($_POST['idtextarea']);
//$textAr = explode("\n", $text);
//$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
//echo "<br>";
//echo "<br>";



//echo $text;



flush();
ob_flush();
sleep(1);
echo "<br>";
echo "Saving code into the file: lukcompilefile.cpp   ";
flush();
ob_flush();
sleep(1);
echo "<br>";
$myfile = fopen("lukcompilefile.cpp", "w") or die("Unable to open file for writig !");
fwrite($myfile, $text);
fclose($myfile);
echo "SAVED the file: lukcompilefile.cpp   ";
flush();
ob_flush();
sleep(1);
echo "<br>";





exec("rm a.out",$rmoutput, $rmretval);
echo "STARTING COMPILING...THE CODE:";
flush();
ob_flush();
sleep(1);
echo "<br>";
$retval=0;
$command = "g++ lukcompilefile.cpp";
exec($command . ' 2>&1', $output, $retval);
//exec($command, $output, $retval);
//echo "Compile return value: ";
//echo $retval;
//echo "Compile output :";
//echo var_dump($output);
flush();
ob_flush();
sleep(1);
echo "<br>";
if($retval>0){
echo "ERROR !!! Compile output value: ";
//echo "<br>";
// echo var_dump($output);
flush();
ob_flush();
sleep(1);
//echo "<br>";

}
//echo "<br>";
//echo var_dump($output);



$command = './a.out';
exec($command . ' 2>&1', $exeoutput, $exereturn);


 
//echo "EXECUTE return value: ";
//echo "<br>";
//echo $exeretval;
//echo "<br>";
flush();
ob_flush();
sleep(1);
//echo "EXECUTE output value: ";

if($exeretval>0){
//echo "<br>";
//echo " ERROR !!! EXECUTE output value: ";

//echo "<br>";
//var_dump($exeoutput);
//echo "<br>";
//print_r($exeoutput);
//echo "<br>";
flush();
ob_flush();
sleep(1);
}
//END IF ERROR EXE


//for($i=0; $i<sizeof($exeoutput); $i++){echo "<br>";echo $exeoutput[$i];}
//echo "<br>";
//var_dump($exeoutput);

?>


<div class="w3-container w3-green">
<h1>The Code was: </h1>
</div>
<div class="w3-container w3-blue  w3-cell" style="float: left; width: 100%;">
<textarea autocomplete="off"  spellcheck="false"  name="idcodetextarea" id="idcodetextarea" style="width: 100%;"  rows="10">
<?php echo $text ?>
</textarea>
</div>

<div class="w3-container w3-green">
<h1>The output is: </h1>
</div>



<div class="w3-container w3-blue  w3-cell" style="float: left; width: 100%;">
<textarea autocomplete="off"  spellcheck="false"  name="idouttextarea" id="idouttextarea" style="width: 100%;"  rows="10">
<?php 

for($i=0; $i<sizeof($output); $i++){echo "\n"; echo $output[$i];}
flush();
ob_flush();
sleep(1);

for($i=0; $i<sizeof($exeoutput); $i++){echo "\n"; echo $exeoutput[$i];}
flush();
ob_flush();
sleep(1);



?>


</textarea>
</div>



<div class="w3-container w3-red  w3-round-xlarge"  style="float: left; width: 50%;">
<!--
<input type="submit"   onclick="location.href = 'index.html';"   class="w3-button w3-green w3-round-xlarge"  style="float: left; width: 100%;" id="iddut" name="idbut" value="COMPILE NEW C++ CODE">
--> 
<input type="submit"   onclick="window.history.go(-1); return false;"   class="w3-button w3-green w3-round-xlarge"  style="float: left; width: 100%;" id="iddut" name="idbut" value="COMPILE NEW C++ CODE">


  
</body>
</html>
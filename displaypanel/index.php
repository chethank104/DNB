<!DOCTYPE html>
<html lang="en">
<head>
<title>Digital Notice Board using IOT</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

HTML, body {
  font-family: Arial;
  margin: 0px 0px;
  
padding: 0px;
  border: 0px;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 0px;
  text-align: center;
  height: 30px;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 600px; /* Should be removed. Only for demonstration */
}

/* Left and right column */
.column.side {
  width: 30%;
}

/* Middle column */
.column.middle {
  width: 70%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
















body {font-family:Arial;}
.mySlides {display: none;}
img {vertical-align: left;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
  padding: 0px 0px;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 0px 0px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 1.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {

  from {opacity: .4} 
  to {opacity: 1}


}

.center-left {
  position: absolute;
  top: 35%;
  left: 10%;
}
</style>
</head>
<body>

<div class="header" style="background-color:red;">
  <h2><div style="color:white">Digital Notice Board:</div></h2>
</div>

<div class="row">
  <div class="column side" style="background-color:white;">

<div><img src='logo.jpg'></div>

<?php
require('db.php');

function dateconvert($date,$func) 
{ 
if ($func == 1)
{ //insert conversion 
$orderdate = explode('-', $date); 
$month = $orderdate[1];
$day = $orderdate[0];
$year  = $orderdate[2];
$date = "$year-$month-$day"; 
return $date; 
} 
if ($func == 2)
{ //output conversion 
$orderdate = explode('-', $date); 
$month = $orderdate[1];
$day = $orderdate[2];
$year  = $orderdate[0];
$date = "$day-$month-$year"; 
return $date; 
}
}

date_default_timezone_set('Asia/Kolkata');
$dateupload=date('20y-m-d');
$btoday = date('m-d');


$query1 = "SELECT * FROM `news_tab` WHERE datetodisplay <= '$dateupload' and datetilldisplay >= '$dateupload' and typenews=1";
$result1 = mysqli_query($con,$query1) or die(mysqli_error());

$query2 = "SELECT * FROM `news_tab` WHERE datetodisplay <= '$dateupload' and datetilldisplay >= '$dateupload' and typenews=2";
$result2 = mysqli_query($con,$query2) or die(mysqli_error());

$query21 = "SELECT * FROM `news_tab` WHERE datetodisplay <= '$dateupload' and datetilldisplay >= '$dateupload' and typenews=3";
$result21 = mysqli_query($con,$query21) or die(mysql_error());
$result22 = mysqli_query($con,$query21) or die(mysql_error());

$query3 = "SELECT * FROM `candidate_tab` WHERE candbdate LIKE '%%%%%$btoday'";
$result3 = mysqli_query($con,$query3) or die(mysqli_error());
$result4 = mysqli_query($con,$query3) or die(mysqli_error());


$tbtoday = date('m-d', strtotime(' + 1 days'));

$query5 = "SELECT * FROM `candidate_tab` WHERE candbdate LIKE '%%%%%$tbtoday'";
$result5 = mysqli_query($con,$query5) or die(mysql_error());
?>



<marquee direction="up" scrollamount="3">

<?php

while ($rows1 = mysqli_fetch_assoc($result1))
{
$date2display = dateconvert($rows1['datetodisplay'],'2');	
echo "<hr>";
echo "<p><b>$date2display :</b>$rows1[nnews]</p>";
}
 
?>

</marquee>


</div>
  <div class="column middle" style="background-color:black;">

<div class="slideshow-container">

<?php

$totrec = mysqli_num_rows($result21);
$sn = 1;
while ($rows3 = mysqli_fetch_assoc($result21))
{
	
$imagefile = "../coordinatorpanel/".$rows3['nphotofilename'];
//	echo $imagefile;
echo "<div class='mySlides fade'>
  <div class='numbertext'>$sn / $totrec</div>
  <img src='$imagefile' style='width:100%'>
</div>";

$sn = $sn + 1;

}
 
?>






</div>
<br>

<div style="text-align:center">

<?php
while ($rows4 = mysqli_fetch_assoc($result22))
{
echo "<span class='dot'></span>";
}  
?>
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
</div>
</div>

<div class="footer" style="background-color:red;" >

 <?php
 $tomobday="";
 echo "<marquee> <div style='color:white'>";
while ($rows5 = mysqli_fetch_assoc($result5))
{
	$tomobday = "| <b>TOMORROWs BIRTHDAY CELEBRITIES:</b>";
	$tomobday = $tomobday.$rows5['candname']."-".$rows5['candusn']." | ";
	echo $tomobday;
}





while ($rows2 = mysqli_fetch_assoc($result2))
{
$date2display = dateconvert($rows2['datetodisplay'],'2');	
echo " | ";
echo "<b>$date2display :</b>$rows2[nnews]";

}
 
?> </marquee></div>
</div>

</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<title>Digital Notice Board</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
	
</head> 
<body>

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
$msg = "";

if (isset($_POST['tnews'])){

$tnews = $_REQUEST['tnews'];
$fdate = $_REQUEST['fdate'];
$tdate = $_REQUEST['tdate'];

date_default_timezone_set('Asia/Kolkata');
$dateupload=date('d-m-20y');
$dateupload=dateconvert($dateupload,'1');

$flaginsert = 0;

if (!$tnews)
{
$msg = $msg."Enter text news".$fdate;
$flaginsert = 1;
}



if (!$flaginsert)
{




$sql = "INSERT INTO news_tab (nnews, datetodisplay, datetilldisplay, dateuploaded, typenews) VALUES ('$tnews', '$fdate', '$tdate', '$dateupload', 1)";

if (mysqli_query($con, $sql)) {
    $msg = "Vertical news created successfully...";
} 

}
}
?>

   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
						<div class="top_bg">
							
								<div class="header_top">
									<div class="top_right">
										<ul>
									<li>
										</ul>
									</div>
									<div class="top_left">
									</div>
										<div class="clearfix"> </div>
								</div>
							
						</div>
					<div class="clearfix"></div>
				<!-- /top_bg -->
				</div>
				
				
				<!--content-->
			<div class="content">
					
				<form action="cn1.php" method="post">
				<div>
					<label>ENTER VERTICAL TEXT NEWS:<br> 
					<h3>
					<?php
					echo $msg;
					?>
					</h3>
						<textarea placeholder="Enter text news here:" tabindex="1" required="" autofocus="" name="tnews" rows="2" cols="50"> </textarea>
					</label> <BR><br>
										<label>FROM DATE TO DISPLAY: 
						<input placeholder="from date:" type="date" tabindex="1" required="" autofocus="" name="fdate">
					</label> <BR><br>
										<label>TILL DATE TO DISPLAY: 
						<input placeholder="To date:" type="date" tabindex="1" required="" autofocus="" name="tdate">
					</label> <BR><br>
										
					
									<div>
					<input type="submit" value="CREATE VERTICAL TEXT NEWS">
				</div>
				</div>
			</form>

	
			</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									






<ul id="menu" >
		<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>HOME</span></a></li>
		<li id="menu-academico" ><a href="cn.php"><i class="fa fa-file-text-o"></i> <span>CREATE H-TEXT NEWS</span></a></li>
		<li id="menu-academico" ><a href="cn1.php"><i class="fa fa-file-text-o"></i> <span>CREATE V-TEXT NEWS</span></a></li>
		<li id="menu-academico" ><a href="cin.php"><i class="fa fa-file-text-o"></i> <span>CREATE IMAGE NEWS</span></a></li>
		<li id="menu-academico" ><a href="deletenews.php"><i class="fa fa-file-text-o"></i> <span>DELETE NEWS</span></a></li>
		<li id="menu-academico" ><a href="logout.php"><i class="fa fa-file-text-o"></i> <span>LOGOUT</span></a></li>					</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
   
		   <script src="js/menu_jquery.js"></script>
</body>
</html>
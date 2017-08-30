<html>
<head>
<script type="text/javascript">
<!-->
var image1=new Image()
image1.src="8.jpg"
var image2=new Image()
image2.src="9.jpg"
var image3=new Image()
image3.src="10.jpg"
//-->
</script>
</head>
<body>
<img src="1.jpg" alt="title">
<pos1 style="position:absolute;left:900px;top:210px;">
<img src="7.jpg" alt="advt">
</pos1>
<pos2 style="position:absolute;left:490px;top:580px;">
<img src="3.jpg" alt="teleno">
</pos2>
<pos3 style="position:absolute;left:240px;top:210px;">
<img src="4.jpg" alt="teleno">
</pos3>
<pos4 style="position:absolute;left:910px;top:210px;">
<img src="8.jpg" name="slide" width="450" height="200">
</pos4>
<script type="text/javascript">
<!--
var step=1
function slideit(){
document.images.slide.src=eval("image"+step+".src")
if(step<3)
step++
else
step=1
setTimeout("slideit()",2500)
}
slideit()
//-->
</script>

<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:240px;top:270px;">From</p1>
<p2 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:515px;top:270px;">To</p2>
<p3 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:240px;top:340px;">Date of journey</p3>
<form method="post" action="home.php">
<select style="width:200px;position:absolute;left:240px;top:290px; "name="From">
<option value="Goa">Goa</option>
<option value="Bombay">Bombay</option>
</select>
<select style="width:200px;position:absolute;left:515px;top:290px"  name="To">
<option value="Goa">Goa</option>
<option value="Bombay">Bombay</option>
</select>

<input size="30" type="text" name="date"style="width:200px;position:absolute;left:240px;top:360px" placeholder="dd-mm-yyyy">
<input onclick="location.href=http://localhost/bus_table.php" style="color:White; background-color:#00009C;position:absolute;left:570px;top:360px" type="submit" value="Search buses" name="submit">
</form>

<a href="home.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:900px;top:170px;">HOME</a>
<a href="print_ticket.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:970px;top:170px;">PRINT TICKET</a>
<a href="cancellation.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:1085px;top:170px;">CANCELLATION</a>
<?php
session_start();
 
 
 if (isset($_POST['submit']))
 {
   if(empty($_POST['date'])||($_POST['From']==$_POST['To']))
 {
           echo " <p1 style=\"color:red; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:240px;top:410px;\">";
			echo "Error ocurred!!! please enter again"; 
			echo "</p1>";

 }
 else
 {
 $_SESSION['from']=$_POST['From']; 
 $_SESSION['to']=$_POST['To'];
 $_SESSION['date']=$_POST['date'];
 Header( 'Location: bus_table.php');
} 
}
  ?>
<body>
</html>

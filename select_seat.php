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
</body>
<img src="1.jpg" alt="title">
<pos1 style="position:absolute;left:900px;top:210px;">
<img src="7.jpg" alt="advt">
</pos1>
<pos2 style="position:absolute;left:490px;top:580px;">
<img src="3.jpg" alt="teleno">
</pos2>
<pos3 style="position:absolute;left:240px;top:210px;">
<img src="13.jpg" alt="workhead">
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

<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:240px;top:275px;">Select seat</p1>
<form method="post" action="select_seat.php">
<?php
session_start();
$bus_no=$_SESSION['bus_no'];

@mysql_connect('localhost','root','')or die('Could not connect to database');
mysql_select_db('bus_reservation');

$sql1="SELECT seat_no FROM seat_details WHERE bus_no='$bus_no' and status='available'";
$result1=mysql_query($sql1) or trigger_error(mysql_error().$sql1);

echo "<select style=\"width:100px;position:absolute;left:330px;top:275px; \"name=\"seat_no\" size=\"3\">";
while($row1 = mysql_fetch_array($result1))
{
     $temp1=$row1['seat_no'];
     echo"<option value=";
	echo $temp1;
	echo ">";
	echo $temp1; 
	 echo "</option>";
	 }
echo "</select>";
?>
<input onclick="location.href=http://localhost/customer_details.php" style="color:White; background-color:#00009C;position:absolute;left:550px;top:275px" type="submit" value="  Next  " name="submit">
</form>
<a href="home.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:900px;top:170px;">HOME</a>
<a href="print_ticket.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:970px;top:170px;">PRINT TICKET</a>
<a href="cancellation.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:1085px;top:170px;">CANCELLATION</a>
<?php


$sql="SELECT type FROM bus_details WHERE bus_no='$bus_no'";
$result=mysql_query($sql) or trigger_error(mysql_error().$sql); 

while($row = mysql_fetch_array($result))
{
     $temp=$row['type'];
}
if($temp=="seater")
{
 echo "<pos2 style=\"position:absolute;left:260px;top:375px;\">";
 echo "<img src=\"14.jpg\">";
 echo "</pos2>";

}
else
{
 echo "<pos2 style=\"position:absolute;left:260px;top:375px;\">";
 echo "<img src=\"15.jpg\">";
 echo "</pos2>";

}
 if (isset($_POST['submit']))
 {
  $_SESSION['seat_no']=$_POST['seat_no'];  
  
   Header( 'Location: customer_details.php');
 }

?>
</body>
</html>
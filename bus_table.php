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
<pos3 style="position:absolute;left:20px;top:210px;">
<img src="11.jpg" alt="workhead">
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
<p3 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:240px;top:520px;">Enter bus number</p3>
<form method="post" action="bus_table.php">
<input size="30" type="text" name="bus_no"style="width:200px;position:absolute;left:240px;top:540px">
<input onclick="location.href=http://localhost/select_seat.php" style="color:White; background-color:#00009C;position:absolute;left:590px;top:540px" type="submit" value="View seats" name="submit">
</form>
<a href="home.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:900px;top:170px;">HOME</a>
<a href="print_ticket.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:970px;top:170px;">PRINT TICKET</a>
<a href="cancellation.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:1085px;top:170px;">CANCELLATION</a>



<?php
session_start();
$from=$_SESSION['from'];
$to=$_SESSION['to'];
$date=$_SESSION['date'];
@mysql_connect('localhost','root','')or die('Could not connect to database');
mysql_select_db('bus_reservation');
$sql="SELECT B.bus_no,B.travels,B.type,B.dept_time,B.seats,B.fare FROM route as A INNER JOIN bus_details as B ON A.bus_no=B.bus_no WHERE A.from='$from' and A.to='$to' and A.date='$date'";
$result=mysql_query($sql) or trigger_error(mysql_error().$sql);

$fields_num = mysql_num_fields($result);

$t1=260;
$t2=285;
while($row = mysql_fetch_array($result))
{
  
  echo " <p1 style=\"color:#000000; font-size: 16px; font-family: calibri, sans-serif;position:absolute;left:30px;top:";
  echo $t1;
  echo "px;\">";
  echo $row['bus_no'];  
  echo "</p1>";
  echo " <p1 style=\"color:#000000; font-size: 16px; font-family: calibri, sans-serif;position:absolute;left:145px;top:";
  echo $t1;
  echo "px;\">";
  echo $row['travels'];  
  echo "</p1>";
  echo " <p1 style=\"color:#000000; font-size: 16px; font-family: calibri, sans-serif;position:absolute;left:360px;top:";
  echo $t1;
  echo "px;\">";
  echo $row['type'];
  echo "</p1>";
  echo " <p1 style=\"color:#000000; font-size: 16px; font-family: calibri, sans-serif;position:absolute;left:505px;top:";
  echo $t1;
  echo "px;\">";
  echo $row['dept_time'];  
  echo "</p1>";
    echo " <p1 style=\"color:#000000; font-size: 16px; font-family: calibri, sans-serif;position:absolute;left:645px;top:";
  echo $t1;
  echo "px;\">";
  echo $row['seats'];  
  echo "</p1>";  
    echo " <p1 style=\"color:#000000; font-size: 16px; font-family: calibri, sans-serif;position:absolute;left:750px;top:";
  echo $t1;
  echo "px;\">";
  echo $row['fare'];  
  echo "</p1>";
  echo "<pos3 style=\"position:absolute;left:20px;top:";
  echo $t2;
  echo"px;\">";
  echo "<img src=\"12.jpg\" alt=\"workhead\">";
  echo "</pos3>";

  $t1+=45;
  $t2+=50;
 
  
  
  }
 if (isset($_POST['submit']))
 {
  
  $_SESSION['bus_no']=$_POST['bus_no'];  
  $bus_no1=$_SESSION['bus_no'];
  $sql1="SELECT fare FROM bus_details WHERE bus_no='$bus_no1'";
  $result1=mysql_query($sql1) or trigger_error(mysql_error().$sql1);
  while($row1 = mysql_fetch_array($result1))
 {
       $fare=$row1['fare'];
 
 }
 $_SESSION['fare']=$fare;
 Header( 'Location: select_seat.php');
 }
?>

</body>
</html>


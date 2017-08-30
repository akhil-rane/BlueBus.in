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
<pos2 style="position:absolute;left:475px;top:580px;">
<img src="3.jpg" alt="teleno">
</pos2>
<pos3 style="position:absolute;left:240px;top:210px;">
<img src="5.jpg" alt="workhead">
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
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:240px;top:280px;">Ticket number</p1>
<form method="post" action="print_ticket.php">
<input size="30" type="text" name="ticket_no"style="width:200px;position:absolute;left:340px;top:275px">
<input onclick="location.href=http://localhost/print_ticket1.php" style="color:White; background-color:#00009C;position:absolute;left:340px;top:330px" type="submit" value=" Submit " name="submit">
</form>

<a href="home.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:900px;top:170px;">HOME</a>
<a href="print_ticket.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:970px;top:170px;">PRINT TICKET</a>
<a href="cancellation.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:1085px;top:170px;">CANCELLATION</a>
<?php
 if (isset($_POST['submit']))
{
 session_start();
$_SESSION['ticket_no']=$_POST['ticket_no'];
$ticket_no=$_SESSION['ticket_no'];
@mysql_connect('localhost','root','')or die('Could not connect to database');
	mysql_select_db('bus_reservation');
	$sql="SELECT ticket_no FROM customer_details";
 $result=mysql_query($sql) or trigger_error(mysql_error().$sql);
     while($row= mysql_fetch_array($result))
 {
       $t1=$row['ticket_no'];
	   if($t1==$ticket_no)
       {
             Header( 'Location: print_ticket1.php');  
	   
	   } 
 }
echo " <p1 style=\"color:red; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:340px;top:380px;\">";
echo "Error !!! ticket number is incorrect"; 
echo "</p1>";
}
?>
<body>
</html>

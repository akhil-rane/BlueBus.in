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
<pos3 style="position:absolute;left:100px;top:210px;">
<img src="16.jpg" alt="workhead">
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
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:270px;">Name</p1>
<p2 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:430px;top:270px;">Gender</p2>
<p3 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:590px;top:270px;">Age</p3>
<p4 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:700px;top:270px;">Seat no</p4>
<p5 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:450px;top:290px;">M</p5>
<p6 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:500px;top:290px;">F</p6>
<p6 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:340px;">Mobile</p6>
<p7 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:430px;top:340px;">E-mail</p7>
<p8 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:410px;">Credit card no.</p8>
<p9 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:430px;top:410px;">Name on the card</p9>
<p10 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:470px;">Amount payable</p10>

<form method="post" action="customer_details.php">
<input size="50" type="text" name="customer_name"style="width:250px;position:absolute;left:110px;top:290px">
<input type="radio" name="gender" value="M"style="position:absolute;left:425px;top:290px">
<input type="radio" name="gender" value="F"style="position:absolute;left:475px;top:290px">
<input size="50" type="text" name="customer_age"style="width:60px;position:absolute;left:590px;top:290px">
<input size="50" type="text" name="mobile"style="width:250px;position:absolute;left:110px;top:360px">
<input size="50" type="text" name="email"style="width:300px;position:absolute;left:430px;top:360px">
<input size="50" type="text" name="card_no"style="width:250px;position:absolute;left:110px;top:430px">
<input size="50" type="text" name="card_name"style="width:250px;position:absolute;left:430px;top:430px">
<input onclick="location.href=http://localhost/customer_details.php" style="color:White; background-color:#00009C;position:absolute;left:670px;top:490px" type="submit" value="  Book now  " name="submit">
</form>
<a href="home.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:900px;top:170px;">HOME</a>
<a href="print_ticket.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:970px;top:170px;">PRINT TICKET</a>
<a href="cancellation.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:1085px;top:170px;">CANCELLATION</a>
<?php
session_start();
$seat_no=$_SESSION['seat_no'];
 echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:715px;top:290px;\">";
  echo $seat_no;  
  echo "</p1>"; 
 $fare=$_SESSION['fare'];
  echo " <p1 style=\"color:#4D4D4D;font-weight: bold; font-size: 30px; font-family: calibri, sans-serif;position:absolute;left:110px;top:490px;\">";
  echo $fare;  
  echo "</p1>"; 
if (isset($_POST['submit'])){  
  if (isset($_POST['customer_name'])&&isset($_POST['customer_age'])&&isset($_POST['mobile'])&&isset($_POST['email'])&&isset($_POST['card_no'])&&isset($_POST['card_name'])&&isset($_POST['gender']))
{
   $name=$_POST['customer_name'];   
   $age=$_POST['customer_age'];
   $mobile=$_POST['mobile'];
   $email=$_POST['email'];
   $card_no=$_POST['card_no'];
   $card_name=$_POST['card_name'];
   $gender=$_POST['gender'];
   
   @mysql_connect('localhost','root','')or die('Could not connect to database');
	mysql_select_db('bus_reservation');
	$sql="SELECT * FROM ticket_no";
    $result=mysql_query($sql) or trigger_error(mysql_error().$sql);
	while($row = mysql_fetch_array($result))
{
    $default=$row['x'];    
    
 }  
   $default+=1;
   $sql1="UPDATE ticket_no SET x=$default";
   $result1=mysql_query($sql1) or trigger_error(mysql_error().$sql1);
    
   $bus_no=$_SESSION['bus_no'];
   $sql2="UPDATE seat_details SET status='booked',ticket_no=$default WHERE bus_no='$bus_no' and seat_no='$seat_no' ";
   $result2=mysql_query($sql2) or trigger_error(mysql_error().$sql2);
   
   $sql3="INSERT INTO customer_details VALUES($default,'$name','$gender',$age,$mobile,'$email',$card_no,'$card_name')";
   $result3=mysql_query($sql3) or trigger_error(mysql_error().$sql3);
   
   $sql4="UPDATE bus_details SET seats=seats-1 WHERE bus_no=$bus_no and seats>0";
   $result4=mysql_query($sql4) or trigger_error(mysql_error().$sql4);  
    
	$_SESSION['temp']=$default;
	
	Header( 'Location: ticket_booked.php');
 }

echo " <p1 style=\"color:red; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:350px;top:540px;\">";
echo "Error !!!  please fill all fields correctly"; 
echo "</p1>"; 

} 
 ?>
</body>
</html>
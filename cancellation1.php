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
<pos2 style="position:absolute;left:475px;top:580px;">
<img src="3.jpg" alt="teleno">
</pos2>
<pos3 style="position:absolute;left:100px;top:210px;">
<img src="19.jpg" alt="workhead">
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
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:270px;">Ticket no:</p1>
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:340px;">Bus no:</p1>
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:330px;top:340px;">Travels:</p1>
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:610px;top:270px;">Date:</p1>
<p1 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:610px;top:340px;">Seat no:</p1>
<p2 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:390px;top:410px;">Gender:</p2>
<p3 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:610px;top:410px;">Age:</p3>
<p4 style="color: #000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:110px;top:410px;">Name:</p4>




<form method="post" action="cancellation1.php">
<input onclick="location.href=cancellation2.php" style="color:White; background-color:#00009C;position:absolute;left:670px;top:490px" type="submit" value=" Cancel ticket " name="submit">
</form>

<a href="home.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:900px;top:170px;">HOME</a>
<a href="print_ticket.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:970px;top:170px;">PRINT TICKET</a>
<a href="cancellation.php" style="color: #454545; font-size: 15px; font-family: calibri, sans-serif;font-weight: bold;position:absolute;left:1085px;top:170px;">CANCELLATION</a>
<?php
   
   session_start();
   $ticket_no=$_SESSION['ticket_no1'];
   $email=$_SESSION['email'];
   @mysql_connect('localhost','root','')or die('Could not connect to database');
	mysql_select_db('bus_reservation');
	$sql="SELECT name,gender,age FROM customer_details WHERE ticket_no=$ticket_no and email='$email' ";
    
	$result=mysql_query($sql) or trigger_error(mysql_error().$sql);
     while($row= mysql_fetch_array($result))
 {
       $age=$row['age'];
       $name=$row['name']; 
       $gender=$row['gender']; 
 }
echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:170px;top:410px;\">";
  echo $name;  
  echo "</p1>"; 
echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:190px;top:270px;\">";
  echo $ticket_no;  
  echo "</p1>";
echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:650px;top:410px;\">";
  echo $age;  
  echo "</p1>";  
echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:450px;top:410px;\">";
  echo $gender;  
  echo "</p1>";   

$sql1="SELECT d,bus_no,seat_no FROM seat_details WHERE ticket_no=$ticket_no";    
$result1=mysql_query($sql1) or trigger_error(mysql_error().$sql1);
     while($row1= mysql_fetch_array($result1))
 {
       $date=$row1['d'];
       $bus_no=$row1['bus_no']; 
       $seat_no=$row1['seat_no']; 
 }

echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:660px;top:270px;\">";
  echo $date;  
  echo "</p1>";
echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:680px;top:340px;\">";
  echo $seat_no;  
  echo "</p1>"; 
echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:170px;top:340px;\">";
  echo $bus_no;  
  echo "</p1>"; 

$sql2="SELECT travels FROM bus_details WHERE bus_no=$bus_no";    
$result2=mysql_query($sql2) or trigger_error(mysql_error().$sql2);  
    while($row2= mysql_fetch_array($result2))
 {
       $travels=$row2['travels'];       
 }
  echo " <p1 style=\"color:#000000; font-size: 15px; font-family: calibri, sans-serif;position:absolute;left:390px;top:340px;\">";
  echo $travels;  
  echo "</p1>";  
   if (isset($_POST['submit']))
{
  $sql3="DELETE FROM customer_details WHERE ticket_no=$ticket_no and email='$email'";    
  $result3=mysql_query($sql3) or trigger_error(mysql_error().$sql3); 
  
   $sql5="SELECT d,bus_no FROM seat_details WHERE ticket_no=$ticket_no";    
  $result5=mysql_query($sql5) or trigger_error(mysql_error().$sql5); 
     while($row3= mysql_fetch_array($result5))
 {
       $day=$row3['d'];       
       $num=$row3['bus_no'];
 }
  
  
  $sql4="UPDATE seat_details SET status='available',ticket_no=0 WHERE ticket_no=$ticket_no";    
  $result4=mysql_query($sql4) or trigger_error(mysql_error().$sql4); 
  
  $sql6="UPDATE bus_details SET seats=seats+1 WHERE d='$day' and bus_no=$num";    
  $result6=mysql_query($sql6) or trigger_error(mysql_error().$sql6);
 
  
  Header( 'Location: cancellation2.php');
}
?>

</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BABY NAMES</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />


</script>
</head>
<body>
<div class="header-wrapper">
  <div class="header">
    <div class="logo">
      <h1>BABY NAMES</h1>
    </div>
    
    <div class="menu">
      <ul>
        <li><a  href="index1.html">Home</a></li>
        <li><a class="active" href="#">Top Names</a></li>
        <li><a href="index3.php">Graphical</a></li>
        <li><a href="index4.html">About</a></li>
      </ul>
    </div>
    
  </div>
  
</div>

<div class="clear"></div>
<div class="main">
  <h3 class="h3">Popular Names by Birth Year</h3>
</div>
<div class="footer" >
  <center>
<form class="form-container" id="form-container" action="index2.php" method="POST">
<div class="form-title"><h2>Top Names</h2></div>
<div class="form-title" >Top</div>
<input class="form-field" type="text" name="tname" autocomplete="off" placeholder="Ex-10,50,100,etc"/><br />
<div class="form-title">Gender</div>
<select class="form-field"  name="Gender" >
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="any">Both</option>
</select> <br />
<div class="form-title">Year</div>
<select class="form-field"  name="year">
<?php
    for ($i=1944; $i<=2013; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>

</select><br />

<input class="submit-button" type="submit" value="Submit" name="button"/>

</form>
</center>
<center>
  <div class="table_name">
  <table>
<?php

if(isset($_POST['button'] ))
{
$top=$_POST['tname'];
$year=$_POST['year'];
$gender=$_POST['Gender'];;
if($top!='')
{
$con = mysqli_connect("localhost","ashishsingh","1234","save");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{

if($gender=='male' || $gender=='female')
{
$sql = "SELECT name,gender,amount FROM `a_temp` where position<=$top and year=$year and gender=\"$gender\"";
}
else
{
$sql = "SELECT name,gender,amount FROM `a_temp` where position<=$top and year=$year and (gender=\"male\" or gender=\"female\")";

}
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    
?>

  
      <tr>
         <td>Name</td>
         <td>Gender</td>
         <td>No of births</td>
      </tr>
      <?php
    while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
         <td><center><?php echo $row['name'];?></center></td>

         <td><center><?php echo $row['gender']; ?></center></td>

         <td><center><?php echo $row['amount']; ?></center></td>
      </tr>
    
<?php 
    }
}
 else {
    echo "0 results";
}

mysqli_close($con);
}
}
}
?>

</table>
</div>
</center>
</body>
</html>



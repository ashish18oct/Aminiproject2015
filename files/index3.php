
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BABY NAMES</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-git2.min.js"> </script>

 <style>
#country-list{float:left;list-style:none;margin:0;padding:0;width:180px;margin-left: 8px;height:20px;}
#country-list li{padding: 6px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}

</style>
    <script >
    $(function(){
      $('.form-field').keyup(function(){
      var search=$('.form-field').val();
      var searchy=$('.form-name').val();
      var searchyy=$('.form-year').val();
      $.post("search.php",{"tname":search,"Gender":searchy,"year":searchyy},
      function(data){
        $('.entry').show();
       $('.entry').html(data);

      });

        });
});
    function selectCountry(val) {
  
$('.form-field').val(val);
$('.entry').hide();
}
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
        <li><a  href="index2.php">Top Names</a></li>
        <li><a class="active" href="#">Graphical</a></li>
        <li><a href="index4.html">About</a></li>
      </ul>
    </div>
   
  </div>
  
</div>
<div class="clear"></div>

<div class="main">
  <h3 class="h3">Popularity of Names</h3>
</div>
<div class="footer" >
  <center>
<form class="form-container" id="form-container" action="index3.php" method="POST">
<div class="form-title"><h2>Popularity</h2></div>

<div class="form-title">Gender</div>

<select class="form-name"  name="Gender" >
  <option value="male">Male</option>
  <option value="female">Female</option>
</select> <br />

<div class="form-title">Year</div>
<select class="form-year"  name="year">



<?php
    for ($i=1944; $i<=2013; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>

</select><br />

<div class="form-title">Chart Type</div>

<select class="form-name"  name="chart" >
  <option value="Bar">Bar</option>
  <option value="Line">Line</option>
</select> <br />

<div class="form-title">Name</div>
<input class="form-field" type="text" name="tname" placeholder="Enter Name" autocomplete="off"/><br />
<div class="entry" > 

</div>

<input class="submit-button" type="submit" value="Submit" name="button"/>

</form>
</center>
 <?php
 if(isset($_POST['button']))
{
include("fusioncharts.php");
?>
<html>
<head>
    <title>Simple Column 2D Chart</title>


    <script src="fusioncharts.js"></script>
   </head>
   <body>
    <center>
    <?php

$name=$_POST['tname'];
$year=$_POST['year'];
$gender=$_POST['Gender'];
$chart=$_POST['chart'];

if($name!='')
{
$dbhandle= mysqli_connect("localhost","ashishsingh","1234","save");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$strQuery = "SELECT  * FROM `a_temp` where  name LIKE \"$name\" and gender=\"$gender\" and year BETWEEN $year and 2013 GROUP BY(year)";
 


$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");


if ($result) 
{  
  

$arrData = array(
  "chart" => array
  (
    "caption" => "Popularity",
    "subCaption" =>"Trend Of Names Till 2013",
    "xaxisname" =>"Years",
    "yaxisname" =>"No of Births",
    "paletteColors"=>"#B22222",
    "bgColor" => "",
    "borderAlpha"=>"20",
    "canvasBorderAlpha"=> "0",
    "usePlotGradientColor"=> "0",
    "plotBorderAlpha"=>"10",
    "showXAxisLine"=>"1",
    "xAxisLineColor"=>"#999999",
    "showValues" =>"0",
    "divlineColor" =>"#999999",
    "divLineIsDashed"=>"1",
    "showAlternateHGridColor"=>"#f",
    "theme" =>"ocean"
  )
);

$arrData["data"] = array();


while($row = mysqli_fetch_array($result)) 
{
array_push($arrData["data"], array(
  "label" => $row["year"],
  "value" => $row["amount"]
  )
);
}


$jsonEncodedData = json_encode($arrData);

if($chart=='Bar')
{
$columnChart = new FusionCharts("column3D", "myFirstChart" , 1300, 500, "chart-1", "json", $jsonEncodedData);
}
else
{
  $columnChart = new FusionCharts("line", "myFirstChart" , 1300, 500, "chart-1", "json", $jsonEncodedData);

}
// Render the chart

$columnChart->render();
// Close the database connection

$dbhandle->close();
}
else
{
  echo "not valid";
}
}
}
?>
<div id="chart-1"><!-- Fusion Charts will render here --></div>
</center>
   </body>
</html>
  <div>
    <div class="end">
      
    </div>
</body>
</html>



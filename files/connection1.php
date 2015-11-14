 <?php
include("fusioncharts.php");
?>
<html>
<head>
    <title>RESULT</title>

    

    <script src="fusioncharts.js"></script>
   </head>
   <body>
    <center>
    <?php

$name=$_GET['name'];
$year=$_GET['year'];
$gender=$_GET['Gender'];
$option=$_GET['option'];

$dbhandle= mysqli_connect("localhost","ashishsingh","1234","save");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
echo "connnected to mysQl";
}


$strQuery = "SELECT * FROM `a_temp` where BINARY name=\"$name\" and gender=\"$gender\" and year BETWEEN $year and 2013";
 



$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");


if($option=='bar')
{
if ($result) 
{  
  


$arrData = array(
  "chart" => array
  (
    "caption" => "Top 10 Names",
    "paletteColors"=>"#0075c2",
    "bgColor" => "#ffffff",
    "borderAlpha"=>"20",
    "canvasBorderAlpha"=> "0",
    "usePlotGradientColor"=> "0",
    "plotBorderAlpha"=>"10",
    "showXAxisLine"=>"1",
    "xAxisLineColor"=>"#999999",
    "showValues" =>"0",
    "divlineColor" =>"#999999",
    "divLineIsDashed"=>"1",
    "showAlternateHGridColor"=>"0"
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

$columnChart = new FusionCharts("line", "myFirstChart" , 1000, 300, "chart-1", "json", $jsonEncodedData);



$columnChart->render();
}
else
{
}

$dbhandle->close();
}
else
{
  echo "not valid";
}

?>
<div id="chart-1">Fusion Charts will render here</div>
</center>
   </body>
</html>

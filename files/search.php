<?php
    $search=$_POST['tname'];
    $searchy=$_POST['Gender'];
    $searchyy=$_POST['year'];
    
    $data=array();
    $con = mysqli_connect("localhost","ashishsingh","1234","save");
    
    if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

    
    $query="SELECT name FROM `a_temp` WHERE gender=\"$searchy\" and year=$searchyy and name LIKE \"{$search}%\"";
  
    $result = mysqli_query($con, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $data[]=$row;
      
    }
    ?>
    <ul  id="country-list" >
<?php
foreach($data as $country) {
?>
<li  onClick="selectCountry('<?php echo $country['name']; ?>');" >
    <?php echo $country['name']; ?>
</li>
<?php } ?>
</ul>
   

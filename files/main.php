<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<h1><center>BABY NAMES</center></h1>
</head>
<body>
<br>
<br>
<Center>
<h2>
Top Names:
</h2>
</center>
<br>
<br>

<form action="connection.php" method="get">
	<fieldset>
    <legend>information:</legend>
 Top: <input type="text" name="tname"> 
 Year: <select name="year">
<?php
    for ($i=1944; $i<=2013; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>

</select>
 Gender:<select name="Gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="any">Any</option>
</select>  
<br>
<input type="submit" value="Submit">
</fieldset>
</form>

<form action="connection1.php" method="get">
	<fieldset>
    <legend>information:</legend>
 Name: <input type="text" name="name">
 Year: <select type="text" name="year">
 <?php
    for ($i=1944; $i<=2013; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
 Gender:<select name="Gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="any">Any</option>
</select>  
<br>
<input type="submit" value="Submit">
</fieldset>
</form>

   </body>
   </html>
   

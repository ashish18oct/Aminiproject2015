<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<h1><center>XYZ</center></h1>
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
 Top: <input type="text" name="tname">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYear: <select name="year">
<?php
    for ($i=1944; $i<=2013; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>

</select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
 Top: <input type="text" name="name">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYear: <input type="text" name="year">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 <?php
    for ($i=1944; $i<=2013; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
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

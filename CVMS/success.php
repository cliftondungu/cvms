
<!DOCTYPE html>
<html>
<title>Done</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-container w3-auto">

<div class="w3-panel w3-center w3-pale-green w3-display-container" >
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h3><?php echo $_GET["message"]; ?></h3>
 
</div>
<br>

<div class="w3-center">
<a href="admin.php" class="w3-button  w3-padding-large w3-blue-grey ">Back</a>
</div>

</body>
</html>
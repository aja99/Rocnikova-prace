<?php
  session_start();
  $_SESSION["x"] = $_REQUEST['editValue'];

?>
<head>       
<link rel="stylesheet" href="styly.css" type="text/css">
</head>
<body>



<form method="POST" action="updateProducts.php">
  Nová cena <input type="text" name="cena"><br>
   <input type="hidden" name="x" value="<?php echo $_SESSION["x"]; ?>">
	<input type="submit">
   </form>
</body>


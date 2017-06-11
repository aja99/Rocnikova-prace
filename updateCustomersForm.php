<?php
  session_start();
  $_SESSION["x"] = $_REQUEST['editValue'];

?>
<head>       
<link rel="stylesheet" href="styly.css" type="text/css">
</head>
<body>

<form method="POST" action="updateCustomers.php">
  Nový kapitál: <input type="text" name="kapital"><br>
   <input type="hidden" name="x" value="<?php echo $_SESSION["x"]; ?>">
	<input type="submit">
   </form>
</body>


	

<head>
	  <link rel="stylesheet" href="styly.css" type="text/css">
</head>
<body>

<form method="POST" action="insertOrder.php">
<?php
$link = // tady byli super tajné informace ke komunikaci s databází
      
      if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }
        
      $sql = "SELECT * FROM zakaznik";
      if($result = mysqli_query($link, $sql)) {
        if(mysqli_num_rows($result) > 0)  {
            echo "<select name='zakaznik'>";
            while($row = mysqli_fetch_array($result)) {
                echo '<option value="'. $row["ID"] .'">'. $row["jmeno"] . ' ' . $row["prijmeni"] . '</option>';
            }
            echo "</select>";
            
            mysqli_free_result($result);
        } 
      }
      echo "	";
      $sql2 = "SELECT * FROM zbozi";
      if($result = mysqli_query($link, $sql2)) {
        if(mysqli_num_rows($result) > 0)  {
            echo "<select name='zbozi'>";
            while($row = mysqli_fetch_array($result)) {
                echo '<option value="'. $row["ID"] .'">'. $row["nazev"] . ' - ' . $row["cena"] . 'Kč' . '</option>';
            }
            echo "</select>";
            
            mysqli_free_result($result);
        } 
      } 
      mysqli_close($link);  

?>	
<input type="submit">
	
</form>

</body>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styly.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<body>
	<input type="button" class="default" value="Přidej zboží" onclick="window.open('insertProductsForm.php')">
	<form method="POST" action="searchProducts.php">
    Vyhledej zboží <input type="text" name="searchtext">	<input type="submit" value="vyhledej">
	
</form>
<?php
   $link = // tady byli super tajné informace ke komunikaci s databází

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";

    $sql = "SELECT * FROM zbozi";
    
    if($result = mysqli_query($link, $sql)) {
        if(mysqli_num_rows($result) > 0)    {
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Název</th>";
                    echo "<th>cena</th>";
                    echo "<th></th>";
                    echo "<th></th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result))   {
                echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['nazev'] . "</td>";
                    echo "<td>" . $row['cena'] . "</td>";
                    echo '<form action="updateProductsForm.php" target="_blank">';
					            echo '<input type="hidden" name="editValue" value="' . $row['ID'] . '"/>';
						          echo "<td><input type='submit' name='edit' class='butEdit' value='Uprav cenu' /></td>";
				         	  echo "</form>";
                    echo '<form action="deleteProducts.php" target="_blank">';
						          echo '<input type="hidden" name="deleteValue" value="' . $row['ID'] . '"/>';
						          echo "<td><input type='submit' name='edit' class='butEdit' value='Smaž' /></td>";
					          echo "</form>";
                echo "</tr>";
            }
            echo "</table>";
        } 
    }
    mysqli_close($link);
?>
<a href="http://zapletal.clanweb.eu/RocnikovyProjekt/index.php">Zpět </a> 
</body>

</html>
                                                                                           <html>
<head>
  <link rel="stylesheet" type="text/css" href="styly.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<body>
	<input type="button" class="default" value="Přidej zákazníka!" onclick="window.open('insertCustomersForm.php')">
	
<form method="POST" action="search.php">
    Vyhledej zákazníky <input type="text" name="searchtext">	<input type="submit" value="vyhledej" >
	
</form>

<?php
    $link = // tady byli super tajné informace ke komunikaci s databází

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";

    $sql = "SELECT * FROM zakaznik";
    
    if($result = mysqli_query($link, $sql)) {
        if(mysqli_num_rows($result) > 0)    {
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Jméno</th>";
                    echo "<th>Přijmení</th>";
                    echo "<th>Věk</th>";
                    echo "<th>Kapitál</th>";
					echo "<th></th>";
					echo "<th></th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result))   {
                echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['jmeno'] . "</td>";
                    echo "<td>" . $row['prijmeni'] . "</td>";
                    echo "<td>" . $row['vek'] . "</td>";
                    echo "<td>" . $row['kapital'] . "</td>";
					echo '<form action="updateCustomersForm.php" target="_blank">';
						echo '<input type="hidden" name="editValue" value="' . $row['ID'] . '"/>';
						echo "<td><input type='submit' name='edit' class='butEdit' value='Uprav kapitál' /></td>";
					echo "</form>";
          	echo '<form action="deleteCustomers.php" target="_blank">';
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
<html>
<head>
  <link rel="stylesheet" href="styly.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<body>
	<div id="nav">
		<div class="menu">
			<a href="http://zapletal.clanweb.eu/RocnikovyProjekt/" class="home"></a>
			<div class="buttonsOnTop">
			<input type="button" class="customers" value="Zobraz zákazníky" onclick="window.open('selectCustomers.php')">

			<input type="button" class="products" value="Zobraz zboží" onclick="window.open('selectProducts.php')">

			<input type="button" class="default" value="Přidej zakázku"  onclick="window.open('insertOrderForm.php')">
			</div>
		</div>
	</div>
  
<?php
  $link = // tady byli super tajné informace ke komunikaci s databází

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";

    $sql = "SELECT obchod.ID, zakaznik.jmeno AS jmeno,zakaznik.prijmeni AS prijmeni, zbozi.nazev AS zbozi, zbozi.cena AS cena
			FROM obchod
			INNER JOIN zakaznik ON obchod.ID_zakaznik = zakaznik.ID
			INNER JOIN zbozi ON obchod.ID_zbozi = zbozi.ID
			";
  		
    
    if($result = mysqli_query($link, $sql)) {
        if(mysqli_num_rows($result) > 0)    {
            echo "<table>";
                echo "<tr>";
                    echo "<th>Jméno</th>";
			              echo "<th>Přijmení</th>";
                    echo "<th>Zboží</th>";	
			              echo "<th>Zaplaceno</th>";
                    echo "<th></th>";
                    echo "<th></th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result))   {
                echo "<tr>";
                    echo "<td>" . $row['jmeno'] . "</td>";
					          echo "<td>" . $row['prijmeni'] . "</td>";
                	  echo "<td>" . $row['zbozi'] . "</td>";
				          	echo "<td>" . $row['cena'] . "</td>";
                    echo '<form action="deleteOrder.php" target="_blank">';
                      echo '<input type="hidden" name="deleteValue" value="' . $row['ID'] . '"/>';
                      echo "<td><input type='submit' name='delete' class='butDelete' value='Smaž' /></td>";
                    echo "</form>";
                    
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    mysqli_close($link);
?>
<div class="footer">© Created by <a href="mailto:zapletal@scg.cz">Roman Zapletal</a> - 2017</div>
</body>
</html>
<head>
	  <link rel="stylesheet" href="styly.css" type="text/css">
</head>
<body>
	<?php
  $hodnota=$_POST["searchtext"];
  
$link = // tady byli super tajné informace ke komunikaci s databází

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";
    $sql2 = "SELECT * FROM zakaznik WHERE prijmeni LIKE '%$hodnota%'";
    if($result = mysqli_query($link, $sql2)) {
        if(mysqli_num_rows($result) > 0)    {
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Jméno</th>";
                    echo "<th>Přijmení</th>";
                    echo "<th>Věk</th>";
                    echo "<th>Kapitál</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result))   {
                echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['jmeno'] . "</td>";
                    echo "<td>" . $row['prijmeni'] . "</td>";
                    echo "<td>" . $row['vek'] . "</td>";
                    echo "<td>" . $row['kapital'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else echo "bohužel žádné výsledky";
    
}

 mysqli_query($link, $sql2);

    mysqli_close($link);


	?>
	
	<a href="http://zapletal.clanweb.eu/RocnikovyProjekt/index.php">Zpět </a> 

<head>
  <link rel="stylesheet" type="text/css" href="styly.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
</head>
<body>
	<?php
  $hodnota=$_POST["searchtext"];
  
 $link = // tady byli super tajné informace ke komunikaci s databází

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";
    $sql2 = "SELECT * FROM zbozi WHERE nazev LIKE '%$hodnota%'";
    if($result = mysqli_query($link, $sql2)) {
        if(mysqli_num_rows($result) > 0)    {
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>nazev</th>";
                    echo "<th>cena</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result))   {
                echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['nazev'] . "</td>";
                    echo "<td>" . $row['cena'] . "</td>";

                echo "</tr>";
            }
            echo "</table>";
        }
    
}

 mysqli_query($link, $sql2);

    mysqli_close($link);


?>
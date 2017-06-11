<head>
  <link rel="stylesheet" type="text/css" href="styly.css">
</head>

<body>
	<?php

	$ID_Zakaznik = $_POST["zakaznik"];
	$ID_Zbozi = $_POST["zbozi"];

   $link = // tady byli super tajné informace ke komunikaci s databází

  if($link == NULL)
    echo "Spojeni se nepodarilo navazat!";

  $sql =  "SELECT kapital FROM zakaznik WHERE ID = $ID_Zakaznik";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  
  $kapital = $row["kapital"];
  
  $sql =  "SELECT cena FROM zbozi WHERE ID = $ID_Zbozi";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  
  $cena = $row["cena"];
  
  if($cena > $kapital)  {
    echo "Není dostatek kapitálu pro provedení transakce!";
  }
  else  {
    $sql2 = "INSERT INTO obchod (ID_zakaznik,ID_Zbozi) 
           VALUES ('$ID_Zakaznik', '$ID_Zbozi')";
    mysqli_query($link, $sql2);
    
    $sql3 = " UPDATE zakaznik
              SET kapital = $kapital - $cena 
              WHERE ID = $ID_Zakaznik
            ";
    mysqli_query($link, $sql3);
    
    echo "Transakce byla úspěšně provedena!";  
  }
  
  mysqli_close($link);


?>

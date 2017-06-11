  <head>
    <style type="text/css">
        .eq, .zoznam    {
            display: none;
        }
    </style>
</head>

<body>
	<?php

	$nazev= $_POST["nazev"];
	$cena= $_POST["cena"];


   $link = // tady byli super tajné informace ke komunikaci s databází

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";
    $sql2 = "INSERT INTO zbozi (cena,nazev) 
             VALUES ('$cena', '$nazev')";
 mysqli_query($link, $sql2);
echo "úspěšně přidáno";
    mysqli_close($link);


?>
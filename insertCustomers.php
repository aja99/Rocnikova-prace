  <head>
    <style type="text/css">
        .eq, .zoznam    {
            display: none;
        }
    </style>
</head>

<body>
	<?php

	$jmeno= $_POST["jmeno"];
	$prijmeni= $_POST["prijmeni"];
	$vek= $_POST["vek"];
	$kapital= $_POST["kapital"];

   $link = // tady byli super tajné informace ke komunikaci s databází);

    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";
    $sql2 = "INSERT INTO zakaznik (jmeno,prijmeni,vek,kapital) 
             VALUES ('$jmeno', '$prijmeni', $vek, $kapital)";
 mysqli_query($link, $sql2);
echo "úspěšně přidáno";
    mysqli_close($link);


?>
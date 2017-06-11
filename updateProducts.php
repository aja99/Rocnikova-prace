<head>
	  <link rel="stylesheet" href="styly.css" type="text/css">
</head>
<body>

<?php
   $link = // tady byli super tajné informace ke komunikaci s databází
    
    $x = $_POST["x"];
    $cena = $_POST["cena"];     
	
    
    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";

    $sql = "UPDATE zbozi SET cena = $cena WHERE ID = $x";
    if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

   
    mysqli_close($link);
?>
</body>


<head>
	  <link rel="stylesheet" href="styly.css" type="text/css">
</head>
<body>

<?php
    $link = // tady byli super tajné informace ke komunikaci s databází
    
    $x = $_POST["x"];
    $kapital = $_POST["kapital"];     
	
    
    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";

    $sql = "UPDATE zakaznik SET kapital = $kapital WHERE ID = $x";
    if(mysqli_query($link, $sql)){
    echo "kapitál byl změněn";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

   
    mysqli_close($link);
?>
</body>

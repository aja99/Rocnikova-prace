<?php
  session_start();
  $_SESSION["x"] = $_REQUEST['deleteValue'];
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styly.css">
</head>
<body>
<?php

  $link = // tady byli super tajné informace ke komunikaci s databází
    $x = $_SESSION["x"];
    if($link == NULL)
        echo "Spojeni se nepodarilo navazat!";

    $sql = "DELETE FROM obchod WHERE ID= $x";
    
     if(mysqli_query($link, $sql)){
      echo "smazal jsem co tam bylo (pokud tam nic nebylo tak jsem nic nesmazal)";
     }
         
    mysqli_close($link);
?>
</body>
</html>
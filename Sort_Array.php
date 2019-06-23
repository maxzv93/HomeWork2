<?php

include "sortArray.php";

$mySortArray = new sortArray();
$mySortArray->generationArray();
$mySortArray->sortArr();


?>



<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<form>
    <Div>Число элементов:  Минимальное число: Максимальное число:</Div>



    <input type="text" name="usersCount"
        <?php if(!empty($_GET["usersCount"])){ ?>
            value="<?=$_GET["usersCount"] ?>"
        <?php  } ?>
    >

    <input type="text" name="usersNumberMin"
        <?php if(!empty($_GET["usersNumberMin"])){ ?>
            value="<?=$_GET["usersNumberMin"] ?>"
        <?php  } ?>
    >

    <input type="text" name="usersNumberMax"
        <?php if(!empty($_GET["usersNumberMax"])){ ?>
            value="<?=$_GET["usersNumberMax"] ?>"
        <?php  } ?>
    >
    <br>
    <input type="submit">

</form>


</body>

</html>

<?php
session_start();
include "car.php";


$myCar = new car();
echo $_SESSION['EngineState']."   ";
echo $_SESSION['DoorState']."   ";
echo $_SESSION['TransmitState']."   ";
echo $_SESSION['MoveState']."   ";
?>
<br>
<?php
    $myCar->GetMeanings();
    $myCar->ChangeStateOfCar();
    $myCar->ChangeStateOfDoor();
    $myCar->ChangeTRANSMISSION();
    $myCar->ChangeMove();

?>


<html>
<head>
    <title>MyClassCar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<form>


        <select name="userStateOfCar"

            <?php if(!empty($_GET["userStateOfCar"])){ ?>
                value="<?=$_GET["userStateOfCar"];
                ?>"
            <?php  } ?>

        >
            <option value="engine"
                <?php if(!empty($_GET["userStateOfCar"]) and $_GET["userStateOfCar"] == "engine"){ ?>
                    selected
                <?php  } ?>
            >engine</option>
            <option value="stop"
                <?php if(!empty($_GET["userStateOfCar"]) and $_GET["userStateOfCar"] == "stop"){ ?>
                <?php  } ?>
            >stop</option>
            <option value="start"
                <?php if(!empty($_GET["userStateOfCar"]) and $_GET["userStateOfCar"] == "start"){ ?>
                <?php  } ?>
            >start</option>
        </select>

        <select name="userStateOfDoor"

        <?php if(!empty($_GET["userStateOfDoor"])){ ?>
            value="<?=$_GET["userStateOfDoor"] ?>"
        <?php  } ?>

        >
        <option value="door"
            <?php if(!empty($_GET["userStateOfDoor"]) and $_GET["userStateOfDoor"] == "door"){ ?>
                selected
            <?php  } ?>
        >door</option>
        <option value="close"
            <?php if(!empty($_GET["userStateOfDoor"]) and $_GET["userStateOfDoor"] == "close"){ ?>
            <?php  } ?>
        >close</option>
        <option value="open"
            <?php if(!empty($_GET["userStateOfDoor"]) and $_GET["userStateOfDoor"] == "open"){ ?>
            <?php  } ?>
        >open</option>
        </select>


        <select name="userStateTransmit"
        >
            <option value="transmiss"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "transmiss"){ ?>
                    selected
                <?php  } ?>
            >transmiss</option>
            <option value="-1"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "-1"){ ?>
                <?php  } ?>
            >-1</option>
            <option value="0 "
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "0 "){ ?>
                <?php  } ?>
            >0</option>
            <option value="1"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "1"){ ?>
                <?php  } ?>
            >1</option>
            <option value="2"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "2"){ ?>
                <?php  } ?>
            >2</option>
            <option value="3"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "3"){ ?>
                <?php  } ?>
            >3</option>
            <option value="4"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "4"){ ?>
                <?php  } ?>
            >4</option>
            <option value="5"
                <?php if(!empty($_GET["userStateTransmit"]) and $_GET["userStateTransmit"] == "5"){ ?>
                <?php  } ?>
            >5</option>
        </select>

        <select name="userStateOfMove"
        >
            <?php if(!empty($stateOfMove)){ ?>
                value="<?=$stateOfMove ?>"
            <?php  } ?>
            <option value="move"
                <?php if(!empty($_GET["userStateOfMove"]) and $_GET["userStateOfMove"] == "move"){ ?>
                    selected
                <?php  } ?>
            >move</option>
            <option value="break"
                <?php if(!empty($_GET["userStateOfMove"]) and $_GET["userStateOfMove"] == "break"){ ?>
                <?php  } ?>
            >break</option>
            <option value="run"
                <?php if(!empty($_GET["userStateOfMove"]) and $_GET["userStateOfMove"] == "run"){ ?>
                <?php  } ?>
            >run</option>
        </select>
        <br>
        <br>

        <input type="submit" name="act" value="change">

</form>


</body>

</html>
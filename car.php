<?php

class car
{
    private $stateOfCar; //start or stop
    private $stateOfDoor;//open or close
    private $stateTransmit; //-1 0 1 2 3 4 5
    private $stateOfMove; //run or break

    public function __construct($stateOfCar="stop",$stateOfDoor="close",$stateTransmit="0",$stateOfMove="break")
    {
        $this->$stateOfCar          =$stateOfCar;       //состояние автомобиля (заведен заглушен)
        $this->$stateOfDoor         =$stateOfDoor;      //состояние дверей автомобиля (открыта,закрыта)
        $this->$stateTransmit       =$stateTransmit;    //передача автомобиля
        $this->$stateOfMove         =$stateOfMove;      //в движении или стоит
    }

    /**
     * @return mixed
     */
    public function getSetTransmit()
    {
        return $this->stateTransmit;
    }

    /**
     * @param mixed $stateTransmit
     */
    public function setSetTransmit($stateTransmit): void
    {
        $this->stateTransmit = $stateTransmit;
    }

    /**
     * @return mixed
     */
    public function getStateOfCar()
    {
        return $this->stateOfCar;
    }

    /**
     * @param mixed $stateOfCar
     */
    public function setStateOfCar($stateOfCar): void
    {
        $this->stateOfCar = $stateOfCar;
    }

    /**
     * @return mixed
     */
    public function getStateOfDoor()
    {
        return $this->stateOfDoor;
    }

    /**
     * @param mixed $stateOfDoor
     */
    public function setStateOfDoor($stateOfDoor): void
    {
        $this->stateOfDoor = $stateOfDoor;
    }

    /**
     * @return mixed
     */
    public function getStateOfMove()
    {
        return $this->stateOfMove;
    }

    /**
     * @param mixed $stateOfMove
     */
    public function setStateOfMove($stateOfMove): void
    {
        $this->stateOfMove = $stateOfMove;
    }

    /**
     * @return mixed
     */
    public function getStateTransmit()
    {
        return $this->stateTransmit;
    }


    /**
     * @param mixed $stateTransmit
     */
    public function setStateTransmit($stateTransmit): void
    {
        $this->stateTransmit = $stateTransmit;
    }


    public function GetMeanings(): void
    {
        if(!empty($_GET['userStateOfCar']))
            $this->stateOfCar = $_GET['userStateOfCar'];
        if(!empty($_GET['userStateOfDoor']))
            $this->stateOfDoor = $_GET['userStateOfDoor'];
        if(!empty($_GET['userStateTransmit']))
            $this->stateTransmit = $_GET['userStateTransmit'];
        if (!empty($_GET['userStateOfMove']))
            $this->stateOfMove = $_GET['userStateOfMove'];

    }
    public function ChangeStateOfCar(): void        //состояния двигателя
    {

        if($this->stateOfCar == "engine")           //Если ничего не меняется то двигатель остается в предыдущем состоянии
        {
            echo " Engine is " .$_SESSION['EngineState'].";";
        }
        else
        {
            if ($_SESSION['EngineState']== "start" && $this->stateOfCar == "start" )
                echo " Engine is " .$_SESSION['EngineState']. " already;";
            else if($_SESSION['EngineState']== "stop" && $this->stateOfCar == "stop")
                echo " Engine is " .$_SESSION['EngineState']. " already;";
            else if ($this->stateOfCar == "start" )
            {
                if ($this->stateTransmit == "0 " || $this->stateTransmit == "transmiss" && $_SESSION['TransmitState'] == "0 " )
                {
                    echo " Engine is " . $this->stateOfCar . ";";
                    $_SESSION['EngineState'] = $this->stateOfCar;
                }
                else
                {
                    echo " Engine is stop CHECK TRANSMISSION;";
                    $this->stateOfCar ="stop";
                    $_SESSION['EngineState'] = $this->stateOfCar;
                }
            }
            if ($this->stateOfCar == "stop" ) {
                if ($this->stateOfMove == "break"||($this->stateOfMove != "move" && $_SESSION['MoveState']=="break"))
                {
                    echo " Engine is " . $this->stateOfCar . ";";
                    $_SESSION['EngineState'] = $this->stateOfCar;
                }
                else
                    echo " Engine is start CHECK STATE OF Move;";
            }
        }

    }

    public function ChangeStateOfDoor(): void       //состояние дверей автомобиля
    {
        //Если ничего не меняется то дверь остается в предыдущем состоянии
        if ($this->stateOfDoor == "door")
        {
            echo " Door is  " . $_SESSION['DoorState'] . ";";
        }
        else
        {
            if ($this->stateOfMove == "break" || $this->stateOfMove == "move" && $_SESSION['MoveState'] == "break")
            {
                if ($this->stateOfDoor == $_SESSION['DoorState'])
                {
                    echo " Door is  " . $this->stateOfDoor . " already;";
                }
                else
                {
                    echo " Door is " . $this->stateOfDoor . ";";
                }
                $_SESSION['DoorState'] = $this->stateOfDoor;
            }
            else
            {
                echo " Door is close because car is moving;";
            }
        }
    }

    public function ChangeTRANSMISSION(): void
    {
        if($this->stateTransmit == "transmiss") //Если ничего не меняется то коробка остается в предыдущем состоянии
        {
            echo " Transmission is  " . $_SESSION['TransmitState'] . ";";
        }
        else
        {
            echo " Transmission is " . $this->stateTransmit . ";";
            $_SESSION['TransmitState'] = $_GET["userStateTransmit"];
        }


    }
    public function ChangeMove(): void
    {
        if ($this->stateOfMove == "move")
        {
            echo " Car is  " . $_SESSION['MoveState'] . ";";
        }
        else
        {
            if ($this->stateOfMove == "run")
            {
                if (($this->stateOfCar == "start"||($this->stateOfCar == "engine" && $_SESSION['EngineState'] == "start")) &&
                    (( $this->stateTransmit == "1" || $this->stateTransmit == "-1")
                        ||($this->stateTransmit == "transmiss" && ($_SESSION['TransmitState'] == "1" || $_SESSION['TransmitState'] == "-1")))
                    && ($this->stateOfDoor == "close"||($this->stateOfDoor == "door" && $_SESSION['DoorState'] == "close")))
                {
                    echo " Car is " . $this->stateOfMove . ".";
                    $_SESSION['MoveState'] = $this->stateOfMove;
                }
                else
                {
                    echo " Car run isn't possible CHECK ENGINE,TRANSMISSION or DOOR.";
                }
            }
            else
            {
                echo " Car is: " . $this->stateOfMove . ".";
                $_SESSION['MoveState'] = $this->stateOfMove;
            }
        }

    }

}
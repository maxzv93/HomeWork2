<?php


class sortArray
{
private $CountEl;
private $MinEl;
private $MaxEl;
private $RandArray;

    /**
     * @return mixed
     */
    public function getCountEl()
    {
        return $this->CountEl;
    }

    /**
     * @return mixed
     */
    public function getMaxEl()
    {
        return $this->MaxEl;
    }

    /**
     * @return mixed
     */
    public function getMinEl()
    {
        return $this->MinEl;
    }

    /**
     * @param mixed $CountEl
     */
    public function setCountEl($CountEl): void
    {
        $this->CountEl = $CountEl;
    }

    /**
     * @param mixed $MaxEl
     */
    public function setMaxEl($MaxEl): void
    {
        $this->MaxEl = $MaxEl;
    }

    /**
     * @param mixed $MinEl
     */
    public function setMinEl($MinEl): void
    {
        $this->MinEl = $MinEl;
    }

    /**
     * @return mixed
     */
    public function getRandArray()
    {
        return $this->RandArray;
    }

    /**
     * @param mixed $RandArray
     */
    public function setRandArray($RandArray): void
    {
        $this->RandArray = $RandArray;
    }


    public function generationArray()
    {
        if (!empty($_GET['usersCount']))
            $this->CountEl = (int)$_GET['usersCount'];
        else
            $this->CountEl = 0;
        if (!empty($_GET['usersNumberMin']))
            $this->MinEl = (double)$_GET['usersNumberMin'];
        else
            $this->MinEl = 0;
        if (!empty($_GET['usersNumberMax']))
            $this->MaxEl = (double)$_GET['usersNumberMax'];
        else
            $this->MaxEl = 0;

        echo "Случайный массив: ";
        if ($this->CountEl != 0)
        {
            for ($i = 0; $i < $this->CountEl; $i++) {
                $RandArr[$i] = rand($this->MinEl, $this->MaxEl);
                echo $RandArr[$i];
                echo ' ';
            }
            $this->RandArray = $RandArr;

        }
        else
            $RandArr="";
        return $RandArr;

    }

    public function sortArr()
    {
        echo "Отсортированный массив: ";
        for ($k = 0; $k < count($this->RandArray); $k++) {
            for ($i = 0; $i < count($this->RandArray) - $k - 1; $i++) {
                if ($this->RandArray[$i] < $this->RandArray[$i + 1]) {
                    $var = $this->RandArray[$i];
                    $this->RandArray[$i] = $this->RandArray[$i + 1];
                    $this->RandArray[$i + 1] = $var;
                }
            }
        }

        if(!empty($this->RandArray)) {
            foreach ($this->RandArray as $number) {
                echo $number . " ";
            }
        }
    }


}



/**

echo "Введите число";
$n = (int)trim(fgets(STDIN));
$allNumber =array();

while ($n !=0){
$allNumber[] = $n;
echo "Введите число";
$n = (int)trim(fgets(STDIN));
}
$allNumber2=array(423,432,54,65,2,56,4,423,654,42);

echo "\n";
sortToTop($allNumber);
echo "\n";
sortToTop($allNumber2);




function sortToTop($allNumber)
{
    for ($k = 0; $k < count($allNumber); $k++) {
        for ($i = 0; $i < count($allNumber) - $k - 1; $i++) {
            if ($allNumber[$i] > $allNumber[$i + 1]) {
                $var = $allNumber[$i];
                $allNumber[$i] = $allNumber[$i + 1];
                $allNumber[$i + 1] = $var;
            }
        }
    }


    foreach ($allNumber as $number) {
        echo $number . " ";
    }






}
 * */
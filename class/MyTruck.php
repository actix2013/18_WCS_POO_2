<?php
$absolutePath= $_SERVER['DOCUMENT_ROOT'];
require_once $absolutePath."/class/vehicle.php";

class MyTruck extends Vehicle{

    /*
     * @var capacité de stockage
     */
    protected $storageCapacity;
    protected $charge=0;


    public function __construct(string $color, int $nbSeats, string $energy, int $storageCapacity)
    {
        parent::__construct($color, $nbSeats);
        parent::setEnergy($energy);
        $this->setStorageCapacity($storageCapacity);
    }

    /**
     * @return mixed
     */
    public function getStorageCapacity() : int
    {
        return $this->storageCapacity;
    }

    /**
     * @param mixed $storageCapacity
     * @return MyTruck
     */
    public function setStorageCapacity($storageCapacity) : MyTruck
    {
        if($storageCapacity>=0)$this->storageCapacity = $storageCapacity;
        else $this->storageCapacity = 0;
        return $this;
    }

    /**
     * @return int
     */
    public function getCharge(): int
    {
        return $this->charge;
    }

    /**
     * @param int $charge
     * @return MyTruck
     */
    public function setCharge(int $charge): String
    {

        if($charge<=$this->getStorageCapacity()) {
            $this->charge =$this->charge + $charge;
            if($this->charge >$this->getStorageCapacity()){
                $this->charge=$this->getStorageCapacity();
                return " ALERT : Over capacity , Charge Stoped !!!!";
            }
            return "Add ". $charge . " to internal storage "."$this->charge/" . "$this->storageCapacity";
        }


    }

    public function isFull() : string {
        $actualCharge=$this->getCharge();
        $actualStorageCapacity= $this->getStorageCapacity();
        if($actualCharge<$actualStorageCapacity){
            return "in filling";
        }
        return "full";
    }


}
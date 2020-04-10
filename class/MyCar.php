<?php
$absolutePath= $_SERVER['DOCUMENT_ROOT'];
require_once $absolutePath."/class/vehicle.php";

class MyCar extends Vehicle
{
    public function __construct(string $color, int $nbSeats, string $energy)
    {
        parent::__construct($color, $nbSeats);
        parent::setEnergy($energy);
    }




}
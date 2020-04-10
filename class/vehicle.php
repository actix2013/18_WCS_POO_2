<?php

//vehicle.php

class Vehicle {



    protected $nbWheels = 4;
    protected $currentSpeed = -1;
    protected $color = "";
    protected $nbSeats = 0;
    protected $energy = "";
    protected $energyLevel = 0;

    const ALLOWED_ENERGIES = [
        'fuel',
        'Electric',
        'oil',
        'bananas'
    ];

    public function __construct(string $color, int $nbSeats)
    {
        $this->nbSeats = $nbSeats;
        $this->color = $color;
    }


    /**
     * @return string return the status off car if car is starting , else msg to  start vehicle
     */
    public function forward(): string
    {

        $speed = rand(25, 75);
        $this->start();
        $this->currentSpeed = $speed;

        return "Go at " . $speed . " !!!";
    }


    /**
     * @param int $brakeLevel niveau  de freinage , force d'apuis sur la pedale
     * @return string
     */
    public function brake(int $brakeLevel): string
    {
        $sentence = "";
        if ($brakeLevel <= 0) $brakeLevel = 1;
        while ($this->currentSpeed > 0) {
            $this->currentSpeed -= $brakeLevel;
            if ($this->currentSpeed < 0) $this->currentSpeed = 0;
            $sentence .= "Brake !!!";
        }
        $sentence .= "I'm stopped !";
        return $sentence;
    }



    /**
     * @return bool true if current speed is 0 , by default current speed is created with -1 = stopped
     */
    public function start(): bool
    {
        $this->currentSpeed = 0;
        return true;
    }


    // getters and seters
    /**
     * @return int Wheels number
     */
    public function getNbWheels(): int
    {
        return $this->nbWheels;
    }

    /**
     * @return int
     */
    public function getCurrentSpeed(): int
    {
        return $this->currentSpeed;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return int
     */
    public function getNbSeats(): int
    {
        return $this->nbSeats;
    }

    /**
     * @return string
     */
    public function getEnergy(): string
    {
        return $this->energy;
    }

    /**
     * @return int
     */
    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    /**
     * @param int $nbWheels
     */
    public function setNbWheels(int $nbWheels): void
    {
        $this->nbWheels = $nbWheels;
    }

    /**
     * @param int $currentSpeed
     */
    public function setCurrentSpeed(int $currentSpeed): void
    {
        $this->currentSpeed = $currentSpeed;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @param int $nbSeats
     */
    public function setNbSeats(int $nbSeats): void
    {
        $this->nbSeats = $nbSeats;
    }

    /**
     * @param int $energyLevel
     */
    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }


    public function setEnergy(string $energy) : Vehicle
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }else{
            $this->energy = "Unauthorised energy : ".$energy;

        }

        return $this;
    }




}
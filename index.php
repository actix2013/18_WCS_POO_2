<?php


require "class/Bicycle.php";
require "class/MyCar.php";
require "class/MyTruck.php";

// choisir le nombre d'objets a instancié
$nbBicycle = rand(1,1);
$nbCar = rand(1,2);
$nbTruck = rand(2,5);

// Valeur utilisées a la creation des objet en combinaison avc rand
$colors=['blue','red','orange','green','navyblue'];
$energys=["Electric","Oil",'Tomatos','Bananas','Bug'];

// creation des truck avec couleur du texte en fontion de $couleur et taille texte en fontion de $capacity :-)
// le chargement continue tant que le coamion n'est pas full
for($i=0;$i<$nbTruck;$i++){
    $color=$colors[rand(0,4)];
    $energy=$energys[rand(0,4)];
    $capacity=(int)rand(20,50);
    $places=(int)rand(2,2);
    $oneTruck=new MyTruck($color,$places,$energy,$capacity);
    $fontSize=1*$capacity . "px";
    $iStyle="<i style=color:$color;" . "font-weight:bold;" . "font-size:$fontSize;>" ;
    echo "<br>------- Working on Truck number ".$i." ----------<br>";
    echo "Truck capacity -->" . $iStyle . $oneTruck-> getStorageCapacity() ."</i><br>";
    $control="";
    while($control!=="full"){
        echo "Add charge -->" . $iStyle . $oneTruck-> setCharge(rand(5,15)) ."</i><br>";
        $control=$oneTruck->isFull();
    }
    echo "Truck color -->" . $iStyle .$oneTruck->getColor() ."</i><br>";
    echo "Truck energy -->" . $iStyle . $oneTruck->getEnergy() ."</i><br>";
    echo "Go forward : " . $iStyle .$oneTruck->forward()."</i><br>";
    echo "Get vitesse :" . $iStyle .$oneTruck->getCurrentSpeed()."</i><br>";
    echo "Stop :" . $iStyle .$oneTruck->brake(rand(2,10))."</i><br>";
    //var_dump($unBicylcle);
    echo "<br>";
}



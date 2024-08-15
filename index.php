<?php
class People {
    var $firstName;
    var $lastName;

    function __construct($firstName, $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }
}
$people1 = new People('Cesar', 'Bravo');
$people2 = new People('Jose', 'Perez');
//

echo "{$people1->fullName()} es amigo de {$people2->fullName()}";

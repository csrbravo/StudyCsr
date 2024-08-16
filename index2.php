<?php

class People {
    protected $firstName;
    protected $lastName;
    protected $nickname;
    protected $changedNickname = 0;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setNickname($nickname)
    {
        if ($this->changedNickname >= 2) {
            throw new Exception(
                "No puedes cambiar el nickname más de 2 veces"
            );
        }

        $this->nickname = $nickname;
        $this->changedNickname++;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

try {
    $person1 = new People('Cesar', 'Bravo');
    $person1->setNickname('csr');
    $person1->setNickname('csrbravo');
    $person1->setNickname('csrbravovasquez'); // al comentar esta linea tncs no entra en la excepcion
    echo $person1->getNickname();
    echo $person1->getFullName();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
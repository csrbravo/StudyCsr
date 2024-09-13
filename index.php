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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>People</title>
</head>
<body>
<p><?php echo "{$people1->fullName()} es amigo de {$people2->fullName()}"; ?></p>
<button onclick="window.location.href='index2.php'">Clase 2</button>
<button onclick="window.location.href='herencia.php'">Clase 3</button>
<button onclick="window.location.href='magic.php'">Clase 15</button>
</body>
</html>
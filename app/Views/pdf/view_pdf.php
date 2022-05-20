<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf de la comanda</title>
</head>

<body>
    <h1>Comanda</h1>
    <?php for ($i = 0; $i < count($comanda); $i++) { ?>
        <ul>
            <li> Id del plat: <?= $comanda[$i]["id_plat"] ?></li>
            <li> Estat plat: <?= $comanda[$i]["estat_plat"] ?></li>
            <li> Hora demanat: <?= $comanda[$i]["hora_demanat"] ?></li>
        </ul>
    <?php } ?>

</body>

</html>
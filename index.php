<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

//$player1 = new Warrior('Bernard');
$player1 = new Magician('Oz');
$player2 = new Archer('Degolas');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./public/js/js_fight.js" charset="utf-8" defer></script>
    <link rel="stylesheet" href="./public/style/css_home.css">
    <title>Baston</title>
</head>
<body>
    <?php while ($player1->isAlive() && $player2->isAlive()): ?>
        <div class="round">
            <p><?= $player1->turn($player2) ?></p>
            <?php $result = "$player1->name a gagné !" ?>
            <?php if ($player2->isAlive()): ?>
                <p><?= $player2->turn($player1) ?></p>
                <?php $result = "$player2->name a gagné !" ?>
            <?php endif ?>
        </div>
    <?php endwhile ?>
    <p class="round"><?= $result ?></p>

</body>
</html>

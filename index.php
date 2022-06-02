<html>

<head>
    <title>JnjSite.com: Usando Prolog desde PHP</title>
</head>

<body>
    <h1>Usando Prolog desde PHP</h1>
    <?php
    $defaultMain = 'persona(maria).' . PHP_EOL
        . 'persona(pepe).' . PHP_EOL
        . PHP_EOL
        . 'edad(pepe, 22).' . PHP_EOL
        . 'edad(maria, 23).' . PHP_EOL
        . PHP_EOL
        . "escribeEdades([]) :- write('No hay mas información sobre edades.'), nl." . PHP_EOL
        . 'escribeEdades([Primera|Personas]) :-' . PHP_EOL
        . " edad(Primera, X), write(Primera), write(' tiene de edad '), write(X), nl, escribeEdades(Personas)." . PHP_EOL
        . '' . PHP_EOL
        . 'main :-' . PHP_EOL
        . " write('¡Hola Mundo!'), nl," . PHP_EOL
        . ' findall(X, persona(X), Personas),' . PHP_EOL
        . ' escribeEdades(Personas).' . PHP_EOL;

    //$indice = $_POST['cambio'];
    if (isset($_POST['cambio'])) {
        $indice = $_POST['cambio'];
    }else{
        $indice = 'index.pl';
    }
    // If intializing..
    if (!file_exists($indice)) {
        file_put_contents($indice, $defaultMain);
    }

    // If updating..
    if (isset($_POST['program'])) {
        file_put_contents($indice, $_POST['program']);
    }

    if (isset($_POST['query'])) {
        // If executing query..
        $query = $_POST['query'];
    } else {
        // If executing main..
        $query = "main.";
    }
    $lastLine = exec('swipl -s ' . $indice . ' -g "' . $query . '" -t halt.', $output, $returnValue);

    ?>

    <h2>Resultado de consultar ?- <?= $query ?></h2>
    <div style="border: 1px dashed black; width: 90%; padding-left: 12px; padding-right: 12px;">
        <pre><?php
                foreach ($output as $line) {
                    echo $line . '<br>';
                }
                ?></pre>
        <?php //var_dump($output) 
        ?>
        <p>Valor de retorno: <?= $returnValue ?> <?php
                                                    if ($returnValue == 0) echo 'true';
                                                    elseif ($returnValue == 1) echo 'false';
                                                    elseif ($returnValue == 2) echo 'error';
                                                    ?> - Última línea: <?= $lastLine ?></p>
    </div>

    <h2>Hacer consulta simple</h2>
    <form method="post">
        <input type="hidden" name="cambio" value="<?php echo htmlspecialchars($indice); ?>" readonly>
        ?- <input type="text" style="width: 75%;" name="query">
        <input type="submit" value="Consultar"><br>
    </form>

    <h2>Programa completo</h2>
    <form method="post">
        <input type="hidden" name="cambio" value="<?php echo htmlspecialchars($indice);?>" readonly>
        <textarea style="min-height: 200px; width: 100%;" name="program" readonly><?= file_get_contents($indice); ?></textarea>
        <input type="submit" value="Actualizar">
    </form>
    <form method="post">
        <input type="hidden" name="cambio" value="index.pl" readonly>
        <input type="hidden" style="width: 75%;" name="query" value="vacunados(_)." readonly>
        <input type="submit" value="Ejemplo 1">
    </form>
    <form method="post">
        <input type="hidden" name="cambio" value="index1.pl" readonly>
        <input type="hidden" style="width: 75%;" name="query" value="docentes_academia(sistemas)." readonly>
        <input type="submit" value="Ejemplo 2">
    </form>


</body>

</html>
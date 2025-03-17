<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat del Formulari</title>
</head>
<body>
    <div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (!empty($_POST['nom']) && !empty($_POST['cognom'])) {
                    $nom = htmlspecialchars(trim($_POST['nom']));
                    $cognom = htmlspecialchars(trim($_POST['cognom']));
                    echo "<h2>Hola, $nom $cognom!</h2>";
                } else {
                    $errors[] = "Si us plau, introdueix el teu nom i cognom.";
                }

                if (!empty($_POST['edad']) && is_numeric($_POST['edad']) && $_POST['edad'] > 0) {
                    $edad = intval($_POST['edad']);
                    echo "<h2>La teva edat és: $edad anys</h2>";
                } else {
                    $errors[] = "Si us plau, introdueix una edat vàlida.";
                }

                if (!empty($_POST['genero'])) {
                    $genero = htmlspecialchars(trim($_POST['genero']));
                    echo "<h2>Ets de gènere: $genero</h2>";
                } else {
                    $errors[] = "Si us plau, selecciona el teu gènere.";
                }

                if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $email = htmlspecialchars(trim($_POST['email']));
                    echo "<h2>El teu correu electrònic és: $email</h2>";
                } else {
                    $errors[] = "Si us plau, introdueix un correu electrònic vàlid.";
                }

                if (!empty($_POST['ciutat'])) {
                    $ciutat = htmlspecialchars(trim($_POST['ciutat']));
                    echo "<h2>Vius a: $ciutat</h2>";
                } else {
                    $errors[] = "Si us plau, introdueix la teva ciutat.";
                }

                if (!empty($_POST['aficions']) && is_array($_POST['aficions'])) {
                    $aficions = array_map('htmlspecialchars', $_POST['aficions']);
                    echo "<h2>Les teves aficions són: " . implode(", ", $aficions) . "</h2>";
                } else {
                    $errors[] = "Si us plau, selecciona almenys una afició.";
                }

                if (!empty($_POST['motivacio'])) {
                    $motivacio = htmlspecialchars(trim($_POST['motivacio']));
                    echo "<h2>Les teves motivacions: $motivacio</h2>";
                } else {
                    $errors[] = "Si us plau, introdueix les teves motivacions personals.";
                }

                if (!empty($errors)) {
                    echo "<h3>Errors trobats:</h3><ul>";
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul>";
                }
            } else {
                echo "<h2>Accés no vàlid.</h2>";
            }
        ?>
    </div>
</body>
</html>

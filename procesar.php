<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['correo'], $_POST['mensaje'])) {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));
    $exito = true;
} else {
    $exito = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje recibido</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .result-container {
            background: white;
            max-width: 520px;
            width: 100%;
            padding: 2rem;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        h2 {
            font-size: 1.6rem;
            font-weight: normal;
            color: #333;
            margin: 0 0 0.2rem 0;
        }
        .subtitle {
            color: #666;
            font-size: 0.95rem;
            margin-top: 0;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 0.8rem;
        }
        .data-item {
            margin-bottom: 1rem;
        }
        .data-item .label {
            font-weight: bold;
            font-size: 0.8rem;
            color: #777;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .data-item .value {
            font-size: 1.1rem;
            color: #222;
            background: #f9f9f9;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
            border-left: 3px solid #0066cc;
            word-break: break-word;
            margin-top: 2px;
        }
        .btn-back {
            display: inline-block;
            margin-top: 1.2rem;
            padding: 0.5rem 1.5rem;
            background: #0066cc;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn-back:hover {
            background: #0055aa;
        }
        .error-msg {
            color: #a00;
            background: #fdd;
            padding: 0.8rem;
            border-radius: 4px;
            border-left: 3px solid #a00;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <?php if ($exito): ?>
            <h2>Mensaje recibido</h2>
            <p class="subtitle">Gracias, <?php echo $nombre; ?>. Hemos recibido su mensaje.</p>

            <div class="data-item">
                <div class="label">Nombre</div>
                <div class="value"><?php echo $nombre; ?></div>
            </div>
            <div class="data-item">
                <div class="label">Correo</div>
                <div class="value"><?php echo $correo; ?></div>
            </div>
            <div class="data-item">
                <div class="label">Mensaje</div>
                <div class="value"><?php echo nl2br($mensaje); ?></div>
            </div>

            <a href="index.html" class="btn-back">Volver al formulario</a>
        <?php else: ?>
            <h2>Error</h2>
            <p class="subtitle">No se recibieron todos los datos.</p>
            <div class="error-msg">
                Por favor, complete todos los campos.
            </div>
            <a href="index.html" class="btn-back">Volver al formulario</a>
        <?php endif; ?>
    </div>
</body>
</html>
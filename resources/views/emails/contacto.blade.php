<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #0000BB;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }
        .content {
            padding: 30px;
        }
        .field {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            color: #0000BB;
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-size: 12px;
        }
        .value {
            font-size: 16px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            border-left: 4px solid #0000BB;
        }
        .footer {
            background-color: #f4f4f4;
            color: #777;
            padding: 15px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nuevo Mensaje desde la Web</h1>
        </div>

        <div class="content">
            <div class="field">
                <span class="label">Nombre del Cliente:</span>
                <div class="value">{{ $datos['nombre'] }}</div>
            </div>

            <div class="field">
                <span class="label">Correo Electrónico:</span>
                <div class="value">{{ $datos['email'] }}</div>
            </div>

            <div class="field">
                <span class="label">Asunto:</span>
                <div class="value">{{ $datos['asunto'] }}</div>
            </div>

            <div class="field">
                <span class="label">Mensaje:</span>
                <div class="value" style="white-space: pre-wrap;">{{ $datos['mensaje'] }}</div>
            </div>

            @if(isset($datos['imagen']) && $datos['imagen'])
                <div class="field">
                    <span class="label">Archivo Adjunto:</span>
                    <div class="value italic">El cliente ha adjuntado una imagen a este correo.</div>
                </div>
            @endif
        </div>

        <div class="footer">
            Este correo ha sido generado automáticamente por el formulario de contacto de <strong>HECOMA.com</strong>.<br>
            © {{ date('Y') }} Herramientas de Corte para Madera.
        </div>
    </div>
</body>
</html>
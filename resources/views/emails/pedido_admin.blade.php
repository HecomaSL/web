<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .status { background: #fff3cd; color: #856404; padding: 5px 10px; border-radius: 4px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="color: #333;">🔔 Nuevo Pedido Recibido</h2>
        <p>Se ha registrado un nuevo pedido en la web.</p>
        <p><strong>Cliente:</strong> {{ $pedido['nombre'] }}</p>
        <p><strong>Total:</strong> {{ number_format($pedido['total'], 2) }}€</p>
        <p><strong>Estado:</strong> <span class="status">Esperando Transferencia</span></p>
    </div>
</body>
</html>
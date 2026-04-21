<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background-color: #010cf7; color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .total { font-size: 20px; font-weight: bold; color: #010cf7; }
        .footer { font-size: 12px; color: #777; text-align: center; margin-top: 20px; }
        .button { background-color: #010cf7; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>HECOMA</h1>
        </div>
        <div class="content">
            <h2>¡Gracias por tu pedido, {{ $pedido['nombre'] }}!</h2>
            <p>Hemos recibido tu solicitud correctamente. Tu pedido <strong>#{{ $pedido['id'] }}</strong> está esperando el pago.</p>
            <hr>
            <p><strong>Total a pagar:</strong> <span class="total">{{ number_format($pedido['total'], 2) }}€</span></p>
            <p>Para finalizar, realiza una transferencia al IBAN indicado en la web indicando tu nombre.</p>
            <a href="{{ url('/mis-pedidos') }}" class="button" style="color: white;">Ver mi pedido</a>
        </div>
        <div class="footer">
            © {{ date('Y') }} HECOMA S.L. - Suministros Industriales
        </div>
    </div>
</body>
</html>
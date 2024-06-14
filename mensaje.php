<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 40px;
        }

        .container {
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #111111;
            font-size: 27px;
        }

        h2 {
            color: #333333;
            font-size: 18px;
        }

        p {
            color: #555555;
            line-height: 1.6;
            text-align: center;
            font-size: 16px;
        }
        span {
            font-weight:bold;
        }
        .footer h3 {
            color: #555555;
            text-align: center;
            font-size: 16px;
            margin-bottom: 5px;
        }

        a {
            margin-left: 140px;
            text-decoration: none;
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 10px;
            padding-bottom: 10px;
            background: #1a73e8;
            border-radius: 5px;
        }

        .footer {
            margin-top: 5px;
            text-align: center;
            color: #888888;
            font-size: 12px;
        }
        .text-white{
            color:#ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recupera el acceso a tu cuenta</h1>
        <h2>Para continuar con el proceso, por favor haz clic en el siguiente enlace: </h2>
        <br>
        <a class="text-white" href="' . BASE_URL_BACK . 'solicitar/nuevo_password/' . $token . '">Click aqui para restablecer contraseña</a>
        <br>
        <br>
        <p><span>Aviso: </span>Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje.</p>
        <div class="footer">
            <h3>¡Gracias por confiar en Nosotros!</h3>
            &copy; ' . date("Y") . ' RecargaYa - Colombia.
        </div>
    </div>
</body>
</html>
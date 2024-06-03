
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Solicitação de Certidão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #faefb0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #ffd732;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            color: #064ea8;
            margin: 0;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        .footer {
            background-color: #ffd732;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmação de Solicitação de Certidão</h1>
        </div>
        <div class="content">
        <h1>{{ $details['title'] }}</h1>
        <p>{{ $details['body'] }}</p>
            <p>Olá,</p>
            <p>Sua solicitação de certidão foi recebida e está sendo processada. Entraremos em contato em breve com mais informações.</p>
            <p>Se precisar de mais alguma informação, não hesite em nos contatar.</p>
            <p>Atenciosamente,<br>Equipe de Certidões</p>
        </div>
        <div class="footer">
            <p>Não responda a este e-mail. Este é um e-mail automatizado.</p>
        </div>
    </div>
</body>
</html>

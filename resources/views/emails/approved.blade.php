<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            background-color: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .timeline {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .timeline-item {
            position: relative;
            width: 100%;
            margin: 10px 0;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            background-color: #ccc;
            top: 50%;
            left: 0;
            z-index: -1;
        }

        .timeline-item:last-child::after {
            content: none;
        }

        .timeline-content {
            background-color: white;
            padding: 20px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            z-index: 1;
        }

        .timeline-content h2 {
            margin: 0 0 10px;
            font-size: 16px;
        }

        .timeline-content p {
            margin: 0;
            font-size: 14px;
        }

        .timeline-item.confirmed .timeline-content {
            background-color: #4CAF50;
            color: white;
        }

        .timeline-item.confirmed::after {
            background-color: #4CAF50;
        }

        .timeline-item.current .timeline-content {
            background-color: #FFEB3B;
            color: black;
        }

        .timeline-item.current::after {
            background-color: #FFEB3B;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
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
            <p>{{ $details['body'] }}</p>
            <p>Olá {{ $details['nome']}},</p>
            <p>Sua solicitação de certidão foi recebida e está sendo processada. Entraremos em contato em breve com mais informações.</p>
           <h3>Processo de solicitação de certidão</h3>
            <div class="timeline">
                <div class="timeline-item confirmed">
                    <div class="timeline-content">
                        <h2>Solicitação</h2>
                        <p>Você fez a solicitação pelo nosso site</p>
                    </div>
                </div>
                <div class="timeline-item confirmed">
                    <div class="timeline-content">
                        <h2>Análise</h2>
                        <p>O secretário paroquial está analisando.</p>
                    </div>
                </div>
                <div class="timeline-item confirmed">
                    <div class="timeline-content">
                        <h2>Pagamento</h2>
                        <p>Secretário enviará um link para pagamento</p>
                    </div>
                </div>
                <div class="timeline-item confirmed">
                    <div class="timeline-content">
                        <h2>Aprovado</h2>
                        <p>O pagamento foi recebido</p>
                    </div>
                </div>
                <div class="timeline-item confirmed">
                    <div class="timeline-content">
                        <h2>Entregue</h2>
                        <p>A solicitação foi entregue.</p>
                    </div>
                </div>
            </div>
            <p>Se precisar de mais alguma informação, não hesite em nos contatar.</p>

            <p>Atenciosamente,<br>Equipe de Certidões</p>
        </div>
        <div class="footer">
            <p>Não responda a este e-mail. Este é um e-mail automatizado.</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #f4f4f4;
            color: #FFDD00;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background: #f4f4f4;
            padding: 10px;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }
        .footer a {
            color: #005F8F;
            text-decoration: none;
        }
        .footer-img {
            width: 45px; /* Adjust the width of the logo */
            height: auto; /* Keeps the aspect ratio of the logo */
            vertical-align: middle; /* Aligns the logo with the text */
            margin-right: 5px; /* Adds space between the logo and the text */
            margin-bottom: 2px;
        }
        .header-img {
            width: 100px;
            height: auto; /* Adjust the width of the logo */
        }
        .libelle {
        color: #005F8F;
        font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><div>Kitly</div></h1>
        </div>
        <div class="content">
            <p><strong>Bonjour {{ ucwords(session('client')->nom) }},</strong></p>
            <p>Merci beaucoup pour votre inscription à notre service ! Nous sommes ravis de vous compter parmi nous.</p>
            <p>Pour vous aider à commencer, voici quelques liens utiles :</p>
            <ul>
                <li><a href="/about">À propos</a></li>
                <li><a href="/shop">Nos Produits</a></li>
                <li><a href="/contact">Support client</a></li>
            </ul>
            <p>Nous avons hâte de vous offrir une expérience exceptionnelle.</p>
            <p>À bientôt !</p>
            <p>L'équipe <span class="libelle">{{ config('app.name') }}</span></p>
        </div>
        <div class="footer">
            <p>Si vous avez des questions ou avez besoin d'aide, n'hésitez pas à <a href="mailto:contact@{{ config('app.name') }}.com">nous contacter</a>.</p>
            <p>© 2026 <a href="/index"><a href="#" target="_blank">Kitly</a></p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novos Filmes</title>

    <!-- Fonte Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body style="margin:0; padding:0; background-color:#0f0f0f; font-family:'Inter', Arial, sans-serif; color:#ffffff;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0f0f0f; padding: 40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#181818; border-radius:12px; padding:30px; box-shadow:0 10px 30px rgba(0,0,0,0.5);">

                    <!-- Header -->
                    <tr>
                        <td style="padding-bottom:20px;">
                            <h2 style="margin:0; font-size:24px; font-weight:600;">
                                Olá, {{ $user->name }} 👋
                            </h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-bottom:20px;">
                            <p style="margin:0; font-size:16px; color:#b3b3b3;">
                                Confira os últimos filmes lançados na plataforma:
                            </p>
                        </td>
                    </tr>

                    <!-- Lista de Filmes -->
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0">

                                @foreach ($films as $film)
                                    <tr>
                                        <td style="
                                            background-color:#202020;
                                            padding:15px;
                                            border-radius:8px;
                                            margin-bottom:10px;
                                            display:block;
                                        ">
                                            <strong style="font-size:16px;">
                                                🎬 {{ $film->title }}
                                            </strong>
                                            <br>
                                            <span style="font-size:13px; color:#888;">
                                                Lançado em {{ $film->created_at->format('d/m/Y') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-bottom:20px;">
                            <p style="margin:0; font-size:16px; color:#b3b3b3;">
                                Confira as últimas séries lançadas na plataforma:
                            </p>
                        </td>
                    </tr>

                    <!-- Lista de Séries -->
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0">

                                @foreach ($series as $serie)
                                    <tr>
                                        <td style="
                                            background-color:#202020;
                                            padding:15px;
                                            border-radius:8px;
                                            margin-bottom:10px;
                                            display:block;
                                        ">
                                            <strong style="font-size:16px;">
                                                🎬 {{ $serie->title }}
                                            </strong>
                                            <br>
                                            <span style="font-size:13px; color:#888;">
                                                Lançado em {{ $serie->created_at->format('d/m/Y') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding-top:30px; text-align:center;">

                            <p style="font-size:12px; color:#666; margin-bottom:20px;">
                                Você está recebendo este email porque está cadastrado na plataforma.
                            </p>

                            <a href="{{ url('#') }}" style="
                                display:inline-block;
                                padding:14px 28px;
                                font-family:'Inter', Arial, sans-serif;
                                font-size:14px;
                                font-weight:600;
                                color:#000000;
                                text-decoration:none;
                                background-color:#fff;
                                border-radius:8px;
                            ">
                                Acessar catálogo
                            </a>
           
                        </td>
                    </tr>

               

                </table>

                

            </td>
        </tr>
    </table>

</body>
</html>
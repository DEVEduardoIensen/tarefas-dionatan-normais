<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Escolar')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f9;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        header {
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9em;
            color: #718096;
            border-top: 1px solid #e2e8f0;
            padding-top: 15px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3182ce;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .btn:hover {
            background-color: #2b6cb0;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #edf2f7;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('title', 'Sistema de Gestão de Alunos')</h1>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} - Sistema Escolar. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>

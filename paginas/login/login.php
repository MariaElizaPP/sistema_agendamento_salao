<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rubia Hair</title>
    <link rel="stylesheet" href="/sistema_agendamento/css/login.css">
</head>
<body>
    <div class="container">
        <!-- Lado esquerdo decorativo -->
        <div class="left-side"></div>

        <!-- Lado direito: formulário -->
        <div class="right-side">
            <div class="tela-login">
                <img src="/sistema_agendamento/icone_imagens/Login/logo.svg" alt="Logo Rúbia Hair" class="logo">
                <p class="descricao">Insira seus dados para continuar</p>

                <form action="/sistema_agendamento/controller/loginController.php" method="POST">
                    <label for="usuario">E-mail</label>
                    <input type="text" placeholder="seuemail@gmail.com" id="usuario" name="usuario" required>
                    <div class="password-field">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                        <img src="/sistema_agendamento/icone_imagens/Login/Olho-fechado.svg" alt="Mostrar senha" class="toggle-password">
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" id="manter">
                        <label for="manter">Manter-me conectado</label>
                    </div>

                    <?php
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        if (isset($_SESSION['error_message'])) {
                            echo '<div class="erro">' . $_SESSION['error_message'] . '</div>';
                            unset($_SESSION['error_message']);
                        }
                    ?>
                    
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/sistema_agendamento/js/login.js"></script>
    
</body>
</html>

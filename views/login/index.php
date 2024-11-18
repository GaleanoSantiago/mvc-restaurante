<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location:./../../views/dashboard/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Estilos Propios -->
    <link rel="stylesheet" href="./../../assets/css/style.css">
</head>
<body id="login-body">
    
    <section class="section-cont-login">
        <div class="container cont-login">
            <!-- alert de error -->
            <?php if(isset($_GET["msg"])=="error"): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Usuario o contraseña incorrecto.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php else: ?>
                <div class=""></div>
            <?php endif; ?>
            <div class="login">
                <div class="mb-3 login-user-img">
                    <svg viewBox="0 0 24 24" fill="none" 
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" 
                    stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.192"> 
                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" 
                    fill="#f6f8fc"></path> 
                    <path d="M12.0002 14.5C6.99016 14.5 2.91016 17.86 2.91016 22C2.91016 22.28 3.13016 22.5 3.41016 22.5H20.5902C20.8702 22.5 21.0902 22.28 21.0902 22C21.0902 17.86 17.0102 14.5 12.0002 14.5Z" 
                    fill="#f6f8fc"></path> </g><g id="SVGRepo_iconCarrier"> 
                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" 
                    fill="#f6f8fc"></path> 
                    <path d="M12.0002 14.5C6.99016 14.5 2.91016 17.86 2.91016 22C2.91016 22.28 3.13016 22.5 3.41016 22.5H20.5902C20.8702 22.5 21.0902 22.28 21.0902 22C21.0902 17.86 17.0102 14.5 12.0002 14.5Z" 
                    fill="#f6f8fc"></path> </g></svg>
                    </div>
                <form action="./functions.php" method="POST" autocomplete="off" id="formLogin">
                    <input type="hidden" name="login">
                    <div class="mb-3">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" name="username" id="usuario" class="form-control" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contraseña</label>
                        <div class="form-pass-div d-flex gap-1">
                        <input type="password" name="password" id="password" class="form-control" value="" required>
                        <button type="button" id="btnMostrar">
                        <span class="" >
                            <!-- Boton con ojo -->
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> 
                        <path 
                        d="M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5" 
                        stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                        </svg>
                        </span>
                        </button>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-success">Iniciar Sesión</button>
                    </div>
                </form>
                
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- JS Propios -->
    <script src="./../../assets/js/forms.js"></script>
</body>
</html>

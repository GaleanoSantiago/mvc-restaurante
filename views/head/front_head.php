<?php 
    session_start();
    ?>
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Restaurante Pergolinni</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link" id="item-inicio" href="./../frontend/index.php">Inicio</a>
                            </li>
                            
                            <?php if(!empty($_SESSION['id_rol'])): ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> <?=$_SESSION['nombre']?>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-light" href="./../dashboard/index.php">Dashboard</a></li>
                                    <li>
                                    <div class="logout-container">
                                        <form action="./../login/functions.php" class="w-100" method="post">
                                            <input type="hidden" name="logout">
                                            <input type="hidden" name="front">
                                            <button type="submit" class="dropdown-item text-light w-100">Cerrar Sesión</button>
                                        </form>
                                    </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            
                            </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-success" href="../login/index.php">Iniciar Sesión</a>

                                </li>
                            
                            <?php endif; ?>
                            
                        </ul>

                    </div>
                    
                </div>
            </nav>
        </header>
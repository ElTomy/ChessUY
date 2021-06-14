<header>
    <div class="header-logo">
        <a href="/ChessUY/index">
            <img src="/ChessUY/media/svg/Logo/CyberHydra.svg" alt="">
        </a>        
    </div>
    <div class="nav-links">
        
            <?php
                session_start();
                
                if(isset($_SESSION['usuario'])){
                    echo "  <div class='header-session'>
                                <a class='profile' href='/ChessUY/Profile/Profile.php'>
                                    <div class='session-image'><i class='fas fa-user'></i></div>
                                    <div class='header-user'>
                                        <p>" . $_SESSION['usuario'] . "</p>";
                                    if($_SESSION['tipo'] == 0){
                                        $tipo = "<i class='fas fa-star'></i> Administrador";
                                    }else if($_SESSION['tipo'] == 1){
                                        $tipo = "<i class='fas fa-chess-knight'></i> Jugador";
                                    }else if($_SESSION['tipo'] == 2){
                                        $tipo = "<i class='fas fa-ruler-horizontal'></i> Árbitro";
                                    }else if($_SESSION['tipo'] == 3){
                                        $tipo = "<i class='fas fa-microphone'></i> Periodista";
                                    }
                                    echo "<p class='tipo-profile'>$tipo</p>
                                    </div>
                                </a>
                                <a class='cerrarsesion' onclick='cerrarSesion()'><i class='fas fa-door-open'></i> CERRAR SESIÓN</a>
                            </div>";
                }else{
                    echo "<div class='loginregister'>
                            <a class='login-button' href='/ChessUY/Form/Login'><i class='fas fa-sign-in-alt'></i> LOGIN</a>
                            <a class='register-button' href='/ChessUY/Form/Register-User'><i class='fas fa-user-plus'></i> REGISTER</a>
                          </div>";
                }
            ?>
        
    </div>
    <div class="burger-mobile" onclick="myFunction(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>

    <div id="links-mobile" style="transform: translateY(-120%);">
        
        <div class="links-wrapper">
            <div class="profile-picture">
                <i class="fas fa-user"></i>
            </div>
            <?php
                if(isset($_SESSION['usuario'])){
                    echo "<h2>" . $_SESSION['usuario'] . "</h2>";
                    if($_SESSION['tipo'] == 0){
                        $tipo = "<i class='fas fa-star'></i> Administrador";
                    }else if($_SESSION['tipo'] == 1){
                        $tipo = "<i class='fas fa-chess-knight'></i> Jugador";
                    }else if($_SESSION['tipo'] == 2){
                        $tipo = "<i class='fas fa-ruler-horizontal'></i> Árbitro";
                    }else if($_SESSION['tipo'] == 3){
                        $tipo = "<i class='fas fa-microphone'></i> Periodista";
                    }
                    echo "<p class='tipo-profile'>$tipo</p>";
                }else{
                    echo "<h2>Invitado</h2>";
                }
            ?>            
            <a href="/ChessUY/Index"><i class="fas fa-home"></i> Inicio</a>
            <?php
                if(isset($_SESSION['usuario'])){
                    echo "  <a href='/ChessUY/Profile/Profile.php'><i class='fas fa-address-card'></i> Mi Perfil</a>
                            <a onclick='cerrarSesion()'><i class='fas fa-door-open'></i> Cerrar Sesión</a>";
                }else{
                    echo "<a href='/ChessUY/Form/Login'><i class='fas fa-sign-in-alt'></i> Login</a>
                          <a href='/ChessUY/Form/Register-User'><i class='fas fa-user-plus'></i> Register</a>";
                }
            ?>
        </div>
    </div>
    <script>
        function myFunction(x) {
            x.classList.toggle("change");
    
            if (document.getElementById("links-mobile").style.transform == "translateY(0%)") {
                document.getElementById("links-mobile").style.transform = "translateY(-120%)";
            } else {
                document.getElementById("links-mobile").style.transform = "translateY(-0%)";
            }
        }
    </script>
</header>
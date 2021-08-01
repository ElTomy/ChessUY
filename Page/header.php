<header>
    <div class="header-logo">

        <?php
            include '../servidor.php';
            $server= new servidor();
            session_start();
       
            if(isset($_SESSION['usuario'])){
            $Icono = $_SESSION['icono']; 
            $ColorIcono = $_SESSION['coloricono'];
            $ColorFondo = $_SESSION['colorfondo'];
            }
            
            if(isset($_SESSION['usuario'])){
                echo '  <a href="/cyberhydra/Inicio">
                            <img src="/cyberhydra/media/svg/Logo/CyberHydra.svg" alt="">
                        </a> ';
                     
            }else{
                echo '  <a href="/cyberhydra/index.php">
                            <img src="/cyberhydra/media/svg/Logo/CyberHydra.svg" alt="">
                        </a> ';
            }
            
            echo '      </div>
                    <div class="nav-links">
        
                    <a class="search" href="/cyberhydra/Profile/BuscarJugadores.html"><i class="fas fa-search"></i> Buscar Jugadores</a>';
    
        
            
                
                if(isset($_SESSION['usuario'])){
                    echo "  <div class='header-session'>
                                <a class='profile' href='/cyberhydra/Profile/" . $_SESSION['usuario'] . "'>
                                    <div class='session-image' style='background-color: ". $ColorFondo ."'><i class='" . $Icono ."' style='color: ". $ColorIcono ."'></i></div>
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
                                <a class='cerrarsesion' onclick='cerrarSesion()'><i class='fas fa-door-open'></i> Cerrar Sesión</a>
                            </div>";
                }else{
                    echo "<div class='loginregister'>
                            <a class='login-button' href='/cyberhydra/Form/login.html'><i class='fas fa-sign-in-alt'></i> LOGIN</a>
                            <a class='register-button' href='/cyberhydra/Form/register-user.html'><i class='fas fa-user-plus'></i> REGISTER</a>
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
            <?php
            echo '  <div class="profile-picture" style="background-color: '. $ColorFondo .'">
                        <i class="'.$Icono.'" style="color: '.$ColorIcono.'"></i>
                    </div>';
            
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
            <a href="/cyberhydra/index"><i class="fas fa-home"></i> Inicio</a>
            <?php
                if(isset($_SESSION['usuario'])){
                    echo "  <a href='/cyberhydra/Profile/" . $_SESSION['usuario'] . "'><i class='fas fa-address-card'></i> Mi Perfil</a>
                            <a class='search' href='/cyberhydra/Profile/BuscarJugadores.html'><i class='fas fa-search'></i> Buscar Jugadores</a>
                            <a onclick='cerrarSesion()'><i class='fas fa-door-open'></i> Cerrar Sesión</a>";
                }else{
                    echo "<a class='search' href='/cyberhydra/Profile/BuscarJugadores.html'><i class='fas fa-search'></i> Buscar Jugadores</a>
                          <a href='/cyberhydra/Form/Login'><i class='fas fa-sign-in-alt'></i> Login</a>
                          <a href='/cyberhydra/Form/Register-User'><i class='fas fa-user-plus'></i> Register</a>";
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
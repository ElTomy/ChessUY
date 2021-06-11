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
                                    <p>" . $_SESSION['usuario'] . "</p>
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
                }else{
                    echo "<h2>Invitado</h2>";
                }
            ?>            
            <a href="/ChessUY/Index"><i class="fas fa-home"></i> Inicio</a>
            <?php
                if(isset($_SESSION['usuario'])){
                    echo "<a href=''><i class='fas fa-door-open'></i> Cerrar Sesión</a>";
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
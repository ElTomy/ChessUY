:loop

call mostLogo.bat

echo ^| Que usuario desea modificar?                       ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "usu=>_ " 

if "%usu%" == "q" (
    call \admin\ABML.bat
) else (
    net user %usu% || set work=0
    if %work%==0 (
        echo ""
        echo +------------------------------------------------+
        echo ^| Hubo un error, asegurate que el usuario existe ^|
        echo +------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modificar.bat
    ) else (
        :loop

        call mostLogo.bat

        echo ^| Que quiere hacer con este usuario?                 ^|
        echo +----------------------------------------------------+
        echo.
        echo [1] Cambiar nombre
        echo [2] Cambiar password
        echo [3] Agregar a grupo
        echo [4] Eliminar de grupo
        echo [5] Bloquear usuario
        echo [6] Desbloquear usuario
        echo.
        set /p "opc=>_ "

        call :case_%opc%
        call :default_case

        goto :loop

        :case_1
            call admin\ABML\modif\cambnom.bat
            goto end_case
        :case_2
            echo.
            set /p "pass=Ingresa contraseña:"
            net user %usu% %pass%
            goto end_case
        :case_3
            call admin\ABML\modif\agragrup.bat
            goto end_case
        :case_4
            call admin\ABML\modif\elimgrup.bat
            goto end_case
        :case_5
            call admin\ABML\modif\lokuser.bat
            goto end_case
        :case_6
            call admin\ABML\modif\unkuser.bat
            goto end_case
        :case_q
            call admin\admin.bat
            goto end_case
        :default_case
            cls
            echo +-------------------------------------+
            echo ^| Porfavor, ingrese una opcion valida ^|
            echo +-------------------------------------+
            timeout /t 3 /nobreak > nul
            goto end_case
        :end_case
            goto :EOF
    )
)

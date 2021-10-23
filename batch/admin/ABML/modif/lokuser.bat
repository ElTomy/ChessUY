:loop

call mostLogo.bat

echo ^| Seguro que quiere bloquear a este usuario?         ^|
echo +----------------------------------------------------+
echo.
echo %usu%
echo.
echo [Y] SI
echo [N] NO
echo.
set /p "opc=>_ " 

call :case_%opc%
call :default_case

goto :loop

:case_Y
    net user %usu% /active:no || set work=0
    if %work%==0 (
        echo.
        echo +-------------------------------------------+
        echo ^| No se pudo bloquear, asegurate que existe ^|
        echo +-------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modif\lokuser.bat
    ) else (
        echo.
        echo +--------------------------+
        echo ^| Se bloqueo correctamente ^|
        echo +--------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modificar.bat
    )
:case_N
    call admin\ABML\modificar.bat
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
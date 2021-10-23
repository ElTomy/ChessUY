:loop

call mostLogo.bat
set work=1
echo ^| A que grupo quiere agregar a este usuario?         ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "novgrup=>_ " 

if "%novgrup%" == "q" (
    call \admin\ABML\modificar.bat
) else (
    net localgroup %novgrup% %usu% /add || set work=0
    if "%work%"=="0" (
        echo.
        echo +------------------------------------------------------+
        echo ^| No se le pudo agregar al grupo, asegurate que existe ^|
        echo +------------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modif\agragrup.bat
    ) else (
        echo.
        echo +-------------------------------------+
        echo ^| Se le agrego al grupo correctamente ^|
        echo +-------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modificar.bat
    )
)
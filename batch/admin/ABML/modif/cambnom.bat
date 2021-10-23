:loop

call mostLogo.bat
set work=1
echo ^| Que nombre desea ponerle a este usuario?           ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "novnom=>_ " 

if "%novnom%" == "q" (
    call \admin\ABML\modificar.bat
) else (
    wmic useraccount where name='%usu%' rename %novnom% || set work=0
    if "%work%"=="0" (
        echo.
        echo +-------------------------------------+
        echo ^| Hubo un error, intente otro nombre ^|
        echo +-------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modif\cambnom.bat
    ) else (
        echo.
        echo +-----------------------------------+
        echo ^| Se cambio el nombre correctamente ^|
        echo +-----------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modificar.bat
    )
)
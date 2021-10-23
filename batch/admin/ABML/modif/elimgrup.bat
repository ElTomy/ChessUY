:loop

call mostLogo.bat

echo ^| De que grupo quiere eliminar a este usuario?       ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "elgrup=>_ " 

if "%elgrup%" == "q" (
    call \admin\ABML\modificar.bat
) else (
    net localgroup %elgrup% %usu% /delete || set work=0
    if %work%==0 (
        echo.
        echo +-----------------------------------------------------------------------+
        echo ^| No se le pudo eliminar del grupo, asegurate que forme parte del mismo ^|
        echo +-----------------------------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modif\elimgrup.bat
    ) else (
        echo.
        echo +------------------------------------+
        echo ^| Se elimino del grupo correctamente ^|
        echo +------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\modificar.bat
    )
)
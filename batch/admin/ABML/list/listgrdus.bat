:loop

call mostLogo.bat

echo ^| A que usuario le quiere ver los grupos?            ^|
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
        echo.
        echo +------------------------------------------------
        echo ^| Hubo un error, asegurate que el usuario existe ^|
        echo +------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\agre\agregrup.bat
    ) else (
        echo.
        echo +----------------------------------------------+
        echo ^| El usuario pertenece a los anteriores grupos ^|
        echo +----------------------------------------------+
        echo.
        echo Presiona cualquier tecla para continuar
        pause > nul
        call \admin\ABML\listar.bat
    )
)
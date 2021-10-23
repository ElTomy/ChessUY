:loop

call mostLogo.bat

echo ^| A que grupo le quiere ver los usuarios?            ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "grp=>_ " 


if "%grp%" == "q" (
    call \admin\ABML.bat
) else (
    net user %grp% || set work=0
    if %work%==0 (
        echo.
        echo +----------------------------------------------+
        echo ^| Hubo un error, asegurate que el grupo existe ^|
        echo +----------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\list\listusdgr.bat
    ) else (
        echo.
        echo +---------------------------------------+
        echo ^| Estos usuarios pertenecen a ese grupo ^|
        echo +---------------------------------------+
        echo.
        echo Presiona cualquier tecla para continuar
        pause > nul
        call \admin\ABML\listar.bat
    )
)

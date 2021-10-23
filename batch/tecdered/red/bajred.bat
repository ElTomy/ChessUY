:loop

call mostLogo.bat

echo ^| Que interfaz desea bajar?                          ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

if "%opc%" == "q" (
    call \tecdered\red\servdered.bat
) else (
    netsh interface set interface "%opc%" disable || set work="0"
    if "%work%" == "0" (
        echo.
        echo +-------------------------------------+
        echo ^| No se pudo bajar la interfaz de red ^|
        echo +-------------------------------------+
        timeout /t 3 /nobreak > nul
        call \tecdered\red\servdered.bat
    ) else (
        echo.
        echo +-----------------------------------------------+
        echo ^| Se ha bajado la interfaz de red correctamente ^|
        echo +-----------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \tecdered\red\servdered.bat
    )
)
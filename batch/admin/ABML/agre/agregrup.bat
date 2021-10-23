:loop

call mostLogo.bat
set work=1
echo ^| Que grupo quiere agregar?                          ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "cregrup=>_ " 

if "%cregrup%" == "q" (
    call \admin\ABML\agregar.bat
) else (
    net localgroup %cregrup% /add || set work=0
    if %work%==0 (
        echo.
        echo +----------------------------------------------------+
        echo ^| No se pudo crear el grupo, asegurate que no existe ^|
        echo +----------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\agre\agregrup.bat
    ) else (
        echo.
        echo +--------------------------------+
        echo ^| Se creo el grupo correctamente ^|
        echo +--------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\agregar.bat
    )
)

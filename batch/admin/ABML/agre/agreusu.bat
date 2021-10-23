:loop

call mostLogo.bat
set work=1
echo ^| Que usuario desea agregar?                         ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "usu=>_ "

if "%usu%" == "q" (
    call admin\ABML\agregar.bat
) else (
    net user %usu% /add || set work=0
    if %work%==0 (
        echo.
        echo +---------------------------------------------------+
        echo ^| Hubo un error, asegurate que el usuario no existe ^|
        echo +---------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\agre\agreusu.bat
    ) else (
        echo.
        echo +------------------------------------+
        echo ^| Se agrego el usuario correctamente ^|
        echo +------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\agregar.bat
    )
)

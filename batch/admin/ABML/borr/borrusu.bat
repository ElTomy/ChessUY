:loop

call mostLogo.bat

echo ^| Que usuario desea borrar?                          ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "borusu=>_ " 


if "%borusu%" == "q" (
    call \admin\ABML\bajar.bat
) else (
    net user %borusu% /delete || set work=0
    if %work%==0 (
        echo.
        echo +-------------------------------------------------------------------+
        echo ^| Hubo un error al intentar borrar el usuario, asegurate que existe ^|
        echo +-------------------------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\borr\borrusu.bat
    ) else (
        echo.
        echo +-----------------------------------+
        echo ^| Se borro el usuario correctamente ^|
        echo +-----------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\bajar.bat
    )
)

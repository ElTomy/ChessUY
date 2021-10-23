:loop

call mostLogo.bat
set work=1
echo ^| Que grupo desea borrar?                            ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "borgrup=>_ " 

if "%borgrup%" == "q" (
    call \admin\ABML\bajar.bat
) else (
    net localgroup %borgrup% /delete || set work=0
    if "%work%"=="0" (
        echo.
        echo +-----------------------------------------------------------------+
        echo ^| ${red}Hubo un error al intentar borrar el grupo, asegurate que existe${nc} ^|
        echo +-----------------------------------------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\borr\borrgrup.bat
    ) else (
        echo.
        echo +---------------------------------+
        echo ^| Se borro el grupo correctamente ^|
        echo +---------------------------------+
        timeout /t 3 /nobreak > nul
        call \admin\ABML\bajar.bat
    )
)
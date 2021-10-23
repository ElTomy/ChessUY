:loop

call mostLogo.bat

echo ^| Comprobando conexion...                            ^|
echo +----------------------------------------------------+
echo.

for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 %ComputerName% ^| findstr [') do set NetworkIP=%%a

ping /w 1000 127.0.0.1 || set work="0"
if "%work%" == "0" (
    echo.
    echo +----------------------------------------------+
    echo ^| El problema puede estar en la tarjeta de red ^|
    echo +----------------------------------------------+
    echo.
    echo Presiona cualquier tecla para continuar
    pause > nul
    call \tecdered\red\servdered.bat
) else (
    echo.
    echo +---------------------+
    echo ^| Su tarjeta funciona ^|
    echo +---------------------+
    ping /w 1000 %NetworkIP% || set work="0"
    if "%work%" == "0" (
        echo.
        echo +--------------------------------+
        echo ^| No se puede conectar al router ^|
        echo +--------------------------------+
        echo.
        echo Presiona cualquier tecla para continuar
        pause > nul
        call \tecdered\red\servdered.bat
    ) else (
        echo.
        echo +-----------------+
        echo ^| Llega al router ^|
        echo +-----------------+
        ping /w 1000 8.8.8.8 || set work="0"
        if "%work%" == "0" (
            echo.
            echo +---------------------------------+
            echo ^| No se puede conectar a internet ^|
            echo +---------------------------------+
            echo.
            echo Presiona cualquier tecla para continuar
            pause > nul
            call \tecdered\red\servdered.bat
        ) else (
            echo +---------------------+
            echo ^| Llega a la internet ^|
            echo +---------------------+
            echo.
            echo Todo anda, presiona cualquier tecla para continuar
            pause > nul
            call \tecdered\red\servdered.bat
        )
    )
)
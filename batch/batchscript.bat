:loop

call mostLogo.bat

echo ^| Bienvenido al menu principal del Batch             ^|
echo +----------------------------------------------------+
echo.
echo [1] Administrador
echo [2] Tecnico de red
echo [3] Usuario
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

call :case_%opc%

goto :loop

:case_1
    echo eligiste admin
    timeout /t 3 /nobreak > nul
    goto end_case
:case_2
    echo eligiste red
    timeout /t 3 /nobreak > nul
    goto end_case
:case_3
    echo eligiste usuario
    timeout /t 3 /nobreak > nul
    goto end_case
:case_q
    echo se vuelve
    timeout /t 3 /nobreak > nul
    goto end_case
:default_case
    echo te equivocaste %opc%
    timeout /t 3 /nobreak > nul
    goto end_case
:end_case
    goto :EOF

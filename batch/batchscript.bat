:loop

call mostLogo.bat

echo ^| Bienvenido al menu principal del Batch             ^|
echo +----------------------------------------------------+
echo.
echo [1] Administrador
echo [2] Tecnico de red
echo [3] Analista en BD
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

call :case_%opc%

goto :loop

:case_1
    call revisar.bat admin
    goto end_case
:case_2
    call revisar.bat tecdered
    goto end_case
:case_3
    call revisar.bat tecbd
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

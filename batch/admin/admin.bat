:loop

call mostLogo.bat

echo ^| Bienvenido al menu del Administrador               ^|
echo +----------------------------------------------------+
echo.
echo [1] Entrar a ABML
echo [2] Visualizar logs
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

call :case_%opc%
call :default_case

goto :loop

:case_1
    call admin\ABML.bat
    goto end_case
:case_2
    call visLogs\visLogs.bat
    goto end_case
:case_q
    call batchscript.bat
    goto end_case
:default_case
    cls
    echo +-------------------------------------+
    echo ^| Porfavor, ingrese una opcion valida ^|
    echo +-------------------------------------+
    timeout /t 3 /nobreak > nul
    goto end_case
:end_case
    goto :EOF
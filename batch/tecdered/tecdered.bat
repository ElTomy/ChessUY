:loop

call mostLogo.bat

echo ^| Bienvenido al menu del Tecnico                     ^|
echo +----------------------------------------------------+
echo.
echo [1] Servicios de red
echo [2] Servicio SSH
echo [3] BackUp
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case
goto :loop
:case_1
    call tecdered\red\servdered.bat
    goto end_case
:case_2
    call tecdered\servssh\servssh.bat
    goto end_case
:case_3
    call tecdered\bkup\bkup.bat
    goto end_case
:case_q
    call tecdered\tecdered.bat
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
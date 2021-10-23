:loop

call mostLogo.bat

echo ^| Backup, que desea hacer?                           ^|
echo +----------------------------------------------------+
echo.
echo [1] Backup de BD
echo [2] Backup de tabla
echo [3] Rutinas de backup
echo [4] Visualizar crontab
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case
goto :loop
:case_1
    call tecdered\bkup\hacbkup.bat
    goto end_case
:case_2
    call tecdered\bkup\tablbkup.bat
    goto end_case
:case_3
    call tecdered\bkup\rutbkup.bat
    goto end_case
:case_4
    call tecdered\bkup\viscron.bat
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
:loop

call mostLogo.bat

echo ^| Servicios de Red, que desea hacer?                 ^|
echo +----------------------------------------------------+
echo.
echo [1] Levantar la red
echo [2] Bajar la red
echo [3] Ver estado
echo [4] Comprobar conexion
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case
goto :loop
:case_1
    call tecdered\red\levred.bat
    goto end_case
:case_2
    call tecdered\red\bajred.bat
    goto end_case
:case_3
    call tecdered\red\verest.bat
    goto end_case
:case_4
    call tecdered\red\compcon.bat
    goto end_case
:case_q
    call admin\admin.bat
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
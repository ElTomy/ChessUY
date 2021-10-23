:loop

call mostLogo.bat

echo ^| Que desea agregar?                                 ^|
echo +----------------------------------------------------+
echo.
echo [1] Agregar usuario
echo [2] Agregar grupo
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case

goto :loop

:case_1
    call admin\ABML\agre\agreusu.bat
    goto end_case
:case_2
    call admin\ABML\agre\agregrup.bat
    goto end_case
:case_q
    call admin\ABML.bat
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

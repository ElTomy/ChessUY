:loop

call mostLogo.bat

echo ^| Que desea borrar?                                  ^|
echo +----------------------------------------------------+
echo.
echo [1] Borrar usuario
echo [2] Borrar grupo
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

call :case_%opc%
call :default_case

goto :loop

:case_1
    call admin\ABML\borr\borrusu.bat
    goto end_case
:case_2
    call admin\ABML\borr\borrgrup.bat
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
:loop

call mostLogo.bat

echo ^| Desea hacer un Back Up manual?                     ^|
echo +----------------------------------------------------+
echo.
echo [1] Si
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case
goto :loop
:case_1
    call tecdered\bkup\hacerBkUp.bat
    goto end_case
:case_q
    call tecdered\bkup\bkup.bat
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

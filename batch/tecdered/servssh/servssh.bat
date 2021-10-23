:loop

call mostLogo.bat

echo ^| Servicios SSH, que desea hacer?                    ^|
echo +----------------------------------------------------+
echo.
echo [1] Prender
echo [2] Apargar
echo [3] Reiniciar
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case
goto :loop
:case_1
    call tecdered\servssh\prenssh.bat
    goto end_case
:case_2
    call tecdered\servssh\apagssh.bat
    goto end_case
:case_3
    call tecdered\servssh\reinssh.bat
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
:loop

call mostLogo.bat

echo ^| Que desea listar?                                  ^|
echo +----------------------------------------------------+
echo.
echo [1] Listar todos los usuarios
echo [2] Listar todos los grupos
echo [3] Listar los grupos de un usuario
echo [4] Listar los usuarios de un grupo
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

call :case_%opc%
call :default_case

goto :loop

:case_1
    call admin\ABML\list\listusu.bat
    goto end_case
:case_2
    call admin\ABML\list\listgrup.bat
    goto end_case
:case_3
    call admin\ABML\list\listgrdus.bat
    goto end_case
:case_4
    call admin\ABML\list\listusdgr.bat
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
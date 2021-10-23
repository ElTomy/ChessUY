:loop

call mostLogo.bat

echo ^| Bienvenido al ABML de usuarios, que desea hacer?   ^|
echo +----------------------------------------------------+
echo.
echo [1] Agregar un usuario/grupo
echo [2] Borrar un usuario/grupo
echo [3] Modificar un usuario/grupo
echo [4] Listar los usuarios/grupos
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

call :case_%opc%
call :default_case

goto :loop

:case_1
    call admin\ABML\agregar.bat
    goto end_case
:case_2
    call admin\ABML\bajar.bat
    goto end_case
:case_3
    call admin\ABML\modificar.bat
    goto end_case
:case_4
    call admin\ABML\listar.bat
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

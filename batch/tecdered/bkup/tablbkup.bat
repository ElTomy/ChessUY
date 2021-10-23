:loop

call mostLogo.bat

echo ^| A que tabla le quiere hacer un backup?             ^|
echo +----------------------------------------------------+
echo.
echo [q] Volver
echo.
set /p "opc=>_ "

call :case_%opc%
call :default_case
goto :loop
:case_q
    call tecdered\bkup\bkup.bat
    goto end_case
:default_case
    mysqldump -u UsuarioChessuy -p AjedezChessuy chessuy %opc% > chessuy_%opc%_backup.sql || set work="0"
    if "%work%" == "0" (
        echo.
        echo +--------------------------------+
        echo ^| Hubo un error al hacer el backup ^|
        echo +--------------------------------+
        timeout /t 3 /nobreak > nul
        call \tecdered\bkup\bkup.bat
    ) else (
        echo.
        echo +---------------------------------+
        echo ^| El backup se hizo correctamente ^|
        echo +---------------------------------+
        timeout /t 3 /nobreak > nul
        call \tecdered\bkup\bkup.bat
    )
:end_case
    goto :EOF
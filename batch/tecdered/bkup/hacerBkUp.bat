mysqldump -u UsuarioChessuy -p AjedezChessuy chessuy > chessuy_backup.sql || set work="0"
if "%work%" == "0" (
    echo.
    echo +----------------------------+
    echo ^| No se pudo hacer el backup ^|
    echo +----------------------------+
    timeout /t 3 /nobreak > nul
    call \tecdered\bkup\bkup.bat
) else (
    echo.
    echo +-------------------+
    echo ^| Se hizo el backup ^|
    echo +-------------------+
    timeout /t 3 /nobreak > nul
    call \tecdered\bkup\bkup.bat
)

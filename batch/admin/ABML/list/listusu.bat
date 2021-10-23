:loop

call mostLogo.bat

echo ^| Esta es la lista de usuarios.                      ^|
echo +----------------------------------------------------+
echo.
net user
echo.
echo Presiona cualquier tecla para continuar
pause > nul
call \admin\ABML\listar.bat

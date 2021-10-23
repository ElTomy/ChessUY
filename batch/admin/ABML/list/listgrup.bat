:loop

call mostLogo.bat

echo ^| Esta es la lista de grupos.                        ^|
echo +----------------------------------------------------+
echo.
net localgroup
echo.
echo Presiona cualquier tecla para continuar
pause > nul
call \admin\ABML\listar.bat

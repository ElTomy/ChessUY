:loop

call mostLogo.bat

echo ^| El estado de cual interfaz quiere verificar?       ^|
echo +----------------------------------------------------+
echo.
set /p "opc=>_ "
echo.
netsh interface show interface "%opc%"
echo.
echo Presiona cualquier tecla para continuar
pause > nul
call \tecdered\red\servdered.bat

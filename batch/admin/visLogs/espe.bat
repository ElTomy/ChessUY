:loop

call mostLogo.bat

echo ^| Decida entre las siguientes opciones               ^|
echo +----------------------------------------------------+
echo.
echo [a] Quiere especificar el usuario?
echo                   o
echo [b] Quiere ver todos los usuarios?
echo.
echo [q] Volver
echo.
set /p "opc=>_ " 

case "$espe" in
    "a") read -p "Inserte el nombre >_ " esus
         comm="${comm} ${esus}"
         . ./admin/visLogs/ipnh.sh;;
    "b") . ./admin/visLogs/ipnh.sh;;
    "q") . ./admin/admin.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/visLogs/visLogs.sh

esac

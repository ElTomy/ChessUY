#!/bin/bash

clear
. ./mostLogo.sh
echo "| De que grupo quiere eliminar a este usuario?       |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " elgrup

if [ "$elgrup" == "q" ];
then
    . ./ABML/modificar.sh
else
    if gpasswd -d $usu $elgrup >/dev/null 2>&1
    then
        echo ""
        echo "+------------------------------------+"
        echo -e "| ${green}Se elimino del grupo correctamente${nc} |"
        echo "+------------------------------------+"
        sleep 3s
        . ./ABML/modificar.sh
    else
        echo "+-----------------------------------------------------------------------+"
        echo -e "| ${red}No se le pudo eliminar del grupo, asegurate que forme parte del mismo${nc} |"
        echo "+-----------------------------------------------------------------------+"
        sleep 3s
        . ./ABML/modif/elimgrup.sh
    fi
fi

#!/bin/bash

clear
. ./mostLogo.sh
echo "| A que directorio le quiere mover el home? (/xx/xx) |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " novhom

if [ "$novhom" == "q" ];
then
    . ./ABML/modificar.sh
else
    if usermod -m -d $novhom $usu >/dev/null 2>&1
    then
        echo ""
        echo "+--------------------------------+"
        echo -e "| ${green}Se movio el home correctamente${nc} |"
        echo "+--------------------------------+"
        sleep 3s
        . ./ABML/modificar.sh
    else
        echo ""
        echo "+-----------------------------------------+"
        echo -e "| ${red}Hubo un error, intente otro directorio${nc} |"
        echo "+-----------------------------------------+"
        sleep 3s
        . ./ABML/modif/movehome.sh
    fi
fi

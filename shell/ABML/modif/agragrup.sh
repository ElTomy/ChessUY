#!/bin/bash

clear
. ./mostLogo.sh
echo "| A que grupo quiere agregar a este usuario?         |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " novgrup

if [ "$novgrup" == "q" ];
then
    . ./ABML/modificar.sh
else
    if usermod -a -G $novgrup $usu >/dev/null 2>&1
    then
        echo ""
        echo "+-------------------------------------+"
        echo -e "| ${green}Se le agrego al grupo correctamente${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./ABML/modificar.sh
    else
        echo "+------------------------------------------------------+"
        echo -e "| ${red}No se le pudo agregar al grupo, asegurate que existe${nc} |"
        echo "+------------------------------------------------------+"
        sleep 3s
        . ./ABML/modif/agragrup.sh
    fi
fi

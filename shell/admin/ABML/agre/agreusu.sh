#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que usuario desea agregar?                         |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " usu

if [ "$usu" == "q" ];
then
    . ./admin/ABML/agregar.sh
else
    if useradd $usu >/dev/null 2>&1
    then
        echo ""
        echo "+------------------------------------+"
        echo -e "| ${green}Se agrego el usuario correctamente${nc} |"
        echo "+------------------------------------+"
        sleep 3s
        . ./admin/ABML/agregar.sh
    else
        echo ""
        echo "+---------------------------------------------------+"
        echo -e "| ${red}Hubo un error, asegurate que el usuario no existe${nc} |"
        echo "+---------------------------------------------------+"
        sleep 3s
        . ./admin/ABML/agre/agreusu.sh
    fi
fi

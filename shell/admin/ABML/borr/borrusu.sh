#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que usuario desea borrar?                          |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " borusu

if [ "$borusu" == "q" ]
then
    . ./admin/ABML/bajar.sh
else
    if userdel --remove $borusu >/dev/null 2>&1
    then
        echo ""
        echo "+-----------------------------------+"
        echo -e "| ${green}Se borro el usuario correctamente${nc} |"
        echo "+-----------------------------------+"
        sleep 3s
        . ./admin/ABML/bajar.sh
    else
        echo ""
        echo "+-------------------------------------------------------------------+"
        echo -e "| ${red}Hubo un error al intentar borrar el usuario, asegurate que existe${nc} |"
        echo "+-------------------------------------------------------------------+"
        sleep 3s
        . ./admin/ABML/borr/borrusu.sh
    fi
fi

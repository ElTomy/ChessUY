#!/bin/bash

clear
. ./mostLogo.sh
echo "| A que grupo le quiere ver los usuarios?            |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " grp

if [ "$grp" == "q" ];
then
    . ./ABML.sh
else
    if grep '^'$grp':.*$' /etc/group | cut -d: -f4 >/dev/null 2>&1
    then
        echo ""
        echo "+---------------------------------------+"
        echo -e "| ${green}Estos usuarios pertenecen a ese grupo${nc} |"
        echo "+---------------------------------------+"
        grep '^'$grp':.*$' /etc/group | cut -d: -f4 | tr , " "
        echo ""
        read -rsn1 -p "Presiona cualquier tecla para continuar"
        . ./ABML/listar.sh
    else
        echo ""
        echo "+----------------------------------------------+"
        echo -e "| ${red}Hubo un error, asegurate que el grupo existe${nc} |"
        echo "+----------------------------------------------+"
        sleep 3s
        . ./ABML/list/listusdgr.sh
    fi
fi

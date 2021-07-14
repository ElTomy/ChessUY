#!/bin/bash

clear
. ./mostLogo.sh
echo "| A que usuario le quiere ver los grupos?            |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " usu

if [ "$usu" == "q" ];
then
    . ./admin/ABML.sh
else
    if groups $usu >/dev/null 2>&1
    then
        echo ""
        echo "+----------------------------------------------+"
        echo -e "| ${green}El usuario pertenece a los siguientes grupos${nc} |"
        echo "+----------------------------------------------+"
        groups $usu
        echo ""
        read -rsn1 -p "Presiona cualquier tecla para continuar"
        . ./admin/ABML/listar.sh
    else
        echo ""
        echo "+------------------------------------------------+"
        echo -e "| ${red}Hubo un error, asegurate que el usuario existe${nc} |"
        echo "+------------------------------------------------+"
        sleep 3s
        . ./admin/ABML/list/listgrdus.sh
    fi
fi

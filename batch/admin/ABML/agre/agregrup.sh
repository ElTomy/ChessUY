#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que grupo quiere agregar?                          |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " cregrup

if [ "$cregrup" == "q" ];
then
    . ./admin/ABML/agregar.sh
else
    if groupadd $cregrup >/dev/null 2>&1
    then
        echo ""
        echo "+--------------------------------+"
        echo -e "| ${green}Se creo el grupo correctamente${nc} |"
        echo "+--------------------------------+"
        sleep 3s
        . ./admin/ABML/agregar.sh
    else
        echo ""
        echo "+----------------------------------------------------+"
        echo -e "| ${red}No se pudo crear el grupo, asegurate que no existe${nc} |"
        echo "+----------------------------------------------------+"
        sleep 3s
        . ./admin/ABML/agre/agregrup.sh
    fi
fi

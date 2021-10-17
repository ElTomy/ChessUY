#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que grupo desea borrar?                            |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " borgrup

if [ "$borgrup" == "q" ]
then
    . ./admin/ABML/bajar.sh
else
    if groupdel $borgrup >/dev/null 2>&1
    then
        echo ""
        echo "+---------------------------------+"
        echo -e "| ${green}Se borro el grupo correctamente${nc} |"
        echo "+---------------------------------+"
        sleep 3s
        . ./admin/ABML/bajar.sh
    else
        echo ""
        echo "+-----------------------------------------------------------------+"
        echo -e "| ${red}Hubo un error al intentar borrar el grupo, asegurate que existe${nc} |"
        echo "+-----------------------------------------------------------------+"
        sleep 3s
        . ./admin/ABML/borr/borrgrup.sh
    fi
fi

#!/bin/bash

clear
. ./mostLogo.sh
echo "| Cual sera el nuevo grupo primario?                 |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " gruprim

if [ "$gruprim" == "q" ];
then
    . ./ABML/modificar.sh
else
    if usermod -g $gruprim $usu >/dev/null 2>&1
    then
        echo ""
        echo "+-------------------------------------------+"
        echo -e "| ${green}Se cambio de grupo primario correctamente${nc} |"
        echo "+-------------------------------------------+"
        sleep 3s
        . ./ABML/modificar.sh
    else
        echo "+------------------------------------------------------------+"
        echo -e "| ${red}No se pudo cambiar el grupo primario, asegurate que existe${nc} |"
        echo "+------------------------------------------------------------+"
        sleep 3s
        . ./ABML/modif/gruprim.sh
    fi
fi

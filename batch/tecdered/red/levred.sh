#!/bin/bash

. ./mostLogo.sh
echo "| Que interfaz desea levantar?                       |"
echo "+----------------------------------------------------+"
echo ""
read -p ">_ " opc

if ip link set dev $opc up >/dev/null 2>&1
then
    echo '+--------------------------------------------------+'
    echo -e "| ${green}Se ha levantado la interfaz de red correctamente${nc} |"
    echo '+--------------------------------------------------+'
    sleep 3s
    . ./tecdered/red/servdered.sh
else
    echo '+----------------------------------------+'
    echo -e "| ${red}No se pudo levantar la interfaz de red${nc} |"
    echo '+----------------------------------------+'
    sleep 3s
    . ./tecdered/red/servdered.sh
fi

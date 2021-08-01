#!/bin/bash

. ./mostLogo.sh
echo "| Bienvenido al menu del Tecnico                     |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Servicios de red"
echo "[2] Servicio SSH"
echo "[3] BackUp"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./tecdered/red/servdered.sh;;
    "2") . ./tecdered/servssh/servssh.sh;;
    "3") . ./tecdered/bkup/bkup.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/tecdered.sh
esac

#!/bin/bash

. ./mostLogo.sh
echo "| Servicios SSH, que desea hacer?                    |"
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
    "1") . ./tecdered/;;
    "2") . ./tecdered/;;
    "3") . ./tecdered/;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/tecdered.sh
esac

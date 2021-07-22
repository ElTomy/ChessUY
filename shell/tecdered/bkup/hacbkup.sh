#!/bin/bash

. ./mostLogo.sh
echo "| Desea hacer un Back Up manual?                     |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Si"
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./tecdered/bkup/hacerBkUp.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/tecdered.sh
esac


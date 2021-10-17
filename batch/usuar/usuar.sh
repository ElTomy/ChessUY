#!/bin/bash

. ./mostLogo.sh
echo "| Bienvenido al menu del Usuario                     |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] El"
echo "[2] Usuario"
echo "[3] No"
echo "[4] Hace"
echo "[5] Nada"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./tecdered/red/;;
    "2") . ./tecdered/red/;;
    "3") . ./tecdered/red/;;
    "4") . ./tecdered/red/;;
    "5") . ./tecdered/red/;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./usuar/usuar.sh
esac

#!/bin/bash

. ./mostLogo.sh
echo "| Servicios SSH, que desea hacer?                    |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Prender"
echo "[2] Apargar"
echo "[3] Reiniciar"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./tecdered/servssh/prenssh.sh;;
    "2") . ./tecdered/servssh/apagssh.sh;;
    "3") . ./tecdered/servssh/reinssh.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/servssh/servssh.sh
esac

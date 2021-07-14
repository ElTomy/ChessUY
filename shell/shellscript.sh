#!/bin/bash

green='\033[0;32m'
red='\033[0;31m'
nc='\033[0m'

. ./mostLogo.sh
echo "| Bienvenido al menu principal del Shell             |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Administrador"
echo "[2] Tecnico de red"
echo "[3] Usuario"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./revisar.sh admin;;
    "2") . ./revisar.sh tecdered;;
    "3") . ./revisar.sh usuar;;
    "q") echo "Hacer algo";;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./shellscript.sh
esac

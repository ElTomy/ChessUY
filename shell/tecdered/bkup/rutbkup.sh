#!/bin/bash

. ./mostLogo.sh
echo "| Menu de rutinas de backup                          |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Rutina para BD"
echo "[2] Rutina para tabla"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " qbkup

case "$qbkup" in
    "1") . ./tecdered/bkup/rutbkupfunc/hrbkup.sh;;
    "2") 
        echo ""
        echo "De que tabla debe ser el backup?"
        echo ""
        read -p ">_ " tabkup
        . ./tecdered/bkup/rutbkupfunc/hrbkup.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/tecdered.sh
esac

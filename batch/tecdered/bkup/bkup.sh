#!/bin/bash

. ./mostLogo.sh
echo "| Backup, que desea hacer?                           |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Backup de BD"
echo "[2] Backup de tabla"
echo "[3] Rutinas de backup"
echo "[4] Visualizar crontab"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./tecdered/bkup/hacbkup.sh;;
    "2") . ./tecdered/bkup/tablbkup.sh;;
    "3") . ./tecdered/bkup/rutbkup.sh;;
    "4") . ./tecdered/bkup/viscron.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/tecdered.sh
esac

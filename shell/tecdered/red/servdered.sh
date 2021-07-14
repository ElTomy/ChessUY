#!/bin/bash

. ./mostLogo.sh
echo "| Servicios de Red, que desea hacer?                 |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Levantar la red"
echo "[2] Bajar la red"
echo "[3] Ver estado"
echo "[4] Asignar configuracion"
echo "[5] Comprobar conexion"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./tecdered/red/levred.sh;;
    "2") . ./tecdered/red/bajred.sh;;
    "3") . ./tecdered/red/verest.sh;;
    "4") . ./tecdered/red/;;
    "5") . ./tecdered/red/compcon.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./tecdered/tecdered.sh
esac

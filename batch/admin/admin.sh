#!/bin/bash

. ./mostLogo.sh
echo "| Bienvenido al menu del Administrador               |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Entrar a ABML"
echo "[2] Visualizar logs"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./admin/ABML.sh;;
    "2") . ./admin/visLogs/visLogs.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/admin.sh
esac

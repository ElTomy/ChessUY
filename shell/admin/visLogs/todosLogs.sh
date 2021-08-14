#!/bin/bash

. ./mostLogo.sh
echo "| Bienvenido al menu del Administrador               |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Especificar usuario"
echo "[2] Mostrar IPs"
echo "[3] "
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./admin/visLogs/todosLogs.sh;;
    "2") . ./admin/visLogs/fallLogs.sh;;
    "q") . ./admin/admin.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/admin.sh
esac

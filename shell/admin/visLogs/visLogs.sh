#!/bin/bash

. ./mostLogo.sh
echo "| Decida entre las siguientes opciones               |"
echo "+----------------------------------------------------+"
echo ""
echo "[a] Quiere ver todos los intentos de login?"
echo "                    o"
echo "[b] Quiere ver solo intentos fallidos?"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " inte

case "$inte" in
    "a") comm="last"
         . ./admin/visLogs/espe.sh;;
    "b") comm="lastb"
         . ./admin/visLogs/espe.sh;;
    "q") . ./admin/admin.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/visLogs/visLogs.sh
esac

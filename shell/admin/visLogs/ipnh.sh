#!/bin/bash

. ./mostLogo.sh
echo "| Decida entre las siguientes opciones               |"
echo "+----------------------------------------------------+"
echo ""
echo "[a] Quiere mostrar las IPs?"
echo "                o"
echo "[b] Quiere ver los nombres de host?"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " ipnh

case "$ipnh" in
    "a") comm="${comm} -i"
         . ./admin/visLogs/numi.sh;;
    "b") . ./admin/visLogs/numi.sh;;
    "q") . ./admin/admin.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/visLogs/visLogs.sh
esac

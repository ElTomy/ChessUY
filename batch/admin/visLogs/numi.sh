#!/bin/bash

. ./mostLogo.sh
echo "| Decida entre las siguientes opciones               |"
echo "+----------------------------------------------------+"
echo ""
echo "[X] Quiere ver los ultimos X intentos?"
echo "                 o"
echo "[b] Quiere ver todos los intentos?"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " numi

if ! [[ "$numi" =~ ^[0-9]+$ ]]
then
    if [[ "$numi" == "q" ]]
    then
        . ./admin/admin.sh
    fi
    if [[ "$numi" == "b" ]]
    then
        . ./admin/visLogs/resu.sh
    fi
else
    comm="${comm} -${numi}"
    . ./admin/visLogs/resu.sh
fi

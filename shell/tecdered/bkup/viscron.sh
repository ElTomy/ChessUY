#!/bin/bash

. ./mostLogo.sh
echo "| Que archivo cron desea visualizar?                 |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

if opc == q
then
    . ./bkup.sh
else
    crontab -e $opc
fi

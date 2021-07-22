#!/bin/bash

. ./mostLogo.sh
echo "| Que archivo cron desea visualizar?                 |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

crontab -e
. ./tecdered/bkup/bkup.sh

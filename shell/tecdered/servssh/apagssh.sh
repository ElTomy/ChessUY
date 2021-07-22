#!/bin/bash

. ./mostLogo.sh
echo "| Intentando apagar el servicio SSH...               |"
echo "+----------------------------------------------------+"
echo ""
if systemctl stop sshd >/dev/null 2>&1
then
    echo "+-------------------------------------------+"
    echo -e "| ${green}El servicio SSH fue apagado correctamente${nc} |"
    echo "+-------------------------------------------+"
else
    echo "+-----------------------------------+"
    echo -e "| ${red}No se pudo apagar el servicio SSH${nc} |"
    echo "+-----------------------------------+"
fi
sleep 3s
. ./tecdered/servssh/servssh.sh

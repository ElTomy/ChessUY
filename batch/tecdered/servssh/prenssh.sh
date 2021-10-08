#!/bin/bash

. ./mostLogo.sh
echo "| Intentando iniciar el servicio SSH...              |"
echo "+----------------------------------------------------+"
echo ""
if systemctl start sshd >/dev/null 2>&1
then
    echo "+--------------------------------------------+"
    echo -e "| ${green}El servicio SSH fue iniciado correctamente${nc} |"
    echo "+--------------------------------------------+"
else
    echo "+------------------------------------+"
    echo -e "| ${red}No se pudo iniciar el servicio SSH${nc} |"
    echo "+------------------------------------+"
fi
sleep 3s
. ./tecdered/servssh/servssh.sh

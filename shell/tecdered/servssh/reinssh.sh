#!/bin/bash

. ./mostLogo.sh
echo "| Intentando reiniciar el servicio SSH...            |"
echo "+----------------------------------------------------+"
echo ""
if systemctl restart sshd >/dev/null 2>&1
then
    echo "+-------------------------------+"
    echo "| Ya se reinicio el servcio SSH |"
    echo "+-------------------------------+"
else
    echo "+--------------------------------------+"
    echo "| No se pudo reiniciar el servicio SSH |"
    echo "+--------------------------------------+"
fi
sleep 3s
. ./tecdered/servssh/servssh.sh

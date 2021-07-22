#!/bin/bash

. ./mostLogo.sh
echo "| Intentando reiniciar el servicio SSH...            |"
echo "+----------------------------------------------------+"
echo ""
if systemctl stop sshd >/dev/null 2>&1
then
    if systemctl start sshd >/dev/null 2>&1
    then
        echo "+-------------------------------+"
        echo "| Ya se reinicio el servcio SSH |"
        echo "+-------------------------------+"
    else
        echo "+--------------------------------------+"
        echo "| No se pudo reiniciar el servicio SSH |"
        echo "+--------------------------------------+"
    fi
elif systemctl start sshd >/dev/null 2>&1
then
    if system stop sshd >/dev/null 2>&1
    then
        echo "+-------------------------------+"
        echo "| Ya se reinicio el servcio SSH |"
        echo "+-------------------------------+"
    else
        echo "+--------------------------------------+"
        echo "| No se pudo reiniciar el servicio SSH |"
        echo "+--------------------------------------+"
    fi
else
    echo "+---------------------------+"
    echo "| Hubo un error desconocido |"
    echo "+---------------------------+"
fi
sleep 3s
. ./tecdered/servssh/servssh.sh

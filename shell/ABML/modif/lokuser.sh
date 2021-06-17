#!/bin/bash

clear
. ./mostLogo.sh
echo "| Seguro que quiere bloquear a este usuario?         |"
echo "+----------------------------------------------------+"
echo ""
echo $usu
echo ""
echo "[Y] SI"
echo "[N] NO"
echo ""
read -p ">_ " opc

case "$opc" in
    "Y")
        if usermod -L $lokuser >/dev/null 2>&1
        then
            echo ""
            echo "+--------------------------+"
            echo -e "| ${green}Se bloqueo correctamente${nc} |"
            echo "+--------------------------+"
            sleep 3s
            . ./ABML/modificar.sh
        else
            echo "+-------------------------------------------+"
            echo -e "| ${red}No se pudo bloquear, asegurate que existe${nc} |"
            echo "+-------------------------------------------+"
            sleep 3s
            . ./ABML/modif/lokuser.sh
        fi;;
    "N") . ./ABML/modificar.sh;;
esac

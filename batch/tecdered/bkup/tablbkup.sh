#!/bin/bash

. ./mostLogo.sh
echo "| A que tabla le quiere hacer un backup?             |"
echo "+----------------------------------------------------+"
echo ""
read -p "(Escriba 'salir' para volver) >_ " opc

case "$opc" in
    "Salir") . ./tecdered/bkup/bkup.sh;;
    "salir") . ./tecdered/bkup/bkup.sh;;
    *) if mysqldump -u root -p contra ChessUY $opc > ../BD/${ocp}_backup.sql >/dev/null 2>&1
    then
        echo '+---------------------------------+'
        echo -e "| ${green}El backup se hizo correctamente${nc} |"
        echo '+---------------------------------+'
    else
        echo '+--------------------------------+'
        echo -e "| ${red}Hubo un error al hacer el backup${nc} |"
        echo '+--------------------------------+'
    fi
    sleep 3s
    . ./tecdered/bkup/bkup.sh;;
esac

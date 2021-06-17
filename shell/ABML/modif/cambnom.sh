#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que nombre desea ponerle a este usuario?           |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " novnom

if [ "$novnom" == "q" ];
then
    . ./ABML/modificar.sh
else
    if usermod -l $novnom $usu >/dev/null 2>&1
    then
        groupadd $novnom
        usermod -g $novnom $novnom
        groupdel $usu
        home=$(eval echo "~$novnom")
        home=$(dirname $home)
        usermod -m -d $home/$novnom $novnom
        echo ""
        echo "+------------------------------------+"
        echo -e "| ${green}Se cambio el nombre correctamente${nc}  |"
        echo "+------------------------------------+"
        sleep 3s
        . ./ABML/modificar.sh
    else
        echo ""
        echo "+---------------------------------------------------------+"
        echo -e "| ${red}Hubo un error, intente otro nombre${nc}                     |"
        echo "+---------------------------------------------------------+"
        sleep 3s
        . ./ABML/modif/cambnom.sh
    fi
fi

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
    . ./admin/ABML/modificar.sh
else
    if usermod -l $novnom $usu >/dev/null 2>&1
    then
        groupadd $novnom >/dev/null 2>&1
        usermod -g $novnom $novnom >/dev/null 2>&1
        groupdel $usu >/dev/null 2>&1
        home=$(eval echo "~$novnom")
        home=$(dirname $home)
        usermod -m -d $home/$novnom $novnom >/dev/null 2>&1
        echo ""
        echo "+-----------------------------------+"
        echo -e "| ${green}Se cambio el nombre correctamente${nc} |"
        echo "+-----------------------------------+"
        sleep 3s
        . ./admin/ABML/modificar.sh
    else
        echo ""
        echo "+-------------------------------------+"
        echo -e "| ${red}Hubo un error, intente otro nombre${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/ABML/modif/cambnom.sh
    fi
fi

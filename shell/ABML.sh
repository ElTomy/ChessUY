#!/bin/bash

green='\033[0;32m'
red='\033[0;31m'
nc='\033[0m'

. ./mostLogo.sh
echo "| Bienvenido al ABML de usuarios, que desea hacer? |"
echo "+--------------------------------------------------+"
echo ""
echo "[1] Agregar un usuario"
echo "[2] Bajar un usuario"
echo "[3] Modificar un usuario"
echo "[4] Listar los usuarios"
echo ""
echo "[5] Volver"
echo "[6] Salir"
echo ""
read -p ">_ " opc

function agregar {
    clear
    . ./mostLogo.sh
    echo "| Que usuario desea agregar?                       |"
    echo "+--------------------------------------------------+"
    echo ""
    echo "[q] Volver"
    echo ""
    read -p ">_ " usu

    if [ "$usu" == "q" ];
    then
        . ./ABML.sh
    else
        if useradd $usu;
        then
            echo ""
            echo "+------------------------------------+"
            echo -e "| ${green}Se agrego el usuario correctamente${nc} |"
            echo "+------------------------------------+"
            sleep 5s
            . ./ABML.sh
        else
            echo ""
            echo "+---------------------------------------------------------+"
            echo -e "| ${red}Hubo un error, intentalo de nuevo o ingresa otro nombre${nc} |"
            echo "+---------------------------------------------------------+"
            sleep 5s
            . ./ABML.sh
        fi
    fi
}

function bajar {
    clear
    . ./mostLogo.sh
    echo "| Que usuario desea bajar?                         |"
    echo "+--------------------------------------------------+"
    echo ""
    echo "[q] Volver"
    echo ""
    read -p ">_ " usu

    if [ "$usu" == "q" ]
    then
        . ./ABML.sh
    else
        if userdel --remove >/dev/null 2>&1 $usu
        then
            echo ""
            echo "+-------------------------------------+"
            echo -e "| ${green}Se elimino el usuario correctamente${nc} |"
            echo "+-------------------------------------+"
            sleep 5s
            . ./ABML.sh
        else
            echo ""
            echo "+------------------------------------------------------------------+"
            echo -e "| ${red}Hubo un error al intentar bajar el usuario, asegurate que existe${nc} |"
            echo "+------------------------------------------------------------------+"
            sleep 5s
            . ./ABML.sh
        fi
    fi
}

case "$opc" in
    "1") agregar;;
    "2") bajar;;
esac

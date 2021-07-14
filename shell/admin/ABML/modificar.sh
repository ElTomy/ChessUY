#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que usuario desea modificar?                       |"
echo "+----------------------------------------------------+"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " usu

if [ "$usu" == "q" ]
then
    . ./admin/ABML.sh
else
    if id $usu >/dev/null 2>&1
    then
        . ./mostLogo.sh
        echo "| Que quiere hacer con este usuario?                 |"
        echo "+----------------------------------------------------+"
        echo ""
        echo "[1] Cambiar nombre"
        echo "[2] Agregar a grupo"
        echo "[3] Eliminar de grupo"
        echo "[4] Cambiar grupo primario"
        echo "[5] Mover directorio home"
        echo -e "${red}[6] Bloquear usuario${nc}"
        echo -e "${green}[7] Desbloquear usuario${nc}"
        echo ""
        read -p ">_ " opc

        case "$opc" in
            "1") . ./admin/ABML/modif/cambnom.sh;;
            "2") . ./admin/ABML/modif/agragrup.sh;;
            "3") . ./admin/ABML/modif/elimgrup.sh;;
            "4") . ./admin/ABML/modif/gruprim.sh;;
            "5") . ./admin/ABML/modif/movehome.sh;;
            "6") . ./admin/ABML/modif/lokuser.sh;;
            "7") . ./admin/ABML/modif/unkuser.sh;;
        esac
    else
        echo ""
        echo "+------------------------------------------------+"
        echo -e "| ${red}Hubo un error, asegurate que el usuario existe${nc} |"
        echo "+------------------------------------------------+"
        sleep 3s
        . ./admin/ABML/modificar.sh
    fi
fi

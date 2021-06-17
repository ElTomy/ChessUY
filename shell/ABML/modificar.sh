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
    . ./ABML.sh
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
            "1") . ./ABML/modif/cambnom.sh;;
            "2") . ./ABML/modif/agragrup.sh;;
            "3") . ./ABML/modif/elimgrup.sh;;
            "4") . ./ABML/modif/cambgrup.sh;;
            "5") . ./ABML/modif/movhome.sh;;
            "6") . ./ABML/modif/blockusr.sh;;
            "7") . ./ABML/modif/unblockusr.sh;;
        esac
    else
        echo ""
        echo "+------------------------------------------------+"
        echo -e "| ${red}Hubo un error, asegurate que el usuario existe${nc} |"
        echo "+------------------------------------------------+"
        sleep 3s
        . ./ABML/modificar.sh
    fi
fi

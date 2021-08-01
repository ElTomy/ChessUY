#!/bin/bash

. ./mostLogo.sh
echo "| Bienvenido al ABML de usuarios, que desea hacer?   |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Agregar un usuario/grupo"
echo "[2] Borrar un usuario/grupo"
echo "[3] Modificar un usuario/grupo"
echo "[4] Listar los usuarios/grupos"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./admin/ABML/agregar.sh;;
    "2") . ./admin/ABML/bajar.sh;;
    "3") . ./admin/ABML/modificar.sh;;
    "4") . ./admin/ABML/listar.sh;;
    "q") . ./shellscript.sh;;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./admin/ABML.sh
esac

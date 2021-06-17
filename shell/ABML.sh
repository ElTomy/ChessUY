#!/bin/bash

green='\033[0;32m'
red='\033[0;31m'
nc='\033[0m'

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
    "1") . ./ABML/agregar.sh;;
    "2") . ./ABML/bajar.sh;;
    "3") . ./ABML/modificar.sh;;
    "4") . ./ABML/listar.sh;;
    "q") echo "Hacer algo";;
    *)  echo "+-------------------------------------+"
        echo -e "| ${red}Porfavor, ingrese una opcion valida${nc} |"
        echo "+-------------------------------------+"
        sleep 3s
        . ./ABML.sh
esac

#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que desea borrar?                                  |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Borrar usuario"
echo "[2] Borrar grupo"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./ABML/borr/borrusu.sh;;
    "2") . ./ABML/borr/borrgrup.sh;;
    "q") . ./ABML.sh;;
esac

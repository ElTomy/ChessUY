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
    "1") . ./admin/ABML/borr/borrusu.sh;;
    "2") . ./admin/ABML/borr/borrgrup.sh;;
    "q") . ./admin/ABML.sh;;
esac

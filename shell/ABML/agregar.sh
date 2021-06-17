#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que desea agregar?                                 |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Agregar usuario"
echo "[2] Agregar grupo"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./ABML/agre/agreusu.sh;;
    "2") . ./ABML/agre/agregrup.sh;;
    "q") . ./ABML.sh;;
esac

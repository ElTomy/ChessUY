#!/bin/bash

clear
. ./mostLogo.sh
echo "| Que desea listar?                                  |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Listar todos los usuarios"
echo "[2] Listar todos los grupos"
echo "[3] Listar los grupos de un usuario"
echo "[4] Listar los usuarios de un grupo"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " opc

case "$opc" in
    "1") . ./admin/ABML/list/listusu.sh;;
    "2") . ./admin/ABML/list/listgrup.sh;;
    "3") . ./admin/ABML/list/listgrdus.sh;;
    "4") . ./admin/ABML/list/listusdgr.sh;;
    "q") . ./admin/ABML.sh;;
esac

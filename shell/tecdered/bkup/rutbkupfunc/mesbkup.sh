#!/bin/bash

. ./mostLogo.sh
echo "| Meses de backup.                                   |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Si quiere un mes (1-12) concreto"
echo "[2] Para especificar cada cuantos meses hacer un backup"
echo "[3] No especificar"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " mesbkupdec

case "$mesbkupdec" in
    "1") 
        echo ""
        echo "Que mes?"
        echo ""
        read -p ">_ " mesbkup
        if [ $mesbkup -gt 12 ] || [ $mesbkup -lt 1 ]
        then
            echo ""
            echo "El numero ingresado no es valido"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/mesbkup.sh
        else
            . ./tecdered/bkup/rutbkupfunc/acron.sh
        fi;;
    "2") 
        echo ""
        echo "Cada cuantos meses?"
        echo ""
        read -p ">_ " meseSbkup
        if [ "$meseSbkup" -eq "$meseSbkup" ] 2>/dev/null
        then
            . ./tecdered/bkup/rutbkupfunc/acron.sh
        else
            echo ""
            echo "Debe ingresar un numero"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/mesbkup.sh
        fi;;
    "3") . ./tecdered/bkup/rutbkupfunc/acron.sh;;
    "q") . ./tecdered/bkup/bkup.sh;;
esac
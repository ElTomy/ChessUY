#!/bin/bash

. ./mostLogo.sh
echo "| Dias de backup.                                    |"
echo "+----------------------------------------------------+"
echo ""
echo "[1] Si quiere un dia del mes (1-31) concreto"
echo "[2] Para especificar cada cuantos dias hacer un backup"
echo "[3] Si quiere un dia de la semana (0-6, Domingo=0) concreto"
echo "[4] No especificar"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " diabkupdec

case "$diabkupdec" in
    "1") 
        echo ""
        echo "Que dia del mes?"
        echo ""
        read -p ">_ " diaMesbkup
        if [ $diaMesbkup -gt 31 ] || [ $diaMesbkup -lt 1 ]
        then
            echo ""
            echo "El numero ingresado no es valido"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/diabkup.sh
        else
            . ./tecdered/bkup/rutbkupfunc/mesbkup.sh
        fi;;
    "2") 
        echo ""
        echo "Cada cuantos dias?"
        echo ""
        read -p ">_ " diaSbkup
        if [ "$diaSbkup" -eq "$diaSbkup" ] 2>/dev/null
        then
            . ./tecdered/bkup/rutbkupfunc/acron.sh
        else
            echo ""
            echo "Debe ingresar un numero"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/diabkup.sh
        fi;;
    "3")
        echo ""
        echo "Que dia de la semana?"
        echo ""
        read -p ">_ " diaSembkup
        if [ $diaSembkup -gt 6 ] || [ $diaSembkup -lt 0 ]
        then
            echo ""
            echo "El numero ingresado no es valido"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/diabkup.sh
        else
            . ./tecdered/bkup/rutbkupfunc/mesbkup.sh
        fi;;
    "4") . ./tecdered/bkup/rutbkupfunc/mesbkup.sh;;
    "q") . ./tecdered/bkup/bkup.sh;;
esac

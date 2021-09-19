#!/bin/bash

. ./mostLogo.sh
echo "| Horarios de backup.                                |"
echo "+----------------------------------------------------+"
echo ""
echo "[HH:mm] Si quiere una hora concreta"
echo "[1]     Para especificar cada cuantas horas hacer un backup"
echo "[2]     Para especificar cada cuantos minutos hacer un backup"
echo "[3]     No especificar"
echo ""
echo "[q] Volver"
echo ""
read -p ">_ " hrbkup

case "$hrbkup" in
    "1") 
        echo ""
        echo "Cada cuantas horas?"
        echo ""
        read -p ">_ " hrbkup
        if [ $hrbkup -gt 23 ] || [ $hrbkup -lt 0 ]
        then
            echo ""
            echo "El numero ingresado no es valido"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/hrbkup.sh
        else
            . ./tecdered/bkup/rutbkupfunc/acron.sh
        fi;;
    "2") 
        hrbkup=null
        echo ""
        echo "Cada cuantos minutos?"
        echo ""
        read -p ">_ " minbkup
        if [ $minbkup -gt 60 ] || [ $minbkup -lt 0 ]
        then
            echo ""
            echo "El numero ingresado no es valido"
            sleep 3s
            . ./tecdered/bkup/rutbkupfunc/hrbkup.sh
        else
            . ./tecdered/bkup/rutbkupfunc/acron.sh
        fi;;
    "3") hrbkup="NE"
        . ./tecdered/bkup/rutbkupfunc/diabkup.sh;;
    "q") . ./tecdered/bkup/bkup.sh;;
esac


if [ $hrbkup == *":"* ]
then
    IFS=':'
    read -ra arr <<< "$hrbkup"

    if [ ${arr[0]} -gt 23 ] || [ ${arr[0]} -lt 0 ] || [ ${arr[1]} -gt 59 ] || [ ${arr[1]} -lt 0 ]
    then
        echo ""
        echo "La hora que ingreso no es valida"
        sleep 3s
        . ./tecdered/bkup/rutbkupfunc/hrbkup.sh
    else
        hrbkup=null
        . ./tecdered/bkup/rutbkupfunc/diabkup.sh
    fi
else
    echo "+-----------------------------------+"
    echo -e "| ${red}Porfavor, ingrese una hora valida${nc} |"
    echo "+-----------------------------------+"
    sleep 3s
fi


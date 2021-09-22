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
read -p ">_ " hrbkupdec

case "$hrbkupdec" in
    "1") 
        echo ""
        echo "Cada cuantas horas?"
        echo ""
        read -p ">_ " hrbkup
        . ./tecdered/bkup/rutbkupfunc/acron.sh

    "2") 
        echo ""
        echo "Cada cuantos minutos?"
        echo ""
        read -p ">_ " minbkup
        . ./tecdered/bkup/rutbkupfunc/acron.sh

    "3") . ./tecdered/bkup/rutbkupfunc/diabkup.sh;;
    "q") . ./tecdered/bkup/bkup.sh;;
esac


if [ $hrbkupdec == *":"* ]
then
    IFS=':'
    read -ra arr <<< "$hrbkupdec"

    if [ ${arr[0]} -gt 23 ] || [ ${arr[0]} -lt 0 ] || [ ${arr[1]} -gt 59 ] || [ ${arr[1]} -lt 0 ]
    then
        echo ""
        echo "La hora que ingreso no es valida"
        sleep 3s
        . ./tecdered/bkup/rutbkupfunc/hrbkup.sh
    else 
        . ./tecdered/bkup/rutbkupfunc/diabkup.sh
    fi
else if [ "$hrbkupdec" != "1" ] || [ "$hrbkupdec" != "2" ] || [ "$hrbkupdec" != "3" ] [ "$hrbkupdec" != "q" ]
then
    echo "+-----------------------------------+"
    echo -e "| ${red}Porfavor, ingrese una hora valida${nc} |"
    echo "+-----------------------------------+"
    sleep 3s
fi


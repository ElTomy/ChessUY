#!/bin/bash

. ./mostLogo.sh
echo "| Enviando datos a crontab...                        |"
echo "+----------------------------------------------------+"
echo ""

case "$hrbkupdec" in
    "1") acron="* */${hrbkup} * * *";;
        
    "2") acron="*/${minbkup} * * * *";;

    "3") acron="* *";;
        
    *":"*) acron="${arr[1]} ${arr[0]}";;
esac

case "$diabkupdec" in
    "1") acron="${acron} ${diaMesbkup}";;
        
    "2") acron="${acron} */${diaSbkup} * *";;

    "3") acron="${acron} *"
esac

case "$mesbkupdec" in
    "1") 
    if [ -n $diaSembkup ]
    then
        acron="${acron} ${diaSembkup} ${mesbkup}"
    else
        acron="${acron} * ${mesbkup}"
    fi;;
    "2") 
    if [ -n $diaSembkup ]
    then
        acron="${acron} ${diaSembkup} */${meseSbkup}"
    else
        acron="${acron} * */${meseSbkup}"
    fi;;
    "3") 
    if [ -n $diaSembkup ]
    then
        acron="${acron} ${diaSembkup} *"
    else
        acron="${acron} * *"
    fi;;
esac

case "$qbkup" in
    "1") acron="echo '${acron} mysqldump -h [ip_or_hostname] -u root -p [password] ChessUY > ../BD/ChessUY_backup.sql' >> crontab -e";;
    "2") acron="echo '${acron} mysqldump -h [ip_or_hostname] -u root -p [password] ChessUY ${tabkup} > ../BD/${tabkup}_backup.sql' >> crontab -e";;
esac

echo $acron

unset $hrbkupdec
unset $hrbkup
unset $minbkup
unset $arr
unset $diabkupdec
unset $acron
unset $diaMesbkup
unset $diaSbkup
unset $mesbkupdec
unset $diaSembkup
unset $meseSbkup
unset $tabkup
unset $qbkup
unset $mesbkup
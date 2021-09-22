#!/bin/bash

. ./mostLogo.sh
echo "| Enviando datos a crontab...                        |"
echo "+----------------------------------------------------+"
echo ""
if $hrbkup == null
then
    acron="*/${minbkup} * "
else if $hrbkup == "NE"
then
    acron="* * "
else
    acron="${arr[1]} ${arr[0]}"
fi

if [ -n "$diabkup" ]
then
    acron="${acron} * * * mysqldump -u root -p contra ChessUY ${tabkup} > ../BD/${tabkup}_backup.sql"
    echo ${acron} >> crontab -e
fi


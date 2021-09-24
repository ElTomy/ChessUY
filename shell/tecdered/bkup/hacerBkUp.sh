#!/bin/bash

if cp ../BD/ChessUY.sql ../BD/ChessUY_backup.sql >/dev/null 2>&1
then
    echo ""
    echo "+-------------------+"
    echo -e "| ${green}Se hizo el backup${nc} |"
    echo "+-------------------+"
else
    echo ""
    echo "+----------------------------+"
    echo -e "| ${red}No se pudo hacer el backup${nc} |"
    echo "+----------------------------+"
fi
sleep 3s
. ./tecdered/bkup/bkup.sh

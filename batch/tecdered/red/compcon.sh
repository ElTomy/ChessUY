#!/bin/bash

. ./mostLogo.sh
echo "| Comprobando conexion...                            |"
echo "+----------------------------------------------------+"
echo ""

iprout=$(ip r | grep default | awk 'FNR == 1 {print $3}')

if ping -w 1 127.0.0.1 >/dev/null 2>&1
then
    echo '+---------------------+'
    echo -e "| ${green}Su tarjeta funciona${nc} |"
    echo '+---------------------+'
    if ping -w 1 $iprout >/dev/null 2>&1
    then
        echo '+-----------------+'
        echo -e "| ${green}Llega al router${nc} |"
        echo '+-----------------+'
        if ping -w 1 8.8.8.8 >/dev/null 2>&1
        then
            echo '+---------------------+'
            echo -e "| ${green}Llega a la internet${nc} |"
            echo '+---------------------+'
            echo ""
            read -rsn1 -p "Todo anda, presiona cualquier tecla para continuar"
            . ./tecdered/red/servdered.sh
        else
            sleep 1s
            echo '+---------------------------------+'
            echo -e "| ${red}No se puede conectar a internet${nc} |"
            echo '+---------------------------------+'
            echo ""
            read -rsn1 -p "Presiona cualquier tecla para continuar"
            . ./tecdered/red/servdered.sh
        fi
    else
        sleep 1s
        echo '+--------------------------------+'
        echo -e "| ${red}No se puede conectar al router${nc} |"
        echo '+--------------------------------+'
        echo ""
        read -rsn1 -p "Presiona cualquier tecla para continuar"
        . ./tecdered/red/servdered.sh
    fi
else
    sleep 1s
    echo '+----------------------------------------------+'
    echo -e "| ${red}El problema puede estar en la tarjeta de red${nc} |"
    echo '+----------------------------------------------+'
    echo ""
    read -rsn1 -p "Presiona cualquier tecla para continuar"
    . ./tecdered/red/servdered.sh
fi

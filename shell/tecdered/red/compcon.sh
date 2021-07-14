#!/bin/bash

. ./mostLogo.sh
echo "| Ingrese la ip del router                           |"
echo "+----------------------------------------------------+"
echo ""
read -p ">_ " opt

. ./mostLogo.sh
echo "| Comprobando conexion...                            |"
echo "+----------------------------------------------------+"
echo ""

if ping -w 3 127.0.0.1 >/dev/null 2>&1
then
    echo '+---------------------+'
    echo -e "| ${green}Su tarjeta funciona${nc} |"
    echo '+---------------------+'
    if ping -w 3 $opt >/dev/null 2>&1
    then
        echo '+-----------------+'
        echo -e "| ${green}Llega al router${nc} |"
        echo '+-----------------+'
        if ping -w 3 8.8.8.8 >/dev/null 2>&1
        then
            echo '+---------------------+'
            echo -e "| ${green}Llega a la internet${nc} |"
            echo '+---------------------+'
            echo ""
            read -rsn1 -p "Todo anda, presiona cualquier tecla para continuar"
            . ./tecdered/red/servdered.sh
        else
            sleep 3s
            echo '+---------------------------------+'
            echo -e "| ${red}No se puede conectar a internet${nc} |"
            echo '+---------------------------------+'
            echo ""
            read -rsn1 -p "Presiona cualquier tecla para continuar"
            . ./tecdered/red/servdered.sh
        fi
    else
        sleep 3s
        echo '+--------------------------------+'
        echo -e "| ${red}No se puede conectar al router${nc} |"
        echo '+--------------------------------+'
        echo ""
        read -rsn1 -p "Presiona cualquier tecla para continuar"
        . ./tecdered/red/servdered.sh
    fi
else
    sleep 3s
    echo '+----------------------------------------------+'
    echo -e "| ${red}El problema puede estar en la tarjeta de red${nc} |"
    echo '+----------------------------------------------+'
    echo ""
    read -rsn1 -p "Presiona cualquier tecla para continuar"
    . ./tecdered/red/servdered.sh
fi

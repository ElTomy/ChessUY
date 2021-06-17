#!/bin/bash

clear
. ./mostLogo.sh
echo "| Esta es la lista de grupos.                        |"
echo "+----------------------------------------------------+"
echo ""
getent group | cut -d: -f1
echo ""
read -rsn1 -p "Presiona cualquier tecla para continuar"
. ./ABML/listar.sh

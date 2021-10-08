#!/bin/bash

. ./mostLogo.sh
echo "| El estado de cual interfaz quiere verificar?       |"
echo "+----------------------------------------------------+"
echo ""
read -p ">_ " opc
echo ""
ip link | grep $opc
echo ""
read -rsn1 -p "Presiona cualquier tecla para continuar"
. ./tecdered/red/servdered.sh

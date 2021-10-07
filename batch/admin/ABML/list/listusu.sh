#!/bin/bash

clear
. ./mostLogo.sh
echo "| Esta es la lista de usuarios.                      |"
echo "+----------------------------------------------------+"
echo ""
eval getent passwd {$(awk '/^UID_MIN/ {print $2}' /etc/login.defs)..$(awk '/^UID_MAX/ {print $2}' /etc/login.defs)} | cut -d: -f1
echo ""
read -rsn1 -p "Presiona cualquier tecla para continuar"
. ./admin/ABML/listar.sh

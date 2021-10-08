#!/bin/bash

clear
. ./mostLogo.sh
echo "| Esta es la lista de grupos.                        |"
echo "+----------------------------------------------------+"
echo ""
getent group | cut -d: -f1 | less
. ./admin/ABML/listar.sh

#!/bin/bash

if groups $USER | grep -q $1
then
    case "$1" in
        "admin") . ./admin/ABML.sh;;
        "tecdered") . ./tecdered/tecdered.sh;;
        "usuar") . ./usuar/usuar.sh;;
        *)  echo "+----------------------+"
            echo -e "| ${red}Ha ocurrido un error${nc} |"
            echo "+----------------------+"
            sleep 3s
            . ./shellscript.sh
    esac
else
    echo '+--------------------------------------------------------+'
    echo -e "| ${red}Usted no tiene los permisos requidos para acceder aqui${nc} |"
    echo '+--------------------------------------------------------+'
fi

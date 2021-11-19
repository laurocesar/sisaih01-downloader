#!/bin/sh

curl -s --insecure ftp://ftp2.datasus.gov.br/public/sistemas/dsweb/SIHD/Programas/sisaih01_leiame.txt | sed -n '/----------------------------------------------------/q;p' 
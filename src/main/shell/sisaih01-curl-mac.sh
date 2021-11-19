#!/bin/sh

curl -s --insecure ftp://ftp2.datasus.gov.br/public/sistemas/dsweb/SIHD/Programas/sisaih01_leiame.txt | iconv -f ISO-8859-1 -t UTF8-MAC | sed -n '/----------------------------------------------------/q;p' 
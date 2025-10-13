#!/bin/bash

H="/home/cdf/www/my.campodeifiori.cc"
FTMP="$H/checkserviceartisanqueuework.tmp"

ps faxu | grep "$H/private/artisan queue:work" | egrep -v grep > $FTMP
if ! grep -q "$H/private/artisan queue:work" $FTMP
then

echo "`date +"%Y-%m-%d %T"` Servizio artisan:queue-work offline. Riavvio"
(php $H/private/artisan queue:work)&
fi

if [ -e "$FTMP" ]
then
rm -f $FTMP
fi

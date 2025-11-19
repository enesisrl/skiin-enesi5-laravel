#!/bin/bash

H="/home/skiin2/public_html"
FTMP="$H/checkserviceartisanqueuework.tmp"

ps faxu | grep "$H/private/artisan queue:work" | egrep -v grep > $FTMP
if ! grep -q "$H/private/artisan queue:work" $FTMP
then

echo "`date +"%Y-%m-%d %T"` Servizio artisan:queue-work offline. Riavvio"
(sp-php $H/private/artisan queue:work)&
fi

if [ -e "$FTMP" ]
then
rm -f $FTMP
fi

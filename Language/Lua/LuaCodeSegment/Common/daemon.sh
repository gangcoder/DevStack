#!/bin/bash

ps -eaf|grep test.php|grep -v grep
if [ $? -eq 1 ]
then
    /usr/bin/php /var/www/html/data-platform/public/taskredis2url.php &
    echo `date "+%G-%m-%d %H:%M:%S"`" B_PUSH_TASK        restart"
    echo "------------------------------------------------------------------------"
else
    echo `date "+%G-%m-%d %H:%M:%S"`" B_PUSH_TASK        running"
    echo "------------------------------------------------------------------------"
fi

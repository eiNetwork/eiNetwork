#!/bin/sh
# set local configuration for starting Solr and then start solr
#Replace {servername} with your server name and save in sites/{servername} as {servername.sh} 
export VUFIND_HOME=/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net
export JETTY_HOME=/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/jetty
export SOLR_HOME=/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr     
export JETTY_PORT=8080
#Max memory should be at least he size of all solr indexes combined. 
export JAVA_OPTIONS="-server -Xms1900m -Xmx1900m -XX:+UseParallelGC -XX:NewRatio=5"
export JETTY_LOG=/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/logs/jetty

exec /usr/local/VuFind-Plus/sites/default/vufind.sh $1 $2

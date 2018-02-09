#!/bin/bash

cd `dirname $0`
(php -S 0.0.0.0:80 -t w3schools) &
(php -S 0.0.0.0:8080 -t upload) &

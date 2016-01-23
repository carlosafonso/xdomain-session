#!/bin/bash

php -S 0.0.0.0:8000 -t server/ &
php -S 0.0.0.0:9000 -t client/ &

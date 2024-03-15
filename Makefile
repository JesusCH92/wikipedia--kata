#! /bin/bash

##	deploy:			instalamos lo que necesita el proyecto
deploy:
	- composer install
	- php vendor/bin/phinx migrate
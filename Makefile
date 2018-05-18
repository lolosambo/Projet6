DOCKER = docker

ENV_PHP = $(DOCKER) exec snowtricks_php-fpm
ENV_COMPOSER = $(ENV_PHP) composer
ENV_BLACKFIRE = $(DOCKER) exec snowtricks_blackfire

## DOCTRINE commands
schema-validate: config/doctrine
	    $(ENV_PHP) ./bin/console doctrine:schema:validate 

schema-update: config/doctrine
	    $(ENV_PHP) ./bin/console doctrine:schema:update --force

doctrine-cache-clear: ## make the doctrine cache empty
	    $(ENV_PHP) ./bin/console doctrine:cache:clear-metadata

drop-database: ##cancel full database
	    $(ENV_PHP) ./bin/console doctrine:database:drop --force

create-database: ##create database
	    $(ENV_PHP) ./bin/console doctrine:database:create

## PHPUNIT commands
phpunit: tests
	    $(ENV_PHP) ./bin/phpunit -v

## COMPOSER commands
require: composer.json
	    $(ENV_COMPOSER) require $(PACKAGE)

composer-update: composer.lock
	    $(ENV_COMPOSER) update

autoload: #dump-autoload
	    $(ENV_COMPOSER) dump-autoload -o

## BLACKFIRE commands
profile: ##profile a route with Blackfire
	    $(ENV_BLACKFIRE) blackfire curl http://172.18.0.1:8080$(URL) --samples $(SAMPLES)


DOCKER = docker

ENV_PHP = $(DOCKER) exec snowtricks_php-fpm
ENV_COMPOSER = $(ENV_PHP) composer
ENV_BLACKFIRE = $(DOCKER) exec snowtricks_blackfire

## ENV commandes
cache-clear: var/cache
	    $(ENV_PHP) rm -rf var/cache/*

## DOCTRINE commands
schema-validate: config/doctrine
	    $(ENV_PHP) ./bin/console doctrine:schema:validate 

schema-update: config/doctrine
	    $(ENV_PHP) ./bin/console doctrine:schema:update --force

doctrine-cache-clear: ## make the doctrine cache empty
	    $(ENV_PHP) ./bin/console doctrine:cache:clear-metadata

fixtures: ## load fixtures in the database
	    $(ENV_PHP) ./bin/console doctrine:fixtures:load

drop-database: ##cancel full database
	    $(ENV_PHP) ./bin/console doctrine:database:drop --force

create-database: ##create database
	    $(ENV_PHP) ./bin/console doctrine:database:create

## PHPUNIT commands
phpunit: tests
	    $(ENV_PHP) ./bin/phpunit -v

## BEHAT commands
behat: features
	    $(ENV_PHP) ./vendor/bin/behat --snippets-for CLI

## COMPOSER commands
require: composer.json
	    $(ENV_COMPOSER) require $(PACKAGE)

require-dev: composer.json
	    $(ENV_COMPOSER) require $(PACKAGE) --dev

composer-update: composer.lock
	    $(ENV_COMPOSER) update

autoload: composer.json
	    $(ENV_COMPOSER) dump-autoload -o

## BLACKFIRE commands
profile: ##profile a route with Blackfire
	    $(ENV_BLACKFIRE) blackfire curl http://172.18.0.1:8080$(URL) --samples $(SAMPLES)

blackfire-config: ##Blackfire config
	    $(ENV_BLACKFIRE) blackfire config

sdk-test: ##Blackfire SDK/PHP tests
	    $(ENV_PHP) ./bin/phpunit -v --group Blackfire


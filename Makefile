.PHONY: all

info: usage

usage:
		@echo "  make init                                 Initialise the project"
		@echo "  make update                               Update the project"
		@echo "  make test                                 Run tests"
		@echo "  make coverage                             Run tests with coverage"
		@echo "  make format                               Fix codestyle issues"
		@echo "  make analyse                              Analyse php code"
		@echo "  make rector                               Run rector"

# ===========================
# Commands
# ===========================

init: do_composer do_init do_ide_helpers
update: do_composer do_ide_helpers do_clear
test: do_test
coverage: do_coverage
format: do_format
package: do_composer do_local_package
analyse: do_phpstan
rector: do_rector
clear: do_clear

# ===========================
# Recipes
# ===========================

do_init:
		test -f .env || cp .env.example .env
		php artisan key:generate
		php artisan storage:link

do_composer:
		composer install

do_test:
		./vendor/bin/pest

do_coverage:
		XDEBUG_MODE=coverage ./vendor/bin/pest --coverage --coverage-html="./coverage"
		@echo "Open coverage ./coverage/index.html"

do_format:
		./vendor/bin/pint

do_ide_helpers:
		php artisan ide-helper:generate
		php artisan ide-helper:models --nowrite
		php artisan ide-helper:meta

do_local_package:
		composer config repositories.mailbook '{"type": "path", "url": "../mailbook"}' --file composer.json
		composer require xammie/mailbook @dev

do_phpstan:
		./vendor/bin/phpstan analyse

do_rector:
		./vendor/bin/rector process

do_clear:
		php artisan cache:clear
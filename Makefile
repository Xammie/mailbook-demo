.PHONY: all

info: usage

usage:
		@echo "  make init                                 Initialise the project"
		@echo "  make update                               Update the project"
		@echo "  make format                               Fix codestyle issues"

# ===========================
# Commands
# ===========================

init: do_composer do_init do_ide_helpers
update: do_composer do_ide_helpers
test: do_test
format: do_format

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

do_format:
		./vendor/bin/pint

do_ide_helpers:
		php artisan ide-helper:generate
		php artisan ide-helper:models --nowrite
		php artisan ide-helper:meta

#
# Makefile
# Licence: MIT
# Original: https://github.com/polypodes/Build-and-Deploy/blob/master/build/Makefile

# Usage:

# me@myserver$~: make
# me@myserver$~: make help
# me@myserver$~: make tests
# me@myserver$~: make quality
# etc.

############################################################################
# Vars

# some lines may be useless for now, but these are nice tricks:
PWD         := $(shell pwd)
VENDOR_PATH := $(PWD)/vendor
BIN_PATH    := $(PWD)/bin
BUILD_PATH  := $(PWD)/build
NOW         := $(shell date +%Y-%m-%d--%H-%M-%S)
REPO        := "https://github.com/ronanguilloux/php-gpio"
BRANCH      := 'master'
PHP_CS_OPTS := '$()'
# Colors
YELLOW      := $(shell tput bold ; tput setaf 3)
GREEN       := $(shell tput bold ; tput setaf 2)
RESETC      := $(shell tput sgr0)

############################################################################
# Mandatory tasks:

all: build .git/hook/pre-commit vendor/autoload.php help done


build:
	@mkdir -p build/cov
	@mkdir -p build/logs

vendor/autoload.php:
	@composer self-update
	@composer install --optimize-autoloader

install:
	@composer self-update
	@composer install --optimize-autoloader

update:
	@composer install --optimize-autoloader

.git/hook/pre-commit:
	@cp pre-commit .git/hooks/pre-commit
	@chmod +x .git/hooks/pre-commit

############################################################################
# Generic sf2 tasks:

help:
	@echo "\n${GREEN}Usual tasks:${RESETC}\n"
	@echo "\tTo initialize:\t\tmake"
	@echo "\tTo check code quality:\tmake quality"
	@echo "\tTo run tests suite:\tmake tests"
	@echo "\tTo fix code style:\tmake cs-fix"

	@echo "\n${GREEN}Other specific tasks:${RESETC}\n"
	@echo "\tTo run a simple continuous tests server:\tmake continuous"
	@echo "\tTo dry-fix code style issues:\t\t\tmake dry-fix"
	@echo "\tTo evaluate code quality stats:\t\t\tmake stats"
	@echo "\tTo update vendors using Composer:\t\tmake update\n"

unit: vendor/autoload.php
	@echo "Run unit tests..."
	@php bin/phpunit

continuous: vendor/autoload.php
	@echo "Starting continuous tests..."
	@while true; do bin/phpunit; done

sniff: vendor/autoload.php
	@bin/phpcs --standard=PSR2 src -n
	@bin/phpcs --standard=PSR2 tests -n

dry-fix:
	@bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --dry-run --stop-on-violation --using-cache=yes -vv

cs-fix:
	@bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --using-cache=yes -vv

#quality must remain quiet, as far as it's used in a pre-commit hook validation
quality: sniff dry-fix

# packagist-based dev tools to add to your composer.json. See http://phpqatools.org
stats: build quality done
	@echo "Some stats about code quality"
	@bin/pdepend --summary-xml=./build/summary.xml --jdepend-chart=./build/jdepend.svg --overview-pyramid=./build/pyramid.svg src
	@bin/phpmd src text codesize,unusedcode

done:
	@echo
	@echo "${GREEN}Done.${RESETC}"

tests: vendor/autoload.php
	@echo "Run tests & build code coverage report..."
	@bin/phpunit

############################################################################
# .PHONY tasks list

.PHONY: all install update help unit codecoverage continuous
.PHONY: sniff dry-fix cs-fix quality stats done tests
# vim:ft=make

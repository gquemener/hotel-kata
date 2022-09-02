export SHELL = /bin/bash
export SHELLOPTS:=$(if $(SHELLOPTS),$(SHELLOPTS):)pipefail:errexit

.ONESHELL:

UID := $(shell id -u)
GID := $(shell id -g)

export UID
export GID

.PHONY: all
all: unit-test acceptance-test

.PHONY: acceptance-test
acceptance-test: vendor
	docker-compose run --rm php vendor/bin/behat $(ARGS)

.PHONY: unit-test
unit-test: vendor
	docker-compose run --rm php vendor/bin/phpunit $(ARGS)

vendor:
	docker-compose run --rm --no-deps php composer install

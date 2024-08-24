.ONESHELL:
.PHONY: $(MAKECMDGOALS)

COMMAND_PREFIX_DEFAULT = "./vendor/bin/"
ifndef COMMAND_PREFIX
	override COMMAND_PREFIX = ${COMMAND_PREFIX_DEFAULT}
endif

PHP_VERSION_DEFAULT = "8.1"
ifndef PHP_VERSION
	override PHP_VERSION = ${COMMAND_PREFIX_DEFAULT}
endif

lint:
	set -e
	${COMMAND_PREFIX}php-cs-fixer fix src --dry-run
	${COMMAND_PREFIX}phpstan analyse src -v
	${COMMAND_PREFIX}phpcs --config-set installed_paths vendor/phpcompatibility/php-compatibility
	${COMMAND_PREFIX}phpcs -p src --standard=PHPCompatibility --runtime-set testVersion ${PHP_VERSION}

tests:
	${COMMAND_PREFIX}phpunit tests
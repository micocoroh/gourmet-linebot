dev:
	@symfony server:start

install:
	@composer install

entity:
	@bin/console make:entity

migration:
	@bin/console make:migration
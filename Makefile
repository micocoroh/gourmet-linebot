dev:
	@$(MAKE) _dev -j 2

_dev: run-server run-db

run-server:
	@symfony server:start

run-db:
	@docker-compose up

install:
	@composer install

entity:
	@bin/console make:entity

db-migrate:
	@bin/console doctrine:migrations:migrate

db-create:
	@bin/console doctrine:database:create

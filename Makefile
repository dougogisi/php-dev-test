.DEFAULT_GOAL := go

.PHONY: go
go: down up

.PHONY: build
build: down rebuild up

.PHONY: rebuild
rebuild:
	docker-compose build

.PHONY: up
up:
	docker-compose up -d --remove-orphans
	docker exec -it php-dev-test-main composer install

.PHONY: down
down:
	docker-compose down

.PHONY: shell
shell:
	docker exec -it php-dev-test-main sh

.PHONY: logs
logs:
	docker-compose logs -f --tail=100

.PHONY: test
test:
	docker exec -it php-dev-test-main sh -c "codecept run"

.PHONY: run
run:
	docker exec -it php-dev-test-main php entrypoint.php

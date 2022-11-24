up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

in:
	./vendor/bin/sail bash

in-db:
	./vendor/bin/sail bash -c "php artisan tinker"

reset-db-seed:
	./vendor/bin/sail bash -c "php artisan migrate:fresh --seed"

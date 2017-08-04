warehouse
=========

To get up and running
1. composer install
1. php bin\console doctrine:schema:create -n
1. php bin\console doctrine:fixtures:load -n
1. php bin\console server:run
1. navigate to http://localhost:8000/

# aasite-backend

Build in with [Slim 3](https://slimframework.com)

## Library

1. [Eloquent](https://github.com/illuminate/database) - ORM DB
2. [Twig](https://github.com/twigphp/Twig) - Template
3. [Respect Validation](https://github.com/Respect/Validation) - Validation
4. [PHPMailer](https://github.com/PHPMailer/PHPMailer) - Mailler
5. [Phinx](https://github.com/cakephp/phinx) - DB Migration
6. [Monolog](https://github.com/Seldaek/monolog) - Logging For PHP

### How To Use?

    Run Migration
        vendor\bin\phinx migrate -e [option]
    Run Seed
         vendor\bin\phinx seed:run -e [option]

    n-option = testing, development or production (phinx.yml)

    Run This Service

        PHP -S localhost:8080 -t public

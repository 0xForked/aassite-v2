# with-slim

Build up [with-slim](https://github.com/aasumitro/with-slim)

## Library

1. [Eloquent](https://github.com/illuminate/database) - ORM DB
2. [Twig](https://github.com/twigphp/Twig) - Template
3. [PHPMailer](https://github.com/PHPMailer/PHPMailer) - Mailler
4. [Phinx](https://github.com/cakephp/phinx) - DB Migration
5. [Monolog](https://github.com/Seldaek/monolog) - Logging For PHP

### How To Use?

    Manual:
        Copy .env.example to .env
        Run Migration
            vendor/bin/phinx migrate -e [option]
        Run Seed
            vendor/bin/phinx seed:run -e [option]

            n-option = testing, development or production (phinx.yml)

        Install Libs

            composer install

        Run This Service

            composer start

    Auto:

        Composer install-app

### Penulisan

    NamaKelas
    namaFungsi
    nama_variable
    link-url

### License

aassite-v2 is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

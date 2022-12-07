# Instalacion de Supervisor.

    Redis es un almacén de clave-valor avanzado de código abierto.

## Instalación en Plataformas GNU\Linux.
```sh
$ sudo apt-get install redis php-redis
```

## Instalación en Composer.
```sh
composer require predis/predis
```

## Correr el servicio desde Artisan.
```sh
php artisan queue:work
```

## Independencia de Artisan.

    Para que los servicios se ejecuten automaticamente desde inicio de servicio, consulte el archivo supervisor.md

 -   [Supervisor](supervisor.md) - Monitor de proceso.

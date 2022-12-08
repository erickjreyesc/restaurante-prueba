# Prueba de Resturante.

_Prueba de Resturante._

## Requerimientos Mínimos.

```
* PHP >= ^8.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* BCMath PHP Extension
* node 18.12.1*
* npm 8.19.2
* ldap
```

## Paquetes Necesarios 

_Composer, Nodejs, NPM 

```
composer nodejs mysql php-mysql php-xml php-mbstring php-curl php-gd php-json php-sodium php-zip redis 
```

## _Clonar Repositorio_

## _Ejecución del Composer en el projecto - Librerias_

```
composer install
``` 

## _Ejecución del Node en el projecto - Librerias_

```
npm install
```

## _Copiar el archivo env.example .env_

``` 
cp .env.example .env
```

## _Modificar las configuraciones correspondientes a conexiones a servidores en el archivo .env_

```
DB_*
MAIL_*
APP_DEBUG=false
APP_ENV=production
```

## _Generar la llave del Proyecto_

```
php artisan key:generate
```

## _Generar Migrar la Estructura Base_

```
php artisan migrate --seed
```

## _Generar Enlace Almacenamiento_

```
php artisan storage:link

```
## Modulos WebServer a Habilitar.

- rewrite, headers

## Comandos de ayuda.

## _Liberar cache de la aplicación_

```
php artisan optimize:clear 
```

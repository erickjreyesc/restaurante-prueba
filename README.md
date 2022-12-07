# Micrositio de Peticiones, Quejas, Reclamos, Sugerencias y Denuncias.

_Micrositio - CMS de Peticiones, Quejas, Reclamos, Sugerencias y Denuncias._

## Licencia.

_Ver Licencia [LICENSE](license.md)_

## Requerimientos Mínimos.

```
* PHP >= 7.3|^8.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* BCMath PHP Extension
* node 16.13.1
* npm 8.1.3
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
## _Ajustar Dominio o subominio en la aplicación_

```
APP_URL=http://localhost to http://maestrias.caroycuervo.gov.co
```

## _Ajustar Dominio o subominio en el archivo sitemap.xml_

```
<loc>http://maestrias.caroycuervo.gov.co/sitemap</loc>
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

## Instalación de Rendimiento Memoria.

-   [REDIS](redis.md) - Almacén de clave-valor avanzado de código abierto.
-   [Supervisor](supervisor.md) - Monitor de proceso. 
-   [Ldap](ldap.md) - Conexión Active Directory.

## Comandos de ayuda.

## _Liberar cache de la aplicación_

```
php artisan optimize:clear 
```

## _Migrar Entidades la aplicación_

```
php artisan migrate 
```

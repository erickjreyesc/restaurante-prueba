# Instalacion de Supervisor

    Supervisor es un monitor de proceso para el sistema operativo Linux y reiniciará automáticamente sus comandos o si fallan.

## Instalación en Plataformas GNU\Linux

```sh
sudo apt-get install supervisor
```

## crear archivo worker

```sh
sudo nano [directorio-del-proyecto]/storage/logs/worker.log
```

## otorgar permisos de escritura archivo worker

```sh
sudo chmod -775 /etc/supervisor/conf.d/pqrsd-worker.conf
```

## crear archivo laravel-worker

```sh
sudo nano /etc/supervisor/conf.d/pqrsd-worker.conf
```

## Copiar Configuracion Archivo Laravel-Worker

```bash
[program:pqrsd-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /[directorio-del-proyecto]/artisan queue:work database --sleep=5 --tries=10
autostart=true
autorestart=true
user=[usuario linux ejecutor]
numprocs=8
redirect_stderr=true
stdout_logfile=/[directorio-del-proyecto]/storage/logs/worker.log
stopwaitsecs=3600
```

## Actualización del Archivo Supervisor

```sh
sudo supervisorctl reread && sudo supervisorctl update && sudo supervisorctl start pqrsd-worker:*
```

# Modulos de tares programdas.

    La siguiente instruccion debe ingresrse para incluir las tareas programadas 

## Instalación en Plataformas GNU\Linux.

    Ubique el archivo crontab y agregue la siguiente linea:

```sh
 * * * * * cd [/directorio del proyecto] && php artisan schedule:run >> /dev/null 2>&1
``` 

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mensajes de Alertas de Backend
    |--------------------------------------------------------------------------
    */
    'config' => 'Configuración :name actualizada exitosamente',
    'email' => [
        'sender' => 'Se ha enviado un correo al solicitante con la respuesta de generada.',
        'exception' => 'Esta solicitud fue configurada para no obtener respuesta vía correo electrónico al momento del completar de la solicitud.'
    ],
    'exception' => [
        'model' => 'Modelo no existe.',
        'invalid-params' => 'Parámetros inválidos.',
        'unique' => 'El valor ya existe.',
        'not-allowed' => 'Método no permitido.',
        'auth-required' => 'Autenticación Requerida.',
        'not-found' => 'El recurso solicitado no existe.',
        'invalid-request' => 'Solicitud no válida.',
        'url' => 'La URL solicitada No Existe.',
        'request-to-many' => 'Se ha realizado demasiadas solicitudes simultáneas.',
        'controller' => 'Controlador no existe.',
    ],
    'model' => [
        'alerts' => [
            'delete-title' => 'Eliminar Registro',
            'delete' => '¿Usted esta seguro de eliminar el registro nro. :value?, Esta opción es irreversible',
            'delete-date' => '¿Usted esta seguro de eliminar el registro nro. :id? con el nombre :name y fecha :date, Esta opción es irreversible',
        ],
        'details' =>[
            'title' => "Actualizar Solicitud",
            'body' => "¿Usted esta seguro que actualizar la solicitud a la etapa :etapa con la siguiente descripcion :desc?, Esta opción es irreversible",
        ],
        'setting' => [
            'update' => 'Configuración actualizada exitosamente.',
        ],
        'resource' => [
            'create' => 'Venta agregada.',
            'created' => 'Recurso :value agregado.',
            'request' => 'Solicitud actualizada exitosamente.',
            'deleted' => 'Recurso :value eliminado.',
            'updated' => 'Recurso :value actualizado.',
            'changed' => 'Recurso :value cambio de estado exitosamente.',
            'subcriber' => 'Su correo ha agregado nuestro panel de suscritores',
        ],
    ],
    'solicitudes' => [
        'sending' => 'Su solicitud de apelación ha sido enviada exitosamente.',
    ],
    'errors' => [
        'response' => 'Hubo un error al realizar la solicitud, por favor intente más tarde.',
        'base' => 'Hubo un error al realizar la solicitud. Código: :code. Mensaje: :message',
        'subcriber' => 'Su correo electronico y se encuentr en nuestro panel de suscritores.',
        'email-not-found' => 'Correo electrónico no encontrado',
        'uploads' => 'Por favor, verifique los archivos que desea cargar',
        'redis' => 'Asegurese que el Redis Server esté en modo ejecución',
        'server-error' => 'Hubo un error durante la ejecución de la aplicación, disculpe las molestias ocasionadas e intente más tarde.',
        'not-found' => 'El recurso solicitado que intentas solicitar no se encuentra en el servidor o fue movido a otro hacia otro enlace. Lo invitamos a ir al inicio o ir a la sección de búsqueda ubicado en el panel lateral derecho para más detalles.',
        'access-denied' => 'El usuario no cuenta con permisos para abrir la página.',
        'not-auth' => 'No tiene permiso para acceder al sistema.',
        'page-expired' => 'La sesión ha expirado, por favor inicie sesión nuevamente.',
        'bad-gateway' => 'La solicitud HTTP que se envió al servidor tiene una sintaxis no válida.',
        'manteiment' => 'Nuestros servicios se encuentran ocupados o en mantenimiento. Pedimos disculpas por el incidente e intente más tarde.',
        'bad-request' => 'La solicitud HTTP que se envió al servidor tiene una sintaxis no válida. Le solicitamos que actualice o cambie de navegador para visitar nuestros recursos.',
        'gateway-timeout' => 'El servidor no está recibiendo una respuesta dentro del período de tiempo permitido. Pedimos disculpas por el incidente e intente más tarde.',
    ],

];

<?php

return [
    'alerttext' => 'El Insituto Caro y Cuervo nunca le solicitará información que NO se relacione con esta radicación tales como cuentas bancarias, tarjetas y claves de acceso, a través de algún medio como: internet, redes sociales, correos electrónicos, llamadas telefónicas o fax. Si esto sucede no lo facilite y repórtelo de inmediato al correo electrónico.',
    'details' => 'Para visualizar más detalles de la solicitud, por favor haga clic en el siguiente botón',
    'email' => 'notificacionesjudiciales@caroycuervo.gov.co',
    'greeting' => 'Apreciado (a) ciudadano (a): :name,',
    'greeting.anonymous' => 'Estimado solicitante,',
    'user' => 'Estimado usuario :user,',
    'subject' => [
        'created' => 'Radicación :code recibida',
        'analyst' => 'Radicación :code en análisis',
        'updated' => 'Actualización radicación :code',
        'finish' => 'Radicación :code finalizada',
        'files' => 'Solicitud de archivos radicación :code',
        'closes' => 'Notificación de solicitudes de radicación actualmente cerradas',
        'new' => 'Nueva solicitud de radicación recibida :code',
        'assign' => 'Solicitud de radicación :code en etapa :title',
    ],
    'texto' => [
        'welcome' => [
            'created' => 'Recibimos satisfactoriamente su solicitud con el radicado :code el :created_date y hemos iniciado la gestión remitiendo el caso a la dependencia correspondiente. Daremos respuesta a su solicitud dentro de los términos legales establecidos.',
            'analyst' => 'Hemos ingresado formalmente su solicitud con el radicado :code creado el :created_date según lo indicado vía :canal, iniciando la gestión remitiendo el caso a la dependencia correspondiente. Daremos respuesta a su solicitud dentro de los términos legales establecidos.',
            'updated' => 'Se ha actualizado el estado su solicitud con el radicado :code.',
            'finish' => 'La dependencia encargada de resolver su solicitud con N° de radicado :code ya dio respuesta.',
            'files' => 'Se le ha autorizado la carga de archivos en su solicitud con el código de radicado :code.',
            'closes' => 'Usted ha recibido este correo de notificación para indicarle la lista de códigos de solicitudes PQRSD que han sido cerradas por sistema y que estuvieron en la etapa finalizado, bien sea por excedente del tiempo prudencial indicado en la app o el tiempo de vigencia.',
            'new' => 'Se ha recibido en sistema una nueva solicitud con el código de radicado :code.',
            'assign' => 'Usted ha recibido este correo para notificarle la asignación de la responsabilidad de realizar las averiguaciones pertienentes en la etapa :title. de la solicitud PQRSD con el número de radicación :codigo',
            'return' => 'Si la asignación no corresponde con su unidad, le invitamos a entrar al sistema, realizar la acción pertinente y documentar lo acontecido.',
            'invalidtime' => 'Usted ha recibido este correo para notificarle las solicitudes próximas a vencerse.',
        ],
    ],
    'link' => 'Si por alguna razón, el botón no funciona, le pedimos que copie y pegue en el navegador de su preferencia el siguiente enlace: :link',
    'request' => [
        'description' => 'Descripción: :desc',
        'step' => 'Etapa: :step',
        'created' => 'Registrado el: :created',
    ],
    'files' => 'Adicionalmente, le informamos que le ha autorizado la carga de archivos a través del siguiente enlace',
    'finished' => [
        'presentation' => '',
        'text' => 'El Ministerio de Cultura recibió el traslado de la solicitud interpuesta por el señor :code, relacionada con :desc',
        'secondtext' => 'Para su información, se remiten las respuestas dadas a usted por parte de esta Entidad.',
        'dependency' => 'Nombre de la Dependencia que proyectó la respuesta: :depedency',
        'closes' => 'Si requiere una información más detallada, por favor inicie sesión y luego en el menú Solicitudes > Históricos, realizar la búsqueda correspondiente al código que necesite. Si requiere la reapertura de la solicitud, por favor contacte al Administrador Regente.',
        'new' => 'Si requiere una información más detallada, por favor inicie sesión y luego en el menú Solicitudes > Activas, realizar la búsqueda correspondiente al código que necesite.',
        'horario' => ' Así mismo le informamos que el horario de atención es de lunes a viernes de 8:00 am a 5:00 pm, en caso de que su petición llegue fuera del horario ya mencionado, será atendida el siguiente día hábil.'
    ],
    'first' => [
        'query' => 'Puede consultar el estado de su solicitud haciendo clic aquí',
        'farewell' => 'Gracias por registrar su solicitud.',
        'info' => '¡¡¡ Este correo es solamente informativo por favor no lo responda!!!',
        'receive' => 'Su solicitud ha cambiado de estado, le invitamos hacer clic en el siguiente botón para más detalles.'
    ],
    'updated' => [
        'request' => 'Su solicitud ha cambiado de estado.',
    ],
    'survey' =>  [
        'invite' => 'Aprovechamos la oportunidad para invitarlo(a) a responder la encuesta de satisfacción sobre el servicio o información recibida, que se encuentra en el siguiente enlace:',
        'text' => 'Encuesta de percepción de servicios ofrecidos por el ICC'
    ],
    'appeal' => [],
    'notify' =>  [
        'text' => 'El usuario :user ha creado una nueva solicitud de radicación con el número :code.',        
        'finish' => 'El usuario :user ha cambiado una solicitud a etapa finalizado con el número de radicación :code.',
    ],
    'security' => [
        'assgin' => 'Estás recibiendo este correo debido a que ha dado de alta en el sistema :app',
        'resend' => 'Estas recibiendo este correo debido a que ha solicitado un cambio de contraseña en el sistema :app',
        'instructions' => 'Siga las instrucciones segun lo indica el formulario de restablecimiento y creación de contraseña.'
    ]
];

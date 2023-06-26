# Registro de Empleados

Este proyecto es una aplicación de registros de empleados desarrollada con Laravel.

## Características

- Registro de empleados con información básica (nombre, apellido, email).
- Registro de horarios de entrada y salida para cada empleado.
- Listado de empleados y sus registros.

## Instalación

Sigue los siguientes pasos para configurar y ejecutar la aplicación en tu entorno local:

1. Clona este repositorio en tu máquina local.
2. Instala las dependencias del proyecto ejecutando el comando `composer install`.
3. Crea un archivo `.env` en la raíz del proyecto y configura la conexión a la base de datos.
4. Genera una nueva clave de aplicación ejecutando el comando `php artisan key:generate`.
5. Ejecuta las migraciones para crear las tablas de la base de datos con el comando `php artisan migrate`.
6. Opcionalmente, puedes ejecutar los seeders para agregar datos de ejemplo con el comando `php artisan db:seed`.

## Uso

La aplicación proporciona los siguientes endpoints para interactuar con los empleados y sus registros:

- `GET /empleados`: Obtener todos los empleados.
- `GET /empleados/{id}`: Obtener información de un empleado específico.
- `POST /empleados`: Registrar un nuevo empleado.
- `PUT /empleados/{id}`: Actualizar los datos de un empleado.
- `DELETE /empleados/{id}`: Eliminar un empleado.

- `GET /empleados/{id}/registros`: Obtener los registros de un empleado.
- `POST /empleados/{id}/registros/entrada`: Registrar la hora de entrada de un empleado.
- `POST /empleados/{id}/registros/salida`: Registrar la hora de salida de un empleado.

Puedes utilizar una herramienta como Postman para realizar solicitudes a estos endpoints.

## Contribuciones

Si deseas contribuir a este proyecto, sigue los siguientes pasos:

1. Realiza un fork de este repositorio.
2. Crea una nueva rama con tus cambios: `git checkout -b feature/nueva-caracteristica`.
3. Realiza los cambios necesarios y realiza los commits correspondientes.
4. Sube tus cambios a tu repositorio remoto: `git push origin feature/nueva-caracteristica`.
5. Crea una solicitud de extracción (pull request) en GitHub para que podamos revisar tus cambios.
6. Espera la revisión y los comentarios de los colaboradores del proyecto.
7. Una vez aprobados los cambios, se fusionarán con la rama principal.

## Problemas conocidos

- No se maneja la autenticación de usuarios en los endpoints. Se recomienda implementar la autenticación basada en tokens JWT para proteger los recursos.

## Contacto

Si tienes alguna pregunta, sugerencia o problema, no dudes en contactarnos. Puedes encontrar nuestros datos de contacto en el archivo CONTRIBUTING.md.

## Licencia

Este proyecto está bajo la Licencia MIT. Para más detalles, consulta el archivo LICENSE.

# Instrucciones para instalar el proyecto

Este archivo contiene las instrucciones necesarias para instalar y ejecutar el proyecto en un entorno local. Sigue los pasos detallados a continuación para poner en marcha el proyecto.

# Documentacion de la API:

https://documenter.getpostman.com/view/15674319/2sAYQiCnzE#c4dedecf-3819-4bba-aa92-4f04b56a8524

## Requisitos previos

Antes de comenzar, asegúrate de tener instalados los siguientes requisitos:

1. **PHP** (versión 8.1 o superior)
2. **Composer** (para manejar las dependencias de PHP)
3. **Laravel** (preferentemente la versión 8 o superior)
4. **Base de datos** (MySQL o cualquier otra compatible con Laravel)

## Pasos para instalar

Sigue estos pasos para instalar y ejecutar el proyecto localmente:

1. **Clonar el repositorio**

   Abre tu terminal y ejecuta el siguiente comando para clonar el proyecto:

   ```bash
   git clone https://github.com/tu-usuario/tu-repositorio.git


Navegar al directorio del proyecto

Ingresa al directorio del proyecto clonado:

cd tu-repositorio
Instalar las dependencias

Ejecuta el siguiente comando para instalar todas las dependencias de PHP que el proyecto requiere:


composer install
Configurar el archivo .env

Renombra el archivo .env.example a .env:

cp .env.example .env
Abre el archivo .env y configura las credenciales de la base de datos (usuario, contraseña, nombre de la base de datos, etc.).

Ejemplo de configuración para MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
Generar la clave de la aplicación

Ejecuta el siguiente comando para generar una clave de la aplicación:

php artisan key:generate
Migrar la base de datos (si es necesario)

Si el proyecto tiene migraciones de base de datos, ejecuta el siguiente comando para migrar las tablas:

php artisan migrate
Si quieres poblar la base de datos con datos de ejemplo, puedes ejecutar:

php artisan db:seed
Ejecutar el servidor de desarrollo

Finalmente, ejecuta el servidor de desarrollo de Laravel con el siguiente comando:


php artisan serve
Esto iniciará el servidor local en http://localhost:8000. Abre tu navegador y visita esa URL para ver la aplicación en funcionamiento.

Endpoints disponibles
A continuación se detallan los endpoints principales de la API:

Registro de usuario

URL: /api/register
Método: POST
Parámetros:
name: nombre del usuario
email: correo electrónico del usuario
password: contraseña del usuario
Respuesta exitosa: status 201, mensaje de registro exitoso
Login de usuario

URL: /api/login
Método: POST
Parámetros:
email: correo electrónico del usuario
password: contraseña del usuario
Respuesta exitosa: status 200, token de autenticación
Obtener usuarios

URL: /api/users
Método: GET
Autenticación: requerida
Respuesta exitosa: lista de usuarios
Obtener un usuario por id

URL: /api/users/{id}
Método: GET
Autenticación: requerida
Respuesta exitosa: datos del usuario con el id proporcionado
Actualizar un usuario

URL: /api/users/{id}
Método: PUT
Autenticación: requerida
Parámetros:
name: nuevo nombre
email: nuevo correo electrónico
Respuesta exitosa: status 200, datos actualizados del usuario
Eliminar un usuario

URL: /api/users/{id}
Método: DELETE
Autenticación: requerida
Respuesta exitosa: status 200, mensaje de eliminación exitosa
Crear un nuevo post

URL: /api/posts
Método: POST
Parámetros:
title: título del post
content: contenido del post
Respuesta exitosa: status 201, mensaje de post creado exitosamente
Obtener todos los posts

URL: /api/posts
Método: GET
Autenticación: requerida
Respuesta exitosa: lista de posts
Obtener un post por id

URL: /api/posts/{id}
Método: GET
Autenticación: requerida
Respuesta exitosa: datos del post con el id proporcionado
Actualizar un post

URL: /api/posts/{id}
Método: PUT
Autenticación: requerida
Parámetros:
title: nuevo título
content: nuevo contenido
Respuesta exitosa: status 200, datos actualizados del post
Eliminar un post

URL: /api/posts/{id}
Método: DELETE
Autenticación: requerida
Respuesta exitosa: status 200, mensaje de eliminación exitosa


Pruebas unitarias
El proyecto incluye pruebas unitarias para asegurarse de que los endpoints estén funcionando correctamente. Puedes ejecutar las pruebas con el siguiente comando:


php artisan test
Las pruebas verificarán el funcionamiento de los endpoints de registro, login, obtención, actualización y eliminación de usuarios, entre otros.

Solución de problemas
Problema: Si obtienes un error relacionado con permisos o acceso denegado al ejecutar las migraciones, asegúrate de que las credenciales de la base de datos en el archivo .env sean correctas y que tu usuario de base de datos tenga los permisos adecuados.

Problema: Si el servidor de desarrollo no arranca, asegúrate de que el puerto 8000 no esté siendo utilizado por otro servicio.
Contribuciones
Si deseas contribuir al proyecto, por favor sigue estos pasos:

Contribuciones
Haz un fork del repositorio.
Crea una rama con la nueva funcionalidad o corrección de errores.
Realiza tus cambios y haz un pull request.
Gracias por contribuir.


Este archivo `README.md` proporciona instrucciones detalladas para instalar y configurar el proyecto, junto con la explicación de los endpoints de la API y cómo ejecutarlos correctamente. El formato está adaptado para Markdown, de manera que se verá bien al visualizarse en plataformas como GitHub o cualquier editor que soporte Markdown.
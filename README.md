# Sistema de Gestión de Citas Médicas

¡Bienvenido al repositorio del proyecto web Sistema de Gestión de Citas Médicas! Aquí encontrarás toda la información y recursos necesarios para empezar con el despliegue y desarrollo.

## 🚀 Pasos iniciales para el despliegue del sistema de gestión de citas médicas

Si es la primera vez que despliegas este proyecto en un servidor o deseas ejecutarlo en tu entorno local para el sistema de gestión de citas médicas, sigue estos pasos:

1. 📦 Instalar dependencias PHP: `composer install` (asegúrate de tener Composer instalado en tu sistema).
2. 📦 Instalar dependencias Node/JS: `npm install` (asegúrate de tener Node.js y npm instalados).
3. 📦 Generar .env: `copy .env.example .env`

## Configurar migraciones y base de datos

Primero que nada, necesitas reemplazar esto en tu .env:

1. DB_CONNECTION=mysql
2. DB_HOST=localhost
3. DB_PORT=3307
4. DB_DATABASE=ingsoftdb
5. DB_USERNAME=root
6. DB_PASSWORD=root

Luego configuramos Docker

1. Ejecutar docker: `docker compose up -d`.

2. 📖 Ejecutar migraciones: `php artisan migrate:refresh`.

3. Generar clave de la aplicación: `php artisan key:generate`.

4. Para finalizar, generamos la clave JWT: `php artisan jwt:secret`.

5. Limpiar cache de la app: `php artisan config:clear`.

## 🏠 ¿Cómo correr el proyecto en mi entorno local?

Para arrancar el proyecto en tu entorno local, ejecuta los siguientes comandos:

1. 🌐 `php artisan serve` - Para levantar el servidor de Laravel.

Una vez ejecutados ambos comandos, puedes acceder al proyecto a través de la URL `http://127.0.0.1:8000/` o `http://localhost:8000/`.

## ⚙️ Comandos útiles

1. 🔄 Resetear base de datos y ejecutar seeder: `php artisan migrate:refresh --seed`.
2. 🧠 Utilizar Laravel Tinker: `php artisan tinker`.
3. 📍 Ejecutar un seeder específico: `php artisan db:seed --class=NombreClaseSeeder`.

## 👥 Ayudantes

👤 **David Alvarez**

-   💼 _FullStack Developer_
-   📧 [Email](mailto:david.alvarez@alumnos.ucn.cl)

👤 **Renato Morales**

-   💼 _FullStack Developer_
-   📧 [Email](mailto:renato.morales@alumnos.ucn.cl)

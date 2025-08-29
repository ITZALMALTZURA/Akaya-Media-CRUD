# Akaya Media CRUD - productos (Laravel)

Este proyecto es aplicación web desarrollada con **Laravel**, que incluye un módulo para la gestión de **productos**.

## Requisitos

- PHP >= 8.1
- Composer
- MySQL o PostgreSQL
- Laravel >= 10

## Instalación y ejecución

1. **Clonar el repositorio**

git clone https://github.com/ITZALMALTZURA/Akaya-Media-CRUD.git
cd Akaya-Media-CRUD

2. **Instalar dependencias (opccional)**
composer install

3. **Copiar y configurar archivo de entorno**
cp .env.example .env

Edita el archivo .env para establecer tus credenciales de base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=akaya-media
DB_USERNAME=root
DB_PASSWORD=tu_contraseña

4. **Ejecutar Migraciones**
php artisan migrate

5. **Ejecutar  seeders**
php artisan db:seed

6. **Levantar el servidor local**
php artisan serve
Accede a la app en http://127.0.0.1:8000

## Funcionalidades
Crear, Actualizar y Eliminar Productos

Vista web con Bootstrap para gestionar productos

## Endpoints RESTful
Método	Ruta	Descripción
GET	/products	Listar todas los productos
GET	/products/{id}	Mostrar un solo producto
POST	/products	Crear un nuevo producto
POST	/products/{id}	Actualizar un producto
DELETE	/products/{id}	Eliminar un producto

## Frontend
Incluye una vista con Blade + Bootstrap 5 que permite:

Ver productos en una tabla

Agregar nuevos productos mediante modal

Actualizar productos (AJAX)

Eliminar productos

## Licencia
Este proyecto está bajo la licencia MIT.

Desarrollado por ITZALMALTZURA

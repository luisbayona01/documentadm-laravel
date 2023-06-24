<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



https://www.youtube.com/watch?v=JLjSliIRZbo
PHP (versión 7.4 o superior)
Composer
Node.js (versión 14 o superior)
Angular CLI (versión 13)
Paso 1: Clonar el Repositorio
Clona el repositorio del proyecto desde el repositorio remoto utilizando el siguiente comando:
git clone https://github.com/luisbayona01/documentadm-laravel.git

Paso 2: Instalar las Dependencias de Laravel
Accede al directorio del proyecto Laravel y ejecuta el siguiente comando para instalar las dependencias de Laravel utilizando Composer:


cd documentadm-laravel
composer install
Paso 3: Configurar el Archivo .env
Copia el archivo .env.example y renómbralo como .env. A continuación, configura las variables de entorno en el archivo .env según tu entorno de desarrollo.
cp .env.example .env

Paso 4: Generar la Clave de Aplicación
Ejecuta el siguiente comando para generar la clave de aplicación en el archivo .env:

php artisan key:generate
Paso 5: Ejecutar las Migraciones
Si el proyecto utiliza una base de datos, ejecuta las migraciones de la base de datos , los seeders ,  ejecutar laravel passporp  y poner a correr el servidor dev de laravel con el siguiente comando:

 php artisan migrate:fresh --seed
 php artisan passport:install
 php  artisan  serve

Paso 6: Instalar las Dependencias de Angular
Accede al directorio frontend dentro del proyecto y ejecuta el siguiente comando para instalar las dependencias de Angular:

cd  frontadmdocment
npm install

ejecutar el servidor de  angular
ng  serve  



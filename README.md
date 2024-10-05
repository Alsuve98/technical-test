## Prueba Tecnica

Este proyecto es una prueba tecnica para la empresa [ks2](https://www.ks2.tech/), la cual consiste en la creación de un sistema de administración de vehiculos, el cual debe cumplir con los siguientes requerimientos:


- [x] Autenticación de usuarios usando Breeze
- [x] Proteger las rutas de la aplicación
- [x] Crear un seeder para poblar la base de datos
- [x] Crear un modelo de vehiculo y migraciones necesarias
- [x] Crear un CRUD de vehiculos

### Iniciar el proyecto

Para iniciar el proyecto se debe clonar el repositorio y ejecutar el siguiente comando en la raiz del proyecto:

```bash
composer install

npm install
npm run dev
#or
npm run prod

cp .env.example .env

sail up -d
```

### Migraciones y Seeders

Para crear las tablas y poblar la base de datos se debe ejecutar los siguientes comandos:

```bash
php artisan migrate

php artisan db:seed
```

### Acceso al sistema

Para acceder al sistema se debe ingresar a la siguiente URL:

```bash
http://localhost/login
```

### Usuario y contraseña

El usuario y contraseña por defecto es:

```bash
Usuario: technical.test@ks2.test
Contraseña: password
```
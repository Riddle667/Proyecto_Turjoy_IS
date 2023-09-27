# Instalación

Para la Instalación del proyecto se debe de tener instalado:

-   [Composer](https://getcomposer.org/)
-   [Xampp](https://www.apachefriends.org/es/index.html)
-   [MySQL Workbench](https://dev.mysql.com/downloads/mysql/)
-   [Node.js](https://nodejs.org/es) (Versión recomendada en la página)

Primero clonar el repositorio con el comando:

```bash
    git clone https://github.com/Riddle667/Proyecto_Turjoy_IS.git
```

**Importante:**
Abrir el proyecto en el Visual Studio Code, copiar el _".env.example"_ y pegarlo en el proyecto. Por último cambiarle el nombre a _".env"_.

Una vez hecho eso, proceder a abrir la consola y ejecutar los siguientes comandos en orden:

```bash
    composer install
    php artisan key:generate
```

Para la instalación de las librerias de node, necesarias para tailwind css, se ejecuta el siguiente comando:

```bash
    npm install
```

Una vez hecho esto, ya podemos ejecutar el proyecto. Para ejecutar el proyecto, en una terminal se debe ejecutar este comando:

```bash
    npm run dev
```

Y en la otra:

```bash
   php artisan serve
```

# Bases de datos

Para hacer las migraciones correspondientes y además utilizar los seeders primero es muy importante cambiar los siguientes parametros en el .env:

```bash
    DB_DATABASE=turjoy
    DB_USERNAME=root
    DB_PASSWORD="contraseña puesta por ustedes"
```

Finalmente en la consola ejecutan:

```bash
    php artisan migrate --seed
```

Con eso, tienen la base de datos con los datos correspondientes, y además migrada.

# Instalación

Para la Instalación del proyecto se debe de tener instalado:

-   [Composer 2.6.5](https://getcomposer.org/)
-   [Xampp 8.2.4](https://www.apachefriends.org/es/index.html)
-   [MySQL Workbench 8.1.0](https://dev.mysql.com/downloads/mysql/)
-   [Node.js 18.18.0](https://nodejs.org/es) (Versión LTS)

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

Una vez hecho esto, ya podemos ejecutar el proyecto. Para ejecutar el proyecto, debemos abrir dos terminales, en una terminal se debe ejecutar este comando:

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

# Errores comunes

En esta sección se enumeraran una lista de errores a la hora de ejecutar el proyecto y sus posibles soluciones:

-   Error 1: _Call to undefined function App\Http\Controllers\makeMessages()_
    -   Solución: Para solucionar este problema, debemos ir a la carpeta "vendor/autoload.php" y añadir la siguiente linea donde corresponda:
    ```bash
        require_once __DIR__ . '../../app/Helpers/MyHelpers.php';
    ```
-   Error 2: Un error común esta relacionado con la librería Laravel Excel, si es que llega salir el siguiente mensaje: **Class 'Maatwebsite\Excel\ExcelServiceProvider' not found**.
    -   Solución: Nos dirigiremos a la carpeta C:/xampp/php/php.ini, y buscaremos las extensiones. Debemos tener las extensiones "extension=gd" y "extension=zip" sin el punto y coma (;) al inicio de la linea. Una vez hecho esto, en la terminal se coloca:
    ```bash
        composer install
    ```
-   Error 3: Errores MySQL. En caso de tener un error del tipo MySQL, de cualquier tipo, generalmente a la hora de iniciar sesión.
    -   Solución: Recomiendo hacer las migraciones de nuevo con este comando:

```bash
    php artisan migrate:fresh --seed
```

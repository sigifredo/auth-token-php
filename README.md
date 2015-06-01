auth-token-php
==============

Instalación
------------

Para instalar la página web es necesario seguir los siguientes pasos:

Descargar el código fuente:

```
$ git clone git@github.com:sigifredo/auth-token-php.git
```

Instalar las dependencias:

```
$ cd catalogo/
$ php composer.phar self-update
$ php composer.phar install
```

Configuración de Apache
-----------------------

Es necesario crear un host virtual en el archivo de configuración de Apache. En Debian 8 el archivo es `/etc/apache2/apache2.conf`.

    <Directory "<ruta del directorio 'public' dentro de /var/www/">
      AllowOverride All
      Options All
    </Directory>

Nota
----

La versión de PHP que soporta Zend Framework 2 es la 5.3.

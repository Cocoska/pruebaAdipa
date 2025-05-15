<<<<<<< HEAD
Themosis framework
==================

[![Build Status](https://travis-ci.org/themosis/themosis.svg?branch=dev)](https://travis-ci.org/themosis/themosis)

The Themosis framework is a tool aimed to WordPress developers of any levels. But the better WordPress and PHP knowledge you have the easier it is to work with.

Themosis framework is a tool to help you develop websites and web applications faster using [WordPress](https://wordpress.org). Using an elegant and simple code syntax, Themosis framework helps you structure and organize your code and allows you to better manage and scale your WordPress websites and applications.

Installation
------------
Please see the [installation section](https://framework.themosis.com/docs/master/installation/) of the Themosis documentation.

Development team
----------------
The framework was created by [Julien Lambé](https://www.themosis.com/), who continues to lead the development.

Contributing
------------
Any help is appreciated. The project is open-source and we encourage you to participate. You can contribute to the project in multiple ways by:

- Reporting a bug issue
- Suggesting features
- Sending a pull request with code fix or feature
- Following the project on [GitHub](https://github.com/themosis)
- Following us on Twitter: [@Themosis](https://twitter.com/Themosis)
- Sharing the project around your community

For details about contributing to the framework, please check the [contribution guide](https://framework.themosis.com/docs/master/contributing).

License
-------
The Themosis framework is open-source software licensed under [GPL-2+ license](http://www.gnu.org/licenses/gpl-2.0.html).
=======
# pruebaAdipa
>>>>>>> 25325d626c1cc439f1fddd77a62fd0f26f12a108
## Descripción
Este proyecto es una aplicación basada en Laravel que permite gestionar usuarios con roles específicos. Los usuarios pueden ser administradores o usuarios normales, y el acceso a las funcionalidades depende de su rol.

## Iniciar el proyecto
Para iniciar el proyecto, sigue estos pasos:

1. Abre una terminal en la raíz del proyecto.
2. Ejecuta el siguiente comando para iniciar el servidor:

    php artisan serve --port 8082

3. Abre la siguiente URL en tu navegador para acceder al sitio:

    http://localhost:8082/login/

## Funcionalidad del login

* Nuevo RUT: .
    Si se ingresa un RUT que no existe en la base de datos, el sistema redirige a la vista de creación de usuario.
* RUT existente:
    - Si el usuario no es administrador, podrá visualizar la información correspondiente al RUT ingresado y tendrá la opción de modificar únicamente su propia información.
    - Si el usuario es administrador, podrá:
        - Visualizar todos los usuarios.
        - Modificar la información de cualquier usuario.
        - Agregar nuevos usuarios.
        - Eliminar usuarios.

## Bases de datos utilizadas
El proyecto utiliza dos bases de datos:

1. wp_usuarios: 
    Almacena la información de los usuarios, como nombre, apellido, RUT y fecha de nacimiento.
2. wp_rol: 
    Define el rol de cada usuario según su RUT. Si el campo administrador está en 1, el usuario tiene rol de administrador; de lo contrario, es un usuario normal.

## Notas

* Asegúrate de configurar correctamente las conexiones a las bases de datos en el archivo .env.
* El sistema valida el RUT ingresado tanto en el cliente como en el servidor para garantizar que sea válido.
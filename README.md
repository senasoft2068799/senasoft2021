## Instalación

<h1>Para instalar:</h1>
<small>(Se debe tener laravel 8 y vue 3 instalados previamente)</small>
<ul>
    <li>git clone -b «branchname» https://github.com/senasoft2068799/senasoft2021.git</li>
    <li>cd senasoft2021</li>
    <li>composer install</li>
    <li>npm install</li>
    <li>cp .env.example .env</li>
    <li>php artisan key:generate</li>
    <li>» Crear base de datos vacía</li>
    <li>» Añadir información de la base de datos en el archivo .env</li>
    <li>php artisan migrate:fresh --seed</li>
</ul>

<h2>Para iniciar:</h1>
<ul>
    <li>php artisan serve</li>
    <li>npm run watch</li>
</ul>

<h1>Tecnologías usadas en este proyecto</h1>
<ul>
    <li>Vuejs 3<i class="fab fa-vuejs"></i></li>
    <li>Laravel 8<i class="fab fa-laravel"></i></li>
</ul>

<h1>Base de datos usada en este proyecto</h1>
<p>Este es un modelo entidad relación, el cual nos permite visualizar la base de datos para el desarrollo del juego de una forma más detallada.</p>

<h1>DFD (Diagrama de Flujo de Datos)</h1>
<p>Los DFD o Diagrama de Flujo de Datos nos permite trazar y visualizar el flujo de la información que se maneja en el juego, en este existen 3 niveles:</p>
<ul>
    <li>Nivel 0: es un diagrama que nos permite ver el flujo de una forma general.</li>
    <li>Nivel 1: es un diagrama que nos permite ver el flujo de una forma un poco más detalla, en esta se pueden ver los principales componentes y como interactuan entre ellos.</li>
    <li>Nivel 2: es un diagrama que nos permite ver el flujo de datos en los componentes que existen.</li>
</ul>

<h2>Para mayor información acerca de nuestra docuemtación, dar clic al siguiente enlace: https://drive.google.com/drive/folders/1dOyO9AoXh--q9mtaRzqECq0lZ_bEPzYP?usp=sharing</h2>

<hr/>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

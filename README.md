# PHP-Laravel-8-ECommerce

[![Github][github-shield]][github-url]
[![Kofi][kofi-shield]][kofi-url]
[![LinkedIn][linkedin-shield]][linkedin-url]
[![Khanakat][khanakat-shield]][khanakat-url]

## 📓 TABLA DE CONTENIDO

* [Acerca del proyecto](#acerca-del-proyecto)
* [Instalación](#instalación)
* [Licencia](#licencia)

## 🔥 ACERCA DEL PROYECTO

Este proyecto es una muestra de una solución base de `e-commerce` utilizando `PHP Laravel 8`.

## ⚙️ INSTALACIÓN

Clonar el repositorio.

```bash
gh repo clone FernandoCalmet/php-laravel-8-ecommerce
```

## Comandos utilizados

```bash
# Crear proyecto
composer create-project laravel/laravel laravel8ecommerce

# Agregar Livewire a las dependencias
composer require livewire/livewire

# Crear los componentes de Livewire
php artisan make:livewire HomeComponent
php artisan make:livewire ShopComponent
php artisan make:livewire CartComponent
php artisan make:livewire CheckoutComponent
php artisan make:livewire AboutUsComponent
php artisan make:livewire ContactUsComponent
php artisan make:livewire PrivacyPolicyComponent
php artisan make:livewire TermsConditionsComponent
php artisan make:livewire ReturnPolicyComponent

# Agregar Jetstream a las dependencias
composer require laravel/Jetstream

# Instalar Jetstream
php artisan jetstream:install livewire

# Ejecutar migraciones
php artisan migrate

# Mix Manifest File
npm install
npm run dev

# Instalar tailwindcss para las paginas de login y registro
npm install tailwindcss
npx tailwindcss init
npm run dev

# Crear middleware para administrador
php artisan make:middleware AuthAdmin

# Agregar componentes de livewire para el dashboard de los roles
php artisan make:livewire admin/AdminDashboardComponent
php artisan make:livewire user/UserDashboardComponent

# Agregar modelos
php artisan make:model Category -m
php artisan make:model Product -m

# Ejecutar migraciones luego de editar los modelos
php artisan migrate

# Crear factory para los modelos creados
php artisan make:factory CategoryFactory --model=Category
php artisan make:factory ProductFactory --model=Product

# Luego de editar los factory y el seeder realizamos ejecutamos el seed
php artisan db:seed

# Agregar componente livewire para detalles de productos
php artisan make:livewire DetailsComponent

# Agregar hardevine a las dependencias para el carrito de compras
composer require hardevine/shoppingcart
# Luego de actualizar el config de app con el carrito de Gloudeman
php artisan vendor:publish --provider="Gloudeman\ShoppingcartServiceProvider" --tag="config"

# Crear componente livewire para categorias de productos
php artisan make:livewire CategoryComponent

# Crear componente livewire para busquedas
php artisan make:livewire HeaderSearchComponent
php artisan make:livewire SearchComponent
```

## Agregar el handle de autenticación a los roles

> Editar el archivo 'vendor/laravel/fortify/src/Actions/AttempToAuthenticate.php'

```php
public function handle($request, $next)
{
    if (Fortify::$authenticateUsingCallback) {
        return $this->handleUsingCustomCallback($request, $next);
    }

    if ($this->guard->attempt(
        $request->only(Fortify::username(), 'password'),
        $request->filled('remember'))
    ) {
        if(Auth::user()->utype === 'ADM'){
            session(['utype'=>'ADM']);
            return redirect(RouteServiceProvider::HOME);
        }
        else if(Auth::user()->utype === 'USR'){
            session(['utype'=>'USR']);
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }

    $this->throwFailedAuthenticationException($request);
}
```

## 📄 LICENCIA

Este proyecto está bajo la Licencia (Licencia MIT) - mire el archivo [LICENSE](LICENSE) para más detalles.

## ⭐️ DAME UNA ESTRELLA

Si esta Implementación le resultó útil o la utilizó en sus Proyectos, déle una estrella. ¡Gracias! O, si te sientes realmente generoso, [¡Apoye el proyecto con una pequeña contribución!](https://ko-fi.com/fernandocalmet).

<!--- reference style links --->
[github-shield]: https://img.shields.io/badge/-@fernandocalmet-%23181717?style=flat-square&logo=github
[github-url]: https://github.com/fernandocalmet
[kofi-shield]: https://img.shields.io/badge/-@fernandocalmet-%231DA1F2?style=flat-square&logo=kofi&logoColor=ff5f5f
[kofi-url]: https://ko-fi.com/fernandocalmet
[linkedin-shield]: https://img.shields.io/badge/-fernandocalmet-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/fernandocalmet
[linkedin-url]: https://www.linkedin.com/in/fernandocalmet
[khanakat-shield]: https://img.shields.io/badge/khanakat.com-brightgreen?style=flat-square
[khanakat-url]: https://khanakat.com

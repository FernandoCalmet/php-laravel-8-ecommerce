# Laravel 8 E-Commerce

Aprendizaje de Laravel 8 empezando desde lo básico a conceptos avanzados con ejemplos.

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

---

:octocat: [Check more about my repositories.](https://github.com/FernandoCalmet)

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/T6T41JKMI)

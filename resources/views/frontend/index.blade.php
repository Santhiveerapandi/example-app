<x-app-web-layout>
    <x-slot:title>
        K.Santhiveerapandi Laravel 10 Application
    </x-slot>
    <div class="py-5">
        <div class="container">
            <h1>Welcome to Laravel 10 layout creation</h1>
                <p>Create a new layout<br/>
                php artisan make:component AppWebLayout<br/>
                move the resources/views/components/app-web-layout.blade.php to 
                resources/views/layouts/app-web-layout.blade.php</p>

                <pre>modify the App/View/Components/AppWebLayout.php 
                public function render(): View|Closure|string
                {
                    return view('layouts.app-web-layout');
                }

                then call the view file  resources/views/frontend/index.blade.php
                in route section of web.php
                </pre>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            console.log("This is my script area");
        </script>
    </x-slot>
</x-app-web-layout>
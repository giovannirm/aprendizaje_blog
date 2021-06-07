<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>

    @php
        $color = 'red';
        $alert = 'alert2';
    @endphp

    <body>
        <div class="container mx-auto">
            {{-- <x-alert color="green"> --}}
            <x-alert :color="$color" class="mb-4 mx-6">
                
                <x-slot name="title">
                    Título 1
                </x-slot>

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, voluptates molestias! Omnis eos obcaecati mollitia blanditiis nam natus expedita, dolores itaque unde? Quia et, doloremque porro consequuntur officiis cumque nam.
            </x-alert>
            {{-- <x-alert>

                <x-slot name="title">
                    Título 2
                </x-slot>

                Hola mundo
            </x-alert> --}}

            <x-alert2 color="blue" class="m-6">

                <x-slot name="title">
                    Título de prueba
                </x-slot>

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nemo et ullam modi distinctio eius, cum eaque corrupti. Eaque quam, non harum sunt repudiandae nobis molestiae officia fugit ea reprehenderit?
            </x-alert2>

            {{-- <x-alert2>
                
                <x-slot name="title">
                    Título de prueba
                </x-slot>
                Habla loco
            </x-alert2> --}}

            <x-dynamic-component :color="$color" class="m-6" :component="$alert">
                <x-slot name="title">
                    Título de prueba
                </x-slot>

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nemo et ullam modi distinctio eius, cum eaque corrupti. Eaque quam, non harum sunt repudiandae nobis molestiae officia fugit ea reprehenderit?
            </x-dynamic-component>

            <x-dynamic-component class="m-6" :component="$alert">
                <x-slot name="title">
                    Título de prueba
                </x-slot>

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nemo et ullam modi distinctio eius, cum eaque corrupti. Eaque quam, non harum sunt repudiandae nobis molestiae officia fugit ea reprehenderit?
            </x-dynamic-component>
        </div>
    </body>    
</html>
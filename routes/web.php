<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    /*
        Cosas que se
            - Kilometraje del auto a cierta fecha
            - Distintas cargas de kilometrajes
            - Estimado por el usuario de km recorridos mensualmente

        Cosas que tengo que averiguar
            - Calcular kilometraje mensual recorrido en los ultimos 12 meses.
            - Kilometraje del auto al día de hoy
    */

    /** @var \CarMaintenance\Factories\Entities\CarFactory $carFactory */
    $carFactory = app(\CarMaintenance\Factories\Entities\CarFactory::class);
    $car = $carFactory->fake();
    dd($car);
});

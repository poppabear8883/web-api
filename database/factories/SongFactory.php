<?php

use App\Sku;
use App\Song;
use App\FlacFile;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Song::class, function (Faker $faker) {

    return [
        'name' => $faker->company,
        'alt_name' => $faker->company,
        'flac_file_id' => function() {
            return factory(FlacFile::class)->create()->id;
        },
        'track_number' => null, // passed during creation
        'preview_start' => $faker->numberBetween(0, 60),
        'is_active' => $faker->boolean(85),
        'sku_id' => function() {
            return factory(Sku::class)->create()->id;
        },
        'album_id' => null, // passed during creation
        #'is_in_back_catalog' => $faker->boolean(95),
    ];
});

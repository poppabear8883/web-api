<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabaseSeeder;
use App\Sku;
use App\Song;

class SkuModelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Ensure that any random Sku has one or more Songs.
     *
     * @return void
     */
    public function test_song_randomSku_hasManySongs()
    {
        $this->assertInstanceOf(Song::class, Sku::inRandomOrder()->first()->songs->first());
    }
}
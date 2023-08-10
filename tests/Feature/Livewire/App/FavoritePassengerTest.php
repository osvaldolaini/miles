<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\FavoritePassenger;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FavoritePassengerTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(FavoritePassenger::class);

        $component->assertStatus(200);
    }
}

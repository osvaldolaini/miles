<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\AccountPassengers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AccountPassengersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(AccountPassengers::class);

        $component->assertStatus(200);
    }
}

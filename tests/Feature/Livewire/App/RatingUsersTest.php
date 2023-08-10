<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\RatingUsers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RatingUsersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(RatingUsers::class);

        $component->assertStatus(200);
    }
}

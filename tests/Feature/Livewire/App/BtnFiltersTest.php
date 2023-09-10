<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\BtnFilters;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BtnFiltersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(BtnFilters::class);

        $component->assertStatus(200);
    }
}

<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\DemandListFilters;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DemandListFiltersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DemandListFilters::class);

        $component->assertStatus(200);
    }
}

<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\DemandView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DemandViewTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DemandView::class);

        $component->assertStatus(200);
    }
}

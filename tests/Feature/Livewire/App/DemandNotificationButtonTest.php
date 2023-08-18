<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\DemandNotificationButton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DemandNotificationButtonTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DemandNotificationButton::class);

        $component->assertStatus(200);
    }
}

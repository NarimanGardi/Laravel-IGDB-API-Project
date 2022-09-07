<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function the_game_page_shows_correct_page_info()
    {
       $response = $this->get(route('game.show', 'the-last-of-us-part-two-remastered'));
       $response->assertStatus(200);
    }
}

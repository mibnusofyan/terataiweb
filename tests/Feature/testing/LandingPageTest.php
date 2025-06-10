<?php

namespace Tests\Feature;

use Tests\TestCase;
class LandingPageTest extends TestCase
{
    public function test_landing_page_is_accessible_without_authentication()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Menara Pandang Teratai');
    }
}

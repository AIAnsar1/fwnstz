<?php

namespace Tests\Feature\Advertisements;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAdvertisementsShowRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Advertisements_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}

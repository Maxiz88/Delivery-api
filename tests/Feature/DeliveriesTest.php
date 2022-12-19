<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class DeliveriesTest extends TestCase
{
    /**
        @test
     */
    public function test_deliveries_index()
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->get('api/deliveries')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'company_name',
                        'description',
                        'currency',
                        'units'
                    ]
                ]
            ]);
    }

    /**
    @test
     */
    public function test_deliveries_update()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->putJson('api/deliveries/1',
                [
                    'company_name' => 'FRG',
                    'description' => 'Operating in more than 220 countries and territories',
                    'currency_id' => 1,
                ])
            ->assertStatus(200);
    }

    /**
    @test
     */
    public function test_delivery_unit_update()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->putJson('api/deliveries/1/unit/1',
                [
                    'unit_type' => 1,
                    'unit_value' => 10.5,
                    'unit_from' => 0,
                    'unit_to' => 1,
                    'price' => 4,
                    'unit_id' => 2
                ])
            ->assertStatus(200);
    }

    /**
    @test
     */
    public function test_deliveries_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->postJson('api/deliveries',
                [
                    'company_name' => 'ABC',
                    'description' => 'Operating in more than 220 countries and territories',
                    'currency_id' => 1,
                ])
            ->assertStatus(200);
    }

    /**
    @test
     */
    public function test_delivery_unit_store()
    {
        $user = User::factory()->create();
        $this
            ->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->postJson('api/deliveries/1/unit',
                [
                    'unit_type' => 1,
                    'unit_value' => 5.5,
                    'unit_from' => 0,
                    'unit_to' => 1,
                    'price' => 3,
                    'unit_id' => 2
                ])
            ->assertStatus(200);
    }
}


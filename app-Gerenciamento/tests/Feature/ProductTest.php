<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function it_can_create_a_product(){
        $data = [
            'nome' => 'Produto teste',
            'descricao' => 'Descricao teste',
            'valor' => 200.00,
            'disponivel' => true,
        ];

        $response = $this->post('/products', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('produtos', $data);
    }

    /** @test */
    public function it_can_read_a_product(){
        $product = Product::factory()->create();

        $response = $this->get('/products/' . $product->id);

        $response->assertStatus(200);
        $response->assertJson($product->toArray());
    }



}

<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Clientphysique;

class ClientphysiqueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/clientphysiques', $clientphysique
        );

        $this->assertApiResponse($clientphysique);
    }

    /**
     * @test
     */
    public function test_read_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/clientphysiques/'.$clientphysique->id
        );

        $this->assertApiResponse($clientphysique->toArray());
    }

    /**
     * @test
     */
    public function test_update_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->create();
        $editedClientphysique = factory(Clientphysique::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/clientphysiques/'.$clientphysique->id,
            $editedClientphysique
        );

        $this->assertApiResponse($editedClientphysique);
    }

    /**
     * @test
     */
    public function test_delete_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/clientphysiques/'.$clientphysique->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/clientphysiques/'.$clientphysique->id
        );

        $this->response->assertStatus(404);
    }
}

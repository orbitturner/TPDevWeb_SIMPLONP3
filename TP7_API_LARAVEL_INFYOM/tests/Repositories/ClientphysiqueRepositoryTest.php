<?php namespace Tests\Repositories;

use App\Models\Clientphysique;
use App\Repositories\ClientphysiqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientphysiqueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientphysiqueRepository
     */
    protected $clientphysiqueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientphysiqueRepo = \App::make(ClientphysiqueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->make()->toArray();

        $createdClientphysique = $this->clientphysiqueRepo->create($clientphysique);

        $createdClientphysique = $createdClientphysique->toArray();
        $this->assertArrayHasKey('id', $createdClientphysique);
        $this->assertNotNull($createdClientphysique['id'], 'Created Clientphysique must have id specified');
        $this->assertNotNull(Clientphysique::find($createdClientphysique['id']), 'Clientphysique with given id must be in DB');
        $this->assertModelData($clientphysique, $createdClientphysique);
    }

    /**
     * @test read
     */
    public function test_read_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->create();

        $dbClientphysique = $this->clientphysiqueRepo->find($clientphysique->id);

        $dbClientphysique = $dbClientphysique->toArray();
        $this->assertModelData($clientphysique->toArray(), $dbClientphysique);
    }

    /**
     * @test update
     */
    public function test_update_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->create();
        $fakeClientphysique = factory(Clientphysique::class)->make()->toArray();

        $updatedClientphysique = $this->clientphysiqueRepo->update($fakeClientphysique, $clientphysique->id);

        $this->assertModelData($fakeClientphysique, $updatedClientphysique->toArray());
        $dbClientphysique = $this->clientphysiqueRepo->find($clientphysique->id);
        $this->assertModelData($fakeClientphysique, $dbClientphysique->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_clientphysique()
    {
        $clientphysique = factory(Clientphysique::class)->create();

        $resp = $this->clientphysiqueRepo->delete($clientphysique->id);

        $this->assertTrue($resp);
        $this->assertNull(Clientphysique::find($clientphysique->id), 'Clientphysique should not exist in DB');
    }
}

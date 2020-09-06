<?php namespace Tests\Repositories;

use App\Models\Compteepsx;
use App\Repositories\CompteepsxRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CompteepsxRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CompteepsxRepository
     */
    protected $compteepsxRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->compteepsxRepo = \App::make(CompteepsxRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->make()->toArray();

        $createdCompteepsx = $this->compteepsxRepo->create($compteepsx);

        $createdCompteepsx = $createdCompteepsx->toArray();
        $this->assertArrayHasKey('id', $createdCompteepsx);
        $this->assertNotNull($createdCompteepsx['id'], 'Created Compteepsx must have id specified');
        $this->assertNotNull(Compteepsx::find($createdCompteepsx['id']), 'Compteepsx with given id must be in DB');
        $this->assertModelData($compteepsx, $createdCompteepsx);
    }

    /**
     * @test read
     */
    public function test_read_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->create();

        $dbCompteepsx = $this->compteepsxRepo->find($compteepsx->id);

        $dbCompteepsx = $dbCompteepsx->toArray();
        $this->assertModelData($compteepsx->toArray(), $dbCompteepsx);
    }

    /**
     * @test update
     */
    public function test_update_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->create();
        $fakeCompteepsx = factory(Compteepsx::class)->make()->toArray();

        $updatedCompteepsx = $this->compteepsxRepo->update($fakeCompteepsx, $compteepsx->id);

        $this->assertModelData($fakeCompteepsx, $updatedCompteepsx->toArray());
        $dbCompteepsx = $this->compteepsxRepo->find($compteepsx->id);
        $this->assertModelData($fakeCompteepsx, $dbCompteepsx->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->create();

        $resp = $this->compteepsxRepo->delete($compteepsx->id);

        $this->assertTrue($resp);
        $this->assertNull(Compteepsx::find($compteepsx->id), 'Compteepsx should not exist in DB');
    }
}

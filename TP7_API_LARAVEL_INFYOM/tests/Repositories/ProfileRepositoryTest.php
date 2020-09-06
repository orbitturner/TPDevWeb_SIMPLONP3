<?php namespace Tests\Repositories;

use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProfileRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfileRepository
     */
    protected $profileRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->profileRepo = \App::make(ProfileRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_profile()
    {
        $profile = factory(Profile::class)->make()->toArray();

        $createdProfile = $this->profileRepo->create($profile);

        $createdProfile = $createdProfile->toArray();
        $this->assertArrayHasKey('id', $createdProfile);
        $this->assertNotNull($createdProfile['id'], 'Created Profile must have id specified');
        $this->assertNotNull(Profile::find($createdProfile['id']), 'Profile with given id must be in DB');
        $this->assertModelData($profile, $createdProfile);
    }

    /**
     * @test read
     */
    public function test_read_profile()
    {
        $profile = factory(Profile::class)->create();

        $dbProfile = $this->profileRepo->find($profile->id);

        $dbProfile = $dbProfile->toArray();
        $this->assertModelData($profile->toArray(), $dbProfile);
    }

    /**
     * @test update
     */
    public function test_update_profile()
    {
        $profile = factory(Profile::class)->create();
        $fakeProfile = factory(Profile::class)->make()->toArray();

        $updatedProfile = $this->profileRepo->update($fakeProfile, $profile->id);

        $this->assertModelData($fakeProfile, $updatedProfile->toArray());
        $dbProfile = $this->profileRepo->find($profile->id);
        $this->assertModelData($fakeProfile, $dbProfile->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_profile()
    {
        $profile = factory(Profile::class)->create();

        $resp = $this->profileRepo->delete($profile->id);

        $this->assertTrue($resp);
        $this->assertNull(Profile::find($profile->id), 'Profile should not exist in DB');
    }
}

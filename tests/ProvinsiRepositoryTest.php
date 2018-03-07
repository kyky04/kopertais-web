<?php

use App\Models\Provinsi;
use App\Repositories\ProvinsiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinsiRepositoryTest extends TestCase
{
    use MakeProvinsiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProvinsiRepository
     */
    protected $provinsiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->provinsiRepo = App::make(ProvinsiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProvinsi()
    {
        $provinsi = $this->fakeProvinsiData();
        $createdProvinsi = $this->provinsiRepo->create($provinsi);
        $createdProvinsi = $createdProvinsi->toArray();
        $this->assertArrayHasKey('id', $createdProvinsi);
        $this->assertNotNull($createdProvinsi['id'], 'Created Provinsi must have id specified');
        $this->assertNotNull(Provinsi::find($createdProvinsi['id']), 'Provinsi with given id must be in DB');
        $this->assertModelData($provinsi, $createdProvinsi);
    }

    /**
     * @test read
     */
    public function testReadProvinsi()
    {
        $provinsi = $this->makeProvinsi();
        $dbProvinsi = $this->provinsiRepo->find($provinsi->id);
        $dbProvinsi = $dbProvinsi->toArray();
        $this->assertModelData($provinsi->toArray(), $dbProvinsi);
    }

    /**
     * @test update
     */
    public function testUpdateProvinsi()
    {
        $provinsi = $this->makeProvinsi();
        $fakeProvinsi = $this->fakeProvinsiData();
        $updatedProvinsi = $this->provinsiRepo->update($fakeProvinsi, $provinsi->id);
        $this->assertModelData($fakeProvinsi, $updatedProvinsi->toArray());
        $dbProvinsi = $this->provinsiRepo->find($provinsi->id);
        $this->assertModelData($fakeProvinsi, $dbProvinsi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProvinsi()
    {
        $provinsi = $this->makeProvinsi();
        $resp = $this->provinsiRepo->delete($provinsi->id);
        $this->assertTrue($resp);
        $this->assertNull(Provinsi::find($provinsi->id), 'Provinsi should not exist in DB');
    }
}

<?php

use App\Models\Kota;
use App\Repositories\KotaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KotaRepositoryTest extends TestCase
{
    use MakeKotaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KotaRepository
     */
    protected $kotaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kotaRepo = App::make(KotaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKota()
    {
        $kota = $this->fakeKotaData();
        $createdKota = $this->kotaRepo->create($kota);
        $createdKota = $createdKota->toArray();
        $this->assertArrayHasKey('id', $createdKota);
        $this->assertNotNull($createdKota['id'], 'Created Kota must have id specified');
        $this->assertNotNull(Kota::find($createdKota['id']), 'Kota with given id must be in DB');
        $this->assertModelData($kota, $createdKota);
    }

    /**
     * @test read
     */
    public function testReadKota()
    {
        $kota = $this->makeKota();
        $dbKota = $this->kotaRepo->find($kota->id);
        $dbKota = $dbKota->toArray();
        $this->assertModelData($kota->toArray(), $dbKota);
    }

    /**
     * @test update
     */
    public function testUpdateKota()
    {
        $kota = $this->makeKota();
        $fakeKota = $this->fakeKotaData();
        $updatedKota = $this->kotaRepo->update($fakeKota, $kota->id);
        $this->assertModelData($fakeKota, $updatedKota->toArray());
        $dbKota = $this->kotaRepo->find($kota->id);
        $this->assertModelData($fakeKota, $dbKota->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKota()
    {
        $kota = $this->makeKota();
        $resp = $this->kotaRepo->delete($kota->id);
        $this->assertTrue($resp);
        $this->assertNull(Kota::find($kota->id), 'Kota should not exist in DB');
    }
}

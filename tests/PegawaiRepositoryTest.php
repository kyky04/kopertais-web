<?php

use App\Models\Pegawai;
use App\Repositories\PegawaiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PegawaiRepositoryTest extends TestCase
{
    use MakePegawaiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PegawaiRepository
     */
    protected $pegawaiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pegawaiRepo = App::make(PegawaiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePegawai()
    {
        $pegawai = $this->fakePegawaiData();
        $createdPegawai = $this->pegawaiRepo->create($pegawai);
        $createdPegawai = $createdPegawai->toArray();
        $this->assertArrayHasKey('id', $createdPegawai);
        $this->assertNotNull($createdPegawai['id'], 'Created Pegawai must have id specified');
        $this->assertNotNull(Pegawai::find($createdPegawai['id']), 'Pegawai with given id must be in DB');
        $this->assertModelData($pegawai, $createdPegawai);
    }

    /**
     * @test read
     */
    public function testReadPegawai()
    {
        $pegawai = $this->makePegawai();
        $dbPegawai = $this->pegawaiRepo->find($pegawai->id);
        $dbPegawai = $dbPegawai->toArray();
        $this->assertModelData($pegawai->toArray(), $dbPegawai);
    }

    /**
     * @test update
     */
    public function testUpdatePegawai()
    {
        $pegawai = $this->makePegawai();
        $fakePegawai = $this->fakePegawaiData();
        $updatedPegawai = $this->pegawaiRepo->update($fakePegawai, $pegawai->id);
        $this->assertModelData($fakePegawai, $updatedPegawai->toArray());
        $dbPegawai = $this->pegawaiRepo->find($pegawai->id);
        $this->assertModelData($fakePegawai, $dbPegawai->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePegawai()
    {
        $pegawai = $this->makePegawai();
        $resp = $this->pegawaiRepo->delete($pegawai->id);
        $this->assertTrue($resp);
        $this->assertNull(Pegawai::find($pegawai->id), 'Pegawai should not exist in DB');
    }
}

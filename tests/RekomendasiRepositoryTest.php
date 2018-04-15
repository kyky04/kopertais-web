<?php

use App\Models\Rekomendasi;
use App\Repositories\RekomendasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RekomendasiRepositoryTest extends TestCase
{
    use MakeRekomendasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RekomendasiRepository
     */
    protected $rekomendasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rekomendasiRepo = App::make(RekomendasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRekomendasi()
    {
        $rekomendasi = $this->fakeRekomendasiData();
        $createdRekomendasi = $this->rekomendasiRepo->create($rekomendasi);
        $createdRekomendasi = $createdRekomendasi->toArray();
        $this->assertArrayHasKey('id', $createdRekomendasi);
        $this->assertNotNull($createdRekomendasi['id'], 'Created Rekomendasi must have id specified');
        $this->assertNotNull(Rekomendasi::find($createdRekomendasi['id']), 'Rekomendasi with given id must be in DB');
        $this->assertModelData($rekomendasi, $createdRekomendasi);
    }

    /**
     * @test read
     */
    public function testReadRekomendasi()
    {
        $rekomendasi = $this->makeRekomendasi();
        $dbRekomendasi = $this->rekomendasiRepo->find($rekomendasi->id);
        $dbRekomendasi = $dbRekomendasi->toArray();
        $this->assertModelData($rekomendasi->toArray(), $dbRekomendasi);
    }

    /**
     * @test update
     */
    public function testUpdateRekomendasi()
    {
        $rekomendasi = $this->makeRekomendasi();
        $fakeRekomendasi = $this->fakeRekomendasiData();
        $updatedRekomendasi = $this->rekomendasiRepo->update($fakeRekomendasi, $rekomendasi->id);
        $this->assertModelData($fakeRekomendasi, $updatedRekomendasi->toArray());
        $dbRekomendasi = $this->rekomendasiRepo->find($rekomendasi->id);
        $this->assertModelData($fakeRekomendasi, $dbRekomendasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRekomendasi()
    {
        $rekomendasi = $this->makeRekomendasi();
        $resp = $this->rekomendasiRepo->delete($rekomendasi->id);
        $this->assertTrue($resp);
        $this->assertNull(Rekomendasi::find($rekomendasi->id), 'Rekomendasi should not exist in DB');
    }
}

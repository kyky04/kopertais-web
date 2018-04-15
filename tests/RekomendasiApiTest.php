<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RekomendasiApiTest extends TestCase
{
    use MakeRekomendasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRekomendasi()
    {
        $rekomendasi = $this->fakeRekomendasiData();
        $this->json('POST', '/api/v1/rekomendasis', $rekomendasi);

        $this->assertApiResponse($rekomendasi);
    }

    /**
     * @test
     */
    public function testReadRekomendasi()
    {
        $rekomendasi = $this->makeRekomendasi();
        $this->json('GET', '/api/v1/rekomendasis/'.$rekomendasi->id);

        $this->assertApiResponse($rekomendasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRekomendasi()
    {
        $rekomendasi = $this->makeRekomendasi();
        $editedRekomendasi = $this->fakeRekomendasiData();

        $this->json('PUT', '/api/v1/rekomendasis/'.$rekomendasi->id, $editedRekomendasi);

        $this->assertApiResponse($editedRekomendasi);
    }

    /**
     * @test
     */
    public function testDeleteRekomendasi()
    {
        $rekomendasi = $this->makeRekomendasi();
        $this->json('DELETE', '/api/v1/rekomendasis/'.$rekomendasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rekomendasis/'.$rekomendasi->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PegawaiApiTest extends TestCase
{
    use MakePegawaiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePegawai()
    {
        $pegawai = $this->fakePegawaiData();
        $this->json('POST', '/api/v1/pegawais', $pegawai);

        $this->assertApiResponse($pegawai);
    }

    /**
     * @test
     */
    public function testReadPegawai()
    {
        $pegawai = $this->makePegawai();
        $this->json('GET', '/api/v1/pegawais/'.$pegawai->id);

        $this->assertApiResponse($pegawai->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePegawai()
    {
        $pegawai = $this->makePegawai();
        $editedPegawai = $this->fakePegawaiData();

        $this->json('PUT', '/api/v1/pegawais/'.$pegawai->id, $editedPegawai);

        $this->assertApiResponse($editedPegawai);
    }

    /**
     * @test
     */
    public function testDeletePegawai()
    {
        $pegawai = $this->makePegawai();
        $this->json('DELETE', '/api/v1/pegawais/'.$pegawai->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pegawais/'.$pegawai->id);

        $this->assertResponseStatus(404);
    }
}

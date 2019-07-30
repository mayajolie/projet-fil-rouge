<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WaricontrollerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/partenaires');
         $jsonstring = "[
                  {
                     \"id\": 1,
                     \"raisonSocial\": \"sonatel\",
                     \"ninea\": \"sona1235874587\",
                     \"adresse\": \"mermoz\",
                     \"telephone\": 338645897,
                     \"compteBancaires\": [],
                     \"etat\": \"debloquer\"
                 }
              ]";
        $rep = $client->getResponse();
        $this->assertSame(200, $client->getResponse()->getStatuscode());
        $this->assertJsonStringEqualsJsonString($jsonstring, $rep->getContent());
    }

    public function testAjoutP()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/api/ajout',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"raisonSocial":"gayeSA","ninea": "ga33","adresse": "Ouakam","telephone": 333658401,"etat": "debloquer"}');
        $rep = $client->getResponse();
        var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
}

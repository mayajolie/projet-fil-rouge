<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WaricontrollerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/partenaires');
            $jsonstring= "[
                {
                     \"id\": 1,
                     \"raisonSocial\": \"orangemoney\",
                     \"ninea\": \"456611222221\",
                     \"adresse\": \"thies\",
                     \"telephone\": 336952458,
                     \"codeP\": \"sona333\"
                }
             ]";
            $rep=$client->getResponse();
            $this->assertSame(200, $client->getResponse()->getStatuscode());
            $this->assertJsonStringEqualsJsonString($jsonstring, $rep->getContent());
    }
}
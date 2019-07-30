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
                \"compteBancaires\": [
                    \"/api/compte_bancaires/1\"
                ],
                \"etat\": \"debloquer\",
                \"users\": []
            },
            {
                \"id\": 2,
                \"raisonSocial\": \"tigo\",
                \"ninea\": \"tigo1235874587\",
                \"adresse\": \"sacre-coeur\",
                \"telephone\": 338645897,
                \"compteBancaires\": [],
                \"etat\": \"bloquer\",
                
            },
            {
                \"id\": 3,
                \"raisonSocial\": \"wariMbaye\",
                \"ninea\": \"tigo1235874587\",
                \"adresse\": \"sacre-coeur\",
                \"telephone\": 338645897,
                \"compteBancaires\": [],
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 4,
                \"raisonSocial\": \"bambamultiservice\",
                \"ninea\": \"bamba1235874587\",
                \"adresse\": \"Nord-Foire\",
                \"telephone\": 338645897,
                \"compteBancaires\": [],
                \"etat\": \"bloquer\",
            },
            {
                \"id\": 5,
                \"raisonSocial\": \"gayeService\",
                \"ninea\": \"gaye1235874587\",
                \"adresse\": \"Ouest-Foire\",
                \"telephone\": 338645897,
                \"etat\": \"bloquer\",
               
            },
            {
                \"id\": 6,
                \"raisonSocial\": \"JolieService\",
                \"ninea\": \"jolie1235874587\",
                \"adresse\": \"Ouest-Foire\",
                \"telephone\": 338685897,
                \"compteBancaires\": [],
                \"etat\": \"bloquer\",
            },
            {
                \"id\": 7,
                \"raisonSocial\": \"JolieService\",
                \"ninea\": \"jolie1235874587\",
                \"adresse\": \"Ouest-Foire\",
                \"telephone\": 338685897,
                \"compteBancaires\": [],
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 8,
                \"raisonSocial\": \"JolieService\",
                \"ninea\": \"jolie1235874587\",
                \"adresse\": \"Ouest-Foire\",
                \"telephone\": 338685897,
                \"compteBancaires\": [],
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 9,
                \"raisonSocial\": \"cheikhservice\",
                \"ninea\": \"hhhtgne2015\",
                \"adresse\": \"Oukam\",
                \"telephone\": 339584621,
                \"compteBancaires\": [],
                \"etat\": \"bloquer\",
            },
            {
                \"id\": 10,
                \"raisonSocial\": \"yayaservice\",
                \"ninea\": \"201jj2568\",
                \"adresse\": \"keur massar\",
                \"telephone\": 339864752,
                \"compteBancaires\": [],
                \"etat\": \"debloquer\",
            }
             ]";
        $rep = $client->getResponse();
        $this->assertSame(200, $client->getResponse()->getStatuscode());
       // $this->assertJsonStringEqualsJsonString($jsonstring, $rep->getContent());
    }

    public function testAddPartenaireok()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/api/ajout',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"raisonSocial":"gayeSA","ninea": "ga33","adresse": "Ouakam","telephone": 333658401,"etat": "debloquer"}');
        $rep = $client->getResponse();
         var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
    public function testAddPartenaire()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/api/ajout',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"raisonSocial":"ngomSA","ninea": "","adresse": "Mermoz","telephone": "cheikh","etat": "debloquer"}');
        $rep = $client->getResponse();
            var_dump($rep);
        $this->assertSame(400, $client->getResponse()->getStatusCode());
    }
 
}
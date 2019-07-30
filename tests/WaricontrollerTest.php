<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WaricontrollerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' =>"mayajolie",
            'PHP_AUTH_PW'=>"mayajolie"]
        );

        $crawler = $client->request('GET', '/api/partenaires');
        $jsonstring = "[
            {
                \"id\": 1,
                \"raisonSocial\": \"sonatel\",
                \"ninea\": \"sona1235874587\",
                \"adresse\": \"mermoz\",
                \"telephone\": 338645897,
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 2,
                \"raisonSocial\": \"tigo\",
                \"ninea\": \"tigo1235874587\",
                \"adresse\": \"sacre-coeur\",
                \"telephone\": 338645897,
                \"etat\": \"bloquer\",
                
            },
            {
                \"id\": 3,
                \"raisonSocial\": \"wariMbaye\",
                \"ninea\": \"tigo1235874587\",
                \"adresse\": \"sacre-coeur\",
                \"telephone\": 338645897,
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 4,
                \"raisonSocial\": \"bambamultiservice\",
                \"ninea\": \"bamba1235874587\",
                \"adresse\": \"Nord-Foire\",
                \"telephone\": 338645897,
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
                \"etat\": \"bloquer\",
            },
            {
                \"id\": 7,
                \"raisonSocial\": \"JolieService\",
                \"ninea\": \"jolie1235874587\",
                \"adresse\": \"Ouest-Foire\",
                \"telephone\": 338685897,
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 8,
                \"raisonSocial\": \"JolieService\",
                \"ninea\": \"jolie1235874587\",
                \"adresse\": \"Ouest-Foire\",
                \"telephone\": 338685897,
                \"etat\": \"debloquer\",
            },
            {
                \"id\": 9,
                \"raisonSocial\": \"cheikhservice\",
                \"ninea\": \"hhhtgne2015\",
                \"adresse\": \"Oukam\",
                \"telephone\": 339584621,
                \"etat\": \"bloquer\",
            },
            {
                \"id\": 10,
                \"raisonSocial\": \"yayaservice\",
                \"ninea\": \"201jj2568\",
                \"adresse\": \"keur massar\",
                \"telephone\": 339864752,
                \"etat\": \"debloquer\",
            }
             ]";
        $rep = $client->getResponse();
        $this->assertSame(200, $client->getResponse()->getStatuscode());
       // $this->assertJsonStringEqualsJsonString($jsonstring, $rep->getContent());
    }

    public function testAddPartenaireok()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' =>"mayajolie",
            'PHP_AUTH_PW'=>"mayajolie"]
        
        );
        $crawler = $client->request('POST', '/api/ajout',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"raisonSocial":"gayeSA","ninea": "ga33","adresse": "Ouakam","telephone": 333658401,"etat": "debloquer"}');
        $rep = $client->getResponse();
         var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
    public function testAddPartenaire()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => "mayajolie",
            'PHP_AUTH_PW'=> "mayajolie"]
        );
        $crawler = $client->request('POST', '/api/ajout',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"raisonSocial":"ngomSA","ninea": "","adresse": "Mermoz","telephone": ,"etat": "debloquer"}');
        $rep = $client->getResponse();
            var_dump($rep);
        $this->assertSame(400, $client->getResponse()->getStatusCode());
    }
    public function testAddComptBok()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' =>"mayajolie",
            'PHP_AUTH_PW'=>"mayajolie"]
        
        );
        $crawler = $client->request('POST', '/api/comptB',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"numeroCompte":1247856552,"solde": "20050000","partenaire": "1"}');
        $rep = $client->getResponse();
         var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
    public function testAddComptB()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' =>"mayajolie",
            'PHP_AUTH_PW'=>"mayajolie"]
        
        );
        $crawler = $client->request('POST', '/api/comptB',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"numeroCompte":1247856552,"solde":,"partenaire": "1"}');
        $rep = $client->getResponse();
         var_dump($rep);
        $this->assertSame(400, $client->getResponse()->getStatusCode());
    }
    public function testAddDepotOK()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' =>"mayajolie",
            'PHP_AUTH_PW'=>"mayajolie"]
        
        );
        $crawler = $client->request('POST', '/api/depot',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"montant":50000,"comptb": "1","dateDepot": "2019-07-29 15:33:07"}');
        $rep = $client->getResponse();
         var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
    public function testAddDepot()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' =>"mayajolie",
            'PHP_AUTH_PW'=>"mayajolie"]
        
        );
        $crawler = $client->request('POST', '/api/depot',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"montant":50000,"comptb": "1","dateDepot": "2019-07-29"}');
        $rep = $client->getResponse();
         var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }
}
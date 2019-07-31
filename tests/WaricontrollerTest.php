<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WaricontrollerTest extends WebTestCase
{
     public function testIndex()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
        );

        $crawler = $client->request('GET', '/api/partenaires');
        $rep = $client->getResponse();
        $this->assertSame(200, $client->getResponse()->getStatuscode());
    }  

    public function testAjoutP()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
        );
        $crawler = $client->request('POST', '/api/ajout',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"raisonSocial":"mayaService","ninea": "maya215","adresse": "Parcelle","telephone": 33918451,"etat": "debloquer"}');
        $rep = $client->getResponse();
        var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }

    public function testAddPartenaire()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
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
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
        );
        $crawler = $client->request('POST', '/api/comptB',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"numeroCompte":"122100042","solde": 10000,"partenaire": "3"}');
        $rep = $client->getResponse();
        var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    }

    public function testAddComptB()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
        );
        $crawler = $client->request('POST', '/api/comptB',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"numeroCompte":"1247856552","solde":,"partenaire": "8"}');
        $rep = $client->getResponse();
        var_dump($rep);
        $this->assertSame(400, $client->getResponse()->getStatusCode());
    }

     public function testAddDepotOK()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
        );
        $crawler = $client->request('POST', '/api/depot',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"montant":50000,"dateDepot": "","comptb": "2"}');
        $rep = $client->getResponse();
        var_dump($rep);
        $this->assertSame(201, $client->getResponse()->getStatusCode());
    } 

     public function testAddDepot()
    {
        $client = static::createClient([],
            ['PHP_AUTH_USER' => 'mayajolie',
            'PHP_AUTH_PW' => 'mayajolie', ]
        );
        $crawler = $client->request('POST', '/api/depot',[],[],
        ['CONTENT_TYPE' => 'application/json'],
        '{"montant":,"comptb":"1","dateDepot": "2019-07-29"}');
        $rep = $client->getResponse();
        var_dump($rep);
        $this->assertSame(400, $client->getResponse()->getStatusCode());
    } 
} 

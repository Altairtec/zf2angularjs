<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager; 
use Application\Entity\Categoria;

class LoadCategoria extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager) {
        $categoria = new Categoria();
        $categoria->setNome('Livros');  
        $this->addReference('categoria-livros', $categoria);
        
        $manager->persist($categoria);
        
        $categoria2 = new Categoria();
        $categoria2->setNome('Computadores');        
        $this->addReference('categoria-computadores', $categoria2);
        
        $manager->persist($categoria2);
        
        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}

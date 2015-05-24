<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager; 
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager) {
        $categoriaLivros = $this->getReference('categoria-livros'); 
        $categoriaComputadores = $this->getReference('categoria-computadores');
        
        $produto = new Produto();
        $produto->setNome('Orientação a Objetos')
                ->setCategoria($categoriaLivros)
                ->setDescricao('Descrição do livro de OO');
        $manager->persist($produto);
        
        $produto2 = new Produto();
        $produto2->setNome('Macbook Pro')
                ->setCategoria($categoriaComputadores)
                ->setDescricao('Descrição do computador Apple');
        $manager->persist($produto2);
        
        $produto3 = new Produto();
        $produto3->setNome('Livro de Design Pattern')
                ->setCategoria($categoriaLivros)
                ->setDescricao('Descrição do livro de Padrões de Projeto');
        $manager->persist($produto3);
        
        $manager->flush();
    }

    public function getOrder() {
        return 20;
    }

}

<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager; 
use Application\Entity\Produto as ProdutoEntity;

class Produto {

    private $em;   
    
    public function __construct(EntityManager $em) {
        $this->em = $em;                
    }
    
    public function insert(array $data){
         $categoriaEntity = $this->em
                ->getReference('Application\Entity\Categoria', $data['categoriaId']);   
         
        $produtoEntity = new ProdutoEntity();
        $produtoEntity->setNome('Mackbook 15')
                ->setDescricao('Super Máquina')
                ->setCategoria($categoriaEntity);
        
        $this->em->persist($produtoEntity);
        $this->em->flush();
        
        return $categoriaEntity;        
    }
    
    public function update(array $data){
        $categoriaEntity = $this->em
                ->getReference('Application\Entity\Categoria', $data['categoriaId']);   
        
        $produtoEntity = $this->em->getReference('Application\Entity\Produto', $data['id']);
        $produtoEntity->setNome($data['nome'])
                ->setDescricao($data['descricao'])
                ->setCategoria($categoriaEntity);
        
        $this->em->persist($produtoEntity);
        $this->em->flush();
        
        return $produtoEntity;        
    }
        
    public function delete($id){        
        $produtoEntity = $this->em
                ->getReference('Application\Entity\Produto', $id);   
       
        $this->em->remove($produtoEntity);
        $this->em->flush();
        
        return $id;
    }
    
}

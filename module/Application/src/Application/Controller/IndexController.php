<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager'); 
        $repo = $em->getRepository('Application\Entity\Categoria');
        
        /*
        $categoria = new Categoria(); 
        $categoria->setNome('Periféricos');
        
        $em->persist($categoria); // prepara para gravar
        $em->flush(); // grava no banco
        */
        
        $categoriaService = 
                $this->getServiceLocator()->get('Application\Service\Categoria'); 
        
        //$categoriaEntity = $categoriaService->insert('Antenas');
        //var_dump($categoriaEntity);        
        
        //$categoriaEntity = $categoriaService->update(array('id' => 8, 'nome' => 'Groselha'));
        //var_dump($categoriaEntity);
        
        //$id = $categoriaService->delete(8);
        //var_dump($id);        
        
        $categorias = $repo->findAll();  
        
        /*
        $categoria = $repo->find(3);
                
        $produto = new Produto();
        $produto->setNome('X Box One')
                ->setDescricao('Console 512 bits')
                ->setCategoria($categoria);
        $em->persist($produto);
        $em->flush();
         * 
         */
        
        $produtoService = 
                $this->getServiceLocator()->get('Application\Service\Produto'); 
        //$produtoService->insert(array('nome' => 'Game A', 'categoriaId' => 3, ));
        /*
        $produtoService->update(array(
            'id' => 3, 
            'nome' => 'Game 42', 
            'descricao' => 'Desc Nome', 
            'categoriaId' => 7));
         */
        //$produtoService->delete(2);
        
        
        return new ViewModel(array('categorias' => $categorias));
    }
}

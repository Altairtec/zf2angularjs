<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="produtos") 
 */
class Produto {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
      
    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;
    
    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    
    /**
     * @ORM\Column(type="text")
     */    
    private $descricao;

    function getId() {
        return $this->id;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

}

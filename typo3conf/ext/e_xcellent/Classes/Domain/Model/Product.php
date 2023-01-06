<?php
namespace Emagineurs\EXcellent\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Product extends AbstractEntity
{
    protected $name ='';

    protected $description ='';

    protected $quantity = 0;
    
    protected $totalprice = 'calculate the total price, accessible via getter';
    
    
    public function __construct(string $name = '', string $description = '', int $quantity = 0)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setQuantity($quantity);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): string
    {
        return $this->quantity;
    }
    
    public function getTotalprice() : int
    {
        return ($this->quantity * 5);
    }
}
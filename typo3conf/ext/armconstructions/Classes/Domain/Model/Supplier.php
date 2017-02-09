<?php
namespace ARM\Armconstructions\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Supplier
 */
class Supplier extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';
    
    /**
     * tag
     *
     * @var string
     */
    protected $tag = '';
    
    /**
     * materials
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Material>
     * @cascade remove
     */
    protected $materials = null;
    
    /**
     * payments
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Payment>
     * @cascade remove
     */
    protected $payments = null;
    
    /**
     * agent
     *
     * @var \int
     */
    protected $agent = NULL;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->materials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->payments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    
    /**
     * Returns the agent
     *
     * @return \int $agent
     */
    public function getAgent()
    {
        return $this->agent;
    }
    
    /**
     * Sets the agent
     *
     * @param \int $agent
     * @return void
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }
    
    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * Returns the tag
     *
     * @return string $tag
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    /**
     * Sets the tag
     *
     * @param string $tag
     * @return void
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
    
    /**
     * Adds a Material
     *
     * @param \ARM\Armconstructions\Domain\Model\Material $material
     * @return void
     */
    public function addMaterial(\ARM\Armconstructions\Domain\Model\Material $material)
    {
        $this->materials->attach($material);
    }
    
    /**
     * Removes a Material
     *
     * @param \ARM\Armconstructions\Domain\Model\Material $materialToRemove The Material to be removed
     * @return void
     */
    public function removeMaterial(\ARM\Armconstructions\Domain\Model\Material $materialToRemove)
    {
        $this->materials->detach($materialToRemove);
    }
    
    /**
     * Returns the materials
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Material> $materials
     */
    public function getMaterials()
    {
        return $this->materials;
    }
    
    /**
     * Sets the materials
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Material> $materials
     * @return void
     */
    public function setMaterials(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $materials)
    {
        $this->materials = $materials;
    }
    
    /**
     * Adds a Payment
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function addPayment(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $this->payments->attach($payment);
    }
    
    /**
     * Removes a Payment
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $paymentToRemove The Payment to be removed
     * @return void
     */
    public function removePayment(\ARM\Armconstructions\Domain\Model\Payment $paymentToRemove)
    {
        $this->payments->detach($paymentToRemove);
    }
    
    /**
     * Returns the payments
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Payment> $payments
     */
    public function getPayments()
    {
        return $this->payments;
    }
    
    /**
     * Sets the payments
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Payment> $payments
     * @return void
     */
    public function setPayments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $payments)
    {
        $this->payments = $payments;
    }

}
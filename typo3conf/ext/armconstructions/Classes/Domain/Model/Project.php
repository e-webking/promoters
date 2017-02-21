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
 * Project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * address
     *
     * @var string
     */
    protected $address = '';
    
    /**
     * photos
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $photos = null;
    
    /**
     * landlords
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Landlord>
     * @cascade remove
     */
    protected $landlords = null;
    
    /**
     * clients
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Client>
     * @cascade remove
     */
    protected $clients = null;
    
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
     * incomes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Income>
     * @cascade remove
     */
    protected $incomes = null;
    
    /**
     * suppliers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Supplier>
     * @cascade remove
     */
    protected $suppliers = null;
    
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
        $this->landlords = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->clients = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->materials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->payments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->incomes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->suppliers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    /**
     * Returns the photos
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $photos
     */
    public function getPhotos()
    {
        return $this->photos;
    }
    
    /**
     * Sets the photos
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $photos
     * @return void
     */
    public function setPhotos(\TYPO3\CMS\Extbase\Domain\Model\FileReference $photos)
    {
        $this->photos = $photos;
    }
    
    /**
     * Adds a Landlord
     *
     * @param \ARM\Armconstructions\Domain\Model\Landlord $landlord
     * @return void
     */
    public function addLandlord(\ARM\Armconstructions\Domain\Model\Landlord $landlord)
    {
        $this->landlords->attach($landlord);
    }
    
    /**
     * Removes a Landlord
     *
     * @param \ARM\Armconstructions\Domain\Model\Landlord $landlordToRemove The Landlord to be removed
     * @return void
     */
    public function removeLandlord(\ARM\Armconstructions\Domain\Model\Landlord $landlordToRemove)
    {
        $this->landlords->detach($landlordToRemove);
    }
    
    /**
     * Returns the landlords
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Landlord> $landlords
     */
    public function getLandlords()
    {
        return $this->landlords;
    }
    
    /**
     * Sets the landlords
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Landlord> $landlords
     * @return void
     */
    public function setLandlords(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $landlords)
    {
        $this->landlords = $landlords;
    }
    
    /**
     * Adds a Client
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @return void
     */
    public function addClient(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        $this->clients->attach($client);
    }
    
    /**
     * Removes a Client
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $clientToRemove The Client to be removed
     * @return void
     */
    public function removeClient(\ARM\Armconstructions\Domain\Model\Client $clientToRemove)
    {
        $this->clients->detach($clientToRemove);
    }
    
    /**
     * Returns the clients
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Client> $clients
     */
    public function getClients()
    {
        return $this->clients;
    }
    
    /**
     * Sets the clients
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Client> $clients
     * @return void
     */
    public function setClients(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $clients)
    {
        $this->clients = $clients;
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
    
    /**
     * Adds a Income
     *
     * @param \ARM\Armconstructions\Domain\Model\Income $income
     * @return void
     */
    public function addIncome(\ARM\Armconstructions\Domain\Model\Income $income)
    {
        $this->incomes->attach($income);
    }
    
    /**
     * Removes a Income
     *
     * @param \ARM\Armconstructions\Domain\Model\Income $incomeToRemove The Income to be removed
     * @return void
     */
    public function removeIncome(\ARM\Armconstructions\Domain\Model\Income $incomeToRemove)
    {
        $this->incomes->detach($incomeToRemove);
    }
    
    /**
     * Returns the incomes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Income> $incomes
     */
    public function getIncomes()
    {
        return $this->incomes;
    }
    
    /**
     * Sets the incomes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Income> $incomes
     * @return void
     */
    public function setIncomes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $incomes)
    {
        $this->incomes = $incomes;
    }

    /**
     * Adds a Landlord
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplier
     * @return void
     */
    public function addSupplier(\ARM\Armconstructions\Domain\Model\Supplier $supplier)
    {
        $this->suppliers->attach($supplier);
    }
    
    /**
     * Removes a Supplier
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplierToRemove The Supplier to be removed
     * @return void
     */
    public function removeSupplier(\ARM\Armconstructions\Domain\Model\Supplier $supplierToRemove)
    {
        $this->suppliers->detach($supplierToRemove);
    }
    
    /**
     * Returns the suppliers
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Supplier> $suppliers
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }
    
    /**
     * Sets the suppliers
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Supplier> $suppliers
     * @return void
     */
    public function setSuppliers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $suppliers)
    {
        $this->suppliers = $suppliers;
    }
}
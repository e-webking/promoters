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
 * Client
 */
class Client extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * project
     *
     * @var \ARM\Armconstructions\Domain\Model\Project
     */
    protected $project = null;
    
    /**
     * agent
     *
     * @var \int
     */
    protected $agent = NULL;
    
    /**
     * incomes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ARM\Armconstructions\Domain\Model\Income>
     * @cascade remove
     */
    protected $incomes = null;
    
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
        $this->incomes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the project
     *
     * @return \ARM\Armconstructions\Domain\Model\Project $project
     */
    public function getProject()
    {
        return $this->project;
    }
    
    /**
     * Sets the project
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function setProject(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $this->project = $project;
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

}
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
 * Landlord
 */
class Landlord extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * address
     *
     * @var string
     */
    protected $address = '';
    
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

}
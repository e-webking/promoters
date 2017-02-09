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
 * Material
 */
class Material extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * rate
     *
     * @var string
     */
    protected $rate = '';
    
    /**
     * qty
     *
     * @var float
     */
    protected $qty = 0.0;
    
    /**
     * amount
     *
     * @var int
     */
    protected $amount = 0;
    
    /**
     * transport
     *
     * @var int
     */
    protected $transport = 0;
    
    /**
     * misc
     *
     * @var int
     */
    protected $misc = 0;
    
    /**
     * sdate
     *
     * @var \DateTime
     */
    protected $sdate = null;
    
    /**
     * supplier
     *
     * @var \ARM\Armconstructions\Domain\Model\Supplier
     */
    protected $supplier = null;
    
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
     * Returns the rate
     *
     * @return string $rate
     */
    public function getRate()
    {
        return $this->rate;
    }
    
    /**
     * Sets the rate
     *
     * @param string $rate
     * @return void
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }
    
    /**
     * Returns the qty
     *
     * @return float $qty
     */
    public function getQty()
    {
        return $this->qty;
    }
    
    /**
     * Sets the qty
     *
     * @param float $qty
     * @return void
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }
    
    /**
     * Returns the amount
     *
     * @return int $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
    /**
     * Sets the amount
     *
     * @param int $amount
     * @return void
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    /**
     * Returns the transport
     *
     * @return int $transport
     */
    public function getTransport()
    {
        return $this->transport;
    }
    
    /**
     * Sets the transport
     *
     * @param int $transport
     * @return void
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }
    
    /**
     * Returns the misc
     *
     * @return int $misc
     */
    public function getMisc()
    {
        return $this->misc;
    }
    
    /**
     * Sets the misc
     *
     * @param int $misc
     * @return void
     */
    public function setMisc($misc)
    {
        $this->misc = $misc;
    }
    
    /**
     * Returns the sdate
     *
     * @return \DateTime $sdate
     */
    public function getSdate()
    {
        return $this->sdate;
    }
    
    /**
     * Sets the sdate
     *
     * @param \DateTime $sdate
     * @return void
     */
    public function setSdate(\DateTime $sdate)
    {
        $this->sdate = $sdate;
    }
    
    /**
     * Returns the supplier
     *
     * @return \ARM\Armconstructions\Domain\Model\Supplier $supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
    
    /**
     * Sets the supplier
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplier
     * @return void
     */
    public function setSupplier(\ARM\Armconstructions\Domain\Model\Supplier $supplier)
    {
        $this->supplier = $supplier;
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
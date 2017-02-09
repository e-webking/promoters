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
 * Income
 */
class Income extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * pdate
     *
     * @var \DateTime
     */
    protected $pdate = null;
    
    /**
     * amount
     *
     * @var int
     */
    protected $amount = 0;
    
    /**
     * mode
     *
     * @var int
     */
    protected $mode = 0;
    
    /**
     * instrumentno
     *
     * @var string
     */
    protected $instrumentno = '';
    
    /**
     * particular
     *
     * @var string
     */
    protected $particular = '';
    
    /**
     * client
     *
     * @var \ARM\Armconstructions\Domain\Model\Client
     */
    protected $client = null;
    
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
     * Returns the pdate
     *
     * @return \DateTime $pdate
     */
    public function getPdate()
    {
        return $this->pdate;
    }
    
    /**
     * Sets the pdate
     *
     * @param \DateTime $pdate
     * @return void
     */
    public function setPdate(\DateTime $pdate)
    {
        $this->pdate = $pdate;
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
     * Returns the mode
     *
     * @return int $mode
     */
    public function getMode()
    {
        return $this->mode;
    }
    
    /**
     * Sets the mode
     *
     * @param int $mode
     * @return void
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }
    
    /**
     * Returns the instrumentno
     *
     * @return string $instrumentno
     */
    public function getInstrumentno()
    {
        return $this->instrumentno;
    }
    
    /**
     * Sets the instrumentno
     *
     * @param string $instrumentno
     * @return void
     */
    public function setInstrumentno($instrumentno)
    {
        $this->instrumentno = $instrumentno;
    }
    
    /**
     * Returns the particular
     *
     * @return string $particular
     */
    public function getParticular()
    {
        return $this->particular;
    }
    
    /**
     * Sets the particular
     *
     * @param string $particular
     * @return void
     */
    public function setParticular($particular)
    {
        $this->particular = $particular;
    }
    
    /**
     * Returns the client
     *
     * @return \ARM\Armconstructions\Domain\Model\Client $client
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * Sets the client
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @return void
     */
    public function setClient(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        $this->client = $client;
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
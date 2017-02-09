<?php

namespace ARM\Armconstructions\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \ARM\Armconstructions\Domain\Model\Income.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class IncomeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ARM\Armconstructions\Domain\Model\Income
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ARM\Armconstructions\Domain\Model\Income();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getPdateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getPdate()
		);
	}

	/**
	 * @test
	 */
	public function setPdateForDateTimeSetsPdate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setPdate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'pdate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAmountReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setAmountForIntSetsAmount()
	{	}

	/**
	 * @test
	 */
	public function getModeReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setModeForIntSetsMode()
	{	}

	/**
	 * @test
	 */
	public function getInstrumentnoReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getInstrumentno()
		);
	}

	/**
	 * @test
	 */
	public function setInstrumentnoForStringSetsInstrumentno()
	{
		$this->subject->setInstrumentno('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'instrumentno',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getParticularReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getParticular()
		);
	}

	/**
	 * @test
	 */
	public function setParticularForStringSetsParticular()
	{
		$this->subject->setParticular('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'particular',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getClientReturnsInitialValueForClient()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getClient()
		);
	}

	/**
	 * @test
	 */
	public function setClientForClientSetsClient()
	{
		$clientFixture = new \ARM\Armconstructions\Domain\Model\Client();
		$this->subject->setClient($clientFixture);

		$this->assertAttributeEquals(
			$clientFixture,
			'client',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProjectReturnsInitialValueForProject()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getProject()
		);
	}

	/**
	 * @test
	 */
	public function setProjectForProjectSetsProject()
	{
		$projectFixture = new \ARM\Armconstructions\Domain\Model\Project();
		$this->subject->setProject($projectFixture);

		$this->assertAttributeEquals(
			$projectFixture,
			'project',
			$this->subject
		);
	}
}

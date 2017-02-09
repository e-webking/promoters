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
 * Test case for class \ARM\Armconstructions\Domain\Model\Material.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class MaterialTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ARM\Armconstructions\Domain\Model\Material
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ARM\Armconstructions\Domain\Model\Material();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRateReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRate()
		);
	}

	/**
	 * @test
	 */
	public function setRateForStringSetsRate()
	{
		$this->subject->setRate('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'rate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getQtyReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getQty()
		);
	}

	/**
	 * @test
	 */
	public function setQtyForFloatSetsQty()
	{
		$this->subject->setQty(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'qty',
			$this->subject,
			'',
			0.000000001
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
	public function getTransportReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setTransportForIntSetsTransport()
	{	}

	/**
	 * @test
	 */
	public function getMiscReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setMiscForIntSetsMisc()
	{	}

	/**
	 * @test
	 */
	public function getSdateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getSdate()
		);
	}

	/**
	 * @test
	 */
	public function setSdateForDateTimeSetsSdate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setSdate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'sdate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSupplierReturnsInitialValueForSupplier()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getSupplier()
		);
	}

	/**
	 * @test
	 */
	public function setSupplierForSupplierSetsSupplier()
	{
		$supplierFixture = new \ARM\Armconstructions\Domain\Model\Supplier();
		$this->subject->setSupplier($supplierFixture);

		$this->assertAttributeEquals(
			$supplierFixture,
			'supplier',
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

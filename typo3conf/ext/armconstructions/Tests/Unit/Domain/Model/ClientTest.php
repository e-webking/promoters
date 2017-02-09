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
 * Test case for class \ARM\Armconstructions\Domain\Model\Client.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ClientTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ARM\Armconstructions\Domain\Model\Client
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ARM\Armconstructions\Domain\Model\Client();
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
	public function getPhoneReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone()
	{
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
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

	/**
	 * @test
	 */
	public function getIncomesReturnsInitialValueForIncome()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getIncomes()
		);
	}

	/**
	 * @test
	 */
	public function setIncomesForObjectStorageContainingIncomeSetsIncomes()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();
		$objectStorageHoldingExactlyOneIncomes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneIncomes->attach($income);
		$this->subject->setIncomes($objectStorageHoldingExactlyOneIncomes);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneIncomes,
			'incomes',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addIncomeToObjectStorageHoldingIncomes()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();
		$incomesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$incomesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($income));
		$this->inject($this->subject, 'incomes', $incomesObjectStorageMock);

		$this->subject->addIncome($income);
	}

	/**
	 * @test
	 */
	public function removeIncomeFromObjectStorageHoldingIncomes()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();
		$incomesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$incomesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($income));
		$this->inject($this->subject, 'incomes', $incomesObjectStorageMock);

		$this->subject->removeIncome($income);

	}
}

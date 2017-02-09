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
 * Test case for class \ARM\Armconstructions\Domain\Model\Supplier.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SupplierTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ARM\Armconstructions\Domain\Model\Supplier
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ARM\Armconstructions\Domain\Model\Supplier();
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
	public function getTagReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTag()
		);
	}

	/**
	 * @test
	 */
	public function setTagForStringSetsTag()
	{
		$this->subject->setTag('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'tag',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMaterialsReturnsInitialValueForMaterial()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getMaterials()
		);
	}

	/**
	 * @test
	 */
	public function setMaterialsForObjectStorageContainingMaterialSetsMaterials()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();
		$objectStorageHoldingExactlyOneMaterials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneMaterials->attach($material);
		$this->subject->setMaterials($objectStorageHoldingExactlyOneMaterials);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneMaterials,
			'materials',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addMaterialToObjectStorageHoldingMaterials()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();
		$materialsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$materialsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($material));
		$this->inject($this->subject, 'materials', $materialsObjectStorageMock);

		$this->subject->addMaterial($material);
	}

	/**
	 * @test
	 */
	public function removeMaterialFromObjectStorageHoldingMaterials()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();
		$materialsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$materialsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($material));
		$this->inject($this->subject, 'materials', $materialsObjectStorageMock);

		$this->subject->removeMaterial($material);

	}

	/**
	 * @test
	 */
	public function getPaymentsReturnsInitialValueForPayment()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPayments()
		);
	}

	/**
	 * @test
	 */
	public function setPaymentsForObjectStorageContainingPaymentSetsPayments()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();
		$objectStorageHoldingExactlyOnePayments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePayments->attach($payment);
		$this->subject->setPayments($objectStorageHoldingExactlyOnePayments);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePayments,
			'payments',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPaymentToObjectStorageHoldingPayments()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();
		$paymentsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$paymentsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($payment));
		$this->inject($this->subject, 'payments', $paymentsObjectStorageMock);

		$this->subject->addPayment($payment);
	}

	/**
	 * @test
	 */
	public function removePaymentFromObjectStorageHoldingPayments()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();
		$paymentsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$paymentsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($payment));
		$this->inject($this->subject, 'payments', $paymentsObjectStorageMock);

		$this->subject->removePayment($payment);

	}
}

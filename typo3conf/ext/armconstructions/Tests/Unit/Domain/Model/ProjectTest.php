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
 * Test case for class \ARM\Armconstructions\Domain\Model\Project.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ARM\Armconstructions\Domain\Model\Project
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ARM\Armconstructions\Domain\Model\Project();
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
	public function getAddressReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress()
	{
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhotosReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getPhotos()
		);
	}

	/**
	 * @test
	 */
	public function setPhotosForFileReferenceSetsPhotos()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setPhotos($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'photos',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLandlordsReturnsInitialValueForLandlord()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getLandlords()
		);
	}

	/**
	 * @test
	 */
	public function setLandlordsForObjectStorageContainingLandlordSetsLandlords()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();
		$objectStorageHoldingExactlyOneLandlords = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneLandlords->attach($landlord);
		$this->subject->setLandlords($objectStorageHoldingExactlyOneLandlords);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneLandlords,
			'landlords',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addLandlordToObjectStorageHoldingLandlords()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();
		$landlordsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$landlordsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($landlord));
		$this->inject($this->subject, 'landlords', $landlordsObjectStorageMock);

		$this->subject->addLandlord($landlord);
	}

	/**
	 * @test
	 */
	public function removeLandlordFromObjectStorageHoldingLandlords()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();
		$landlordsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$landlordsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($landlord));
		$this->inject($this->subject, 'landlords', $landlordsObjectStorageMock);

		$this->subject->removeLandlord($landlord);

	}

	/**
	 * @test
	 */
	public function getClientsReturnsInitialValueForClient()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getClients()
		);
	}

	/**
	 * @test
	 */
	public function setClientsForObjectStorageContainingClientSetsClients()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();
		$objectStorageHoldingExactlyOneClients = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneClients->attach($client);
		$this->subject->setClients($objectStorageHoldingExactlyOneClients);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneClients,
			'clients',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addClientToObjectStorageHoldingClients()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();
		$clientsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$clientsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($client));
		$this->inject($this->subject, 'clients', $clientsObjectStorageMock);

		$this->subject->addClient($client);
	}

	/**
	 * @test
	 */
	public function removeClientFromObjectStorageHoldingClients()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();
		$clientsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$clientsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($client));
		$this->inject($this->subject, 'clients', $clientsObjectStorageMock);

		$this->subject->removeClient($client);

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

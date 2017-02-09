<?php
namespace ARM\Armconstructions\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 
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
 * Test case for class ARM\Armconstructions\Controller\SupplierController.
 *
 */
class SupplierControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ARM\Armconstructions\Controller\SupplierController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ARM\\Armconstructions\\Controller\\SupplierController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllSuppliersFromRepositoryAndAssignsThemToView()
	{

		$allSuppliers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$supplierRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\SupplierRepository', array('findAll'), array(), '', FALSE);
		$supplierRepository->expects($this->once())->method('findAll')->will($this->returnValue($allSuppliers));
		$this->inject($this->subject, 'supplierRepository', $supplierRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('suppliers', $allSuppliers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenSupplierToSupplierRepository()
	{
		$supplier = new \ARM\Armconstructions\Domain\Model\Supplier();

		$supplierRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\SupplierRepository', array('add'), array(), '', FALSE);
		$supplierRepository->expects($this->once())->method('add')->with($supplier);
		$this->inject($this->subject, 'supplierRepository', $supplierRepository);

		$this->subject->createAction($supplier);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenSupplierToView()
	{
		$supplier = new \ARM\Armconstructions\Domain\Model\Supplier();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('supplier', $supplier);

		$this->subject->editAction($supplier);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenSupplierInSupplierRepository()
	{
		$supplier = new \ARM\Armconstructions\Domain\Model\Supplier();

		$supplierRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\SupplierRepository', array('update'), array(), '', FALSE);
		$supplierRepository->expects($this->once())->method('update')->with($supplier);
		$this->inject($this->subject, 'supplierRepository', $supplierRepository);

		$this->subject->updateAction($supplier);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenSupplierFromSupplierRepository()
	{
		$supplier = new \ARM\Armconstructions\Domain\Model\Supplier();

		$supplierRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\SupplierRepository', array('remove'), array(), '', FALSE);
		$supplierRepository->expects($this->once())->method('remove')->with($supplier);
		$this->inject($this->subject, 'supplierRepository', $supplierRepository);

		$this->subject->deleteAction($supplier);
	}
}

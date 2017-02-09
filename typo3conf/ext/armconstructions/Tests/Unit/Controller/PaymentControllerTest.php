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
 * Test case for class ARM\Armconstructions\Controller\PaymentController.
 *
 */
class PaymentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ARM\Armconstructions\Controller\PaymentController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ARM\\Armconstructions\\Controller\\PaymentController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllPaymentsFromRepositoryAndAssignsThemToView()
	{

		$allPayments = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$paymentRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\PaymentRepository', array('findAll'), array(), '', FALSE);
		$paymentRepository->expects($this->once())->method('findAll')->will($this->returnValue($allPayments));
		$this->inject($this->subject, 'paymentRepository', $paymentRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('payments', $allPayments);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenPaymentToPaymentRepository()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();

		$paymentRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\PaymentRepository', array('add'), array(), '', FALSE);
		$paymentRepository->expects($this->once())->method('add')->with($payment);
		$this->inject($this->subject, 'paymentRepository', $paymentRepository);

		$this->subject->createAction($payment);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenPaymentToView()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('payment', $payment);

		$this->subject->editAction($payment);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenPaymentInPaymentRepository()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();

		$paymentRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\PaymentRepository', array('update'), array(), '', FALSE);
		$paymentRepository->expects($this->once())->method('update')->with($payment);
		$this->inject($this->subject, 'paymentRepository', $paymentRepository);

		$this->subject->updateAction($payment);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenPaymentFromPaymentRepository()
	{
		$payment = new \ARM\Armconstructions\Domain\Model\Payment();

		$paymentRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\PaymentRepository', array('remove'), array(), '', FALSE);
		$paymentRepository->expects($this->once())->method('remove')->with($payment);
		$this->inject($this->subject, 'paymentRepository', $paymentRepository);

		$this->subject->deleteAction($payment);
	}
}

<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ARM.' . $_EXTKEY,
	'Supplier',
	array(
		'Supplier' => 'list, balance, new, create, edit, update, predel, delete',
		
	),
	// non-cacheable actions
	array(
		'Supplier' => 'list, balance, new, create, edit, update, predel, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ARM.' . $_EXTKEY,
	'Landlord',
	array(
		'Landlord' => 'list, new, create, edit, update, predel, delete',
		
	),
	// non-cacheable actions
	array(
		'Landlord' => 'list, new, create, edit, update, predel, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ARM.' . $_EXTKEY,
	'Client',
	array(
		'Client' => 'list, new, create, edit, update, predel, delete',
		
	),
	// non-cacheable actions
	array(
		'Client' => 'list, new, create, edit, update, predel, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ARM.' . $_EXTKEY,
	'Project',
	array(
            'Project' => 'list, new, create, show, edit, update, predel, delete, addmat, createmat, editmat, updatemat, predelmat, delmat, addpay, createpay, editpay, updatepay, predelpay, delpay, addincome, createincome, editincome, updateincome, predelincome, delincome',
	),
	// non-cacheable actions
	array(
            'Project' => 'list, new, create, show, edit, update, predel, delete, addmat, createmat, editmat, updatemat, predelmat, delmat, addpay, createpay, editpay, updatepay, predelpay, delpay, addincome, createincome, editincome, updateincome, predelincome, delincome',	
	)
);

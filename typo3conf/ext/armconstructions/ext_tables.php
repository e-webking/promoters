<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ARM.' . $_EXTKEY,
	'Supplier',
	'Supplier'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ARM.' . $_EXTKEY,
	'Landlord',
	'Landlord'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ARM.' . $_EXTKEY,
	'Client',
	'Client'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ARM.' . $_EXTKEY,
	'Project',
	'Project'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'ARM Constructions');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_supplier', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_supplier.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_supplier');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_landlord', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_landlord.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_landlord');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_project', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_project.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_project');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_client', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_client.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_client');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_material', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_material.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_material');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_payment', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_payment.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_payment');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armconstructions_domain_model_income', 'EXT:armconstructions/Resources/Private/Language/locallang_csh_tx_armconstructions_domain_model_income.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armconstructions_domain_model_income');

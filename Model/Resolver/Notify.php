<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_LoyaltyProgramGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Mageplaza\LoyaltyProgramGraphQl\Model\Resolver;

use Magento\Customer\Model\Customer;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\GraphQl\Model\Query\ContextInterface;
use Mageplaza\LoyaltyProgram\Helper\Data;
use Mageplaza\LoyaltyProgram\Api\ProgramRepositoryInterface;

/**
 * Class Notify
 * @package Mageplaza\LoyaltyProgramGraphQl\Model\Resolver
 */
class Notify implements ResolverInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * @var ProgramRepositoryInterface
     */
    protected $programRepository;

    /**
     * @var GetCustomer
     */
    protected $getCustomer;

    /**
     * Customer constructor.
     *
     * @param Data $helperData
     * @param ProgramRepositoryInterface $programRepository
     * @param GetCustomer $getCustomer
     */
    public function __construct(
        Data $helperData,
        ProgramRepositoryInterface $programRepository,
        GetCustomer $getCustomer
    ) {
        $this->helperData        = $helperData;
        $this->programRepository = $programRepository;
        $this->getCustomer       = $getCustomer;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (!$this->helperData->isEnabled()) {
            throw new GraphQlNoSuchEntityException(__('Loyalty Program is disabled.'));
        }

        if ($this->helperData->versionCompare('2.3.3') &&
            $context->getExtensionAttributes()->getIsCustomer() === false) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }

        if (!isset($args['status'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }

        /** @var Customer $customer */
        /** @var ContextInterface $context
         * \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context class is available < 2.3.3
         */
        $customer = $this->getCustomer->execute($context);
        $this->programRepository->changeEmailNotify($customer->getId(), $args['status']);

        return true;
    }
}

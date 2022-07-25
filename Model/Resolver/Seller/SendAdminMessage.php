<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/terms
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_SellerMessageGraphQl
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */

declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Model\Resolver\Seller;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Lof\MarketPlace\Api\AdminMessageRepositoryInterface;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Customer\Model\Session;

class SendAdminMessage implements ResolverInterface
{

    /**
     * @var AdminMessageRepositoryInterface
     */
    private $messageRepository;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
      * @param AdminMessageRepositoryInterface $messageRepository
      * @param Session $customerSession
     */

    public function __construct(
        AdminMessageRepositoryInterface $messageRepository,
        Session $customerSession
    ) {

        $this->messageRepository = $messageRepository;
        $this->customerSession = $customerSession;
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
        if (!$context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }
        if (!($args['input']) || !isset($args['input'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }

        $customerId = $this->customerSession->getCustomer()->getId();
        $args = $args['input'];
        $subject = $args['subject'];
        $message = $args['message'];

        return $this->messageRepository->sendMessage((int) $customerId, $subject, $message);

    }
}

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

namespace Lof\SellerMessageGraphQl\Model\Resolver;

use Lof\MarketPlace\Api\SellerMessageRepositoryInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Lof\MarketPlace\Api\Data\SellerMessageInterfaceFactory;

class RepliesMessage implements ResolverInterface
{
    /**
     * @var SellerMessageRepositoryInterface
     */
    private $repliesMessageRepository;
    /**
     * @var SellerMessageInterfaceFactory
     */
    protected $sellerMessageFactory;

    public function __construct(
        SellerMessageRepositoryInterface $repliesMessageRepository,
        SellerMessageInterfaceFactory $sellerMessageFactory
    ) {
        $this->repliesMessageRepository = $repliesMessageRepository;
        $this->sellerMessageFactory = $sellerMessageFactory;
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
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        if (!$context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }
        if (!($args['input']) || !isset($args['input'])) {
            throw new GraphQlInputException(__('"input" value should be specified'));
        }

        $args = $args['input'];
        
        $sellermessageData = $this->sellerMessageFactory->create()
            ->setMessageId($args["message_id"])
            ->setContent($args["content"]);


        $messageModel = $objectManager->get(\Lof\MarketPlace\Model\MessageDetail::class)
            ->load($args['message_id']);

        $messageModel->getData($sellermessageData);
    
        return $this->repliesMessageRepository->replyMessage($messageModel);
    }
}

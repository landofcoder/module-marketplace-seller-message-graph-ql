<?php

declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\GraphQl\Model\Query\ContextInterface;
use Lof\MarketPlace\Api\SellerMessageRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;


class SellerMessage implements ResolverInterface
{
    /**
     * @var SellerMessageRepositoryInterface
     */
    private $repository;


    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;
    /**
     * @var \Lof\MarketPlace\Model\MessageFactory
     */
    protected $message;

    /**
     * @var
     */
    protected $_messages;

    /**
     * @param SellerMessageRepositoryInterface $repository
     * @param \Lof\MarketPlace\Model\Message $message
     * @param \Magento\Customer\Model\Session $customerSession
     * 
     */
    public function __construct(
        SellerMessageRepositoryInterface $repository,
        \Magento\Customer\Model\Session $customerSession,
        \Lof\MarketPlace\Model\Message $message
    ) {
        $this->repository = $repository;
        $this->_customerSession = $customerSession;
        $this->message = $message;
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

        /** @var ContextInterface $context */
        if (false === $context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }

        $messeges = $this->_messages = $this->message->getCollection()
            ->addFieldToFilter('owner_id', ['gt' => 0])
            ->addFieldToFilter('sender_id', $this->_customerSession->getCustomerId());

        foreach ($messeges->load() as $messege) {
            $items[] = [
                'created_at' => $messege->getCreatedAt(),
                'description' => $messege->getDescription(),
                'subject' => $messege->getSubject(),
                'status' => $messege->getStatus(),
                'id'=>$messege->getData('message_id')
            ];
        }
        return ['items' => $items];
    }
}

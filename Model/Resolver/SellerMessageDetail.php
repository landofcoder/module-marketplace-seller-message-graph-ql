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


class SellerMessageDetail implements ResolverInterface
{
    /**
     * @var SellerMessageRepositoryInterface
     */
    private $repository;

    /**
     * @var \Lof\MarketPlace\Model\MessageDetail
     */
    protected $detail;


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
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Lof\MarketPlace\Model\MessageDetail $detail
     * 
     * 
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        SellerMessageRepositoryInterface $repository,
        \Magento\Customer\Model\Session $customerSession,
        \Lof\MarketPlace\Model\Message $message,
        \Lof\MarketPlace\Model\MessageDetail $detail

    ) {
        $this->repository = $repository;
        $this->_customerSession = $customerSession;
        $this->message = $message;
        $this->request = $context->getRequest();
        $this->detail = $detail;
    }

    /**
     * Resolve product review rating values
     *
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|Value|mixed
     *
     * @throws GraphQlInputException
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
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

        $id = $value['id'];

        $messDetails = $this->detail->getCollection()
            ->addFieldToFilter('message_id', $id);

        foreach ($messDetails as $messegedetail) {
            $data = [
                'content' => $messegedetail->getContent(),
                'sender_name' => $messegedetail->getData('sender_name'),
            ];
        }
        return $data;
    }
}

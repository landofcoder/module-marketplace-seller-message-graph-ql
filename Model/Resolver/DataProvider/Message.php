<?php

namespace Lof\SellerMessageGraphQl\Model\Resolver\DataProvider;
use Lof\MarketPlace\Api\SellerMessageRepositoryInterface;


class Message
{
    /**
     * @var \Lof\MarketPlace\Model\Seller
     */
    protected $_sellerFactory;

    /**
     * @var \Lof\MarketPlace\Block\Seller\Message
     */
    protected $message;
    /**
     * @var SellerMessageRepositoryInterface
     */
    private $repository;

    /**
     * @param SellerMessageRepositoryInterface $repository
     */


    public function __construct(
        \Lof\MarketPlace\Model\Seller $sellerFactory,
        \Lof\MarketPlace\Block\Seller\Message $message,
        SellerMessageRepositoryInterface $repository
    ) {
        $this->_sellerFactory = $sellerFactory;
        $this->message = $message;
        $this->repository = $repository;
    }

    /**
     * Get current delivery person profile of current logged in customer
     * @inheritdoc
     */
    public function getMess(
        $context,
        array $args = null
    ) {
        $customer_id = $context->getUserId();

        $dataModel = $this->repository->getSellerMessages($customer_id); 
       
        return  $dataModel;
    }
}

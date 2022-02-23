<?php
namespace Lof\SellerMessageGraphQl\Model\Resolver\DataProvider;

class Message
{
     /**
     * @var \Lof\MarketPlace\Model\Seller
     */
    protected $_sellerFactory;

    /**
     * @var \Lof\MarketPlace\Block\Seller\MessageAdmin
     */
    protected $message;

    public function __construct(
        \Lof\MarketPlace\Model\Seller $sellerFactory,
        \Lof\MarketPlace\Block\Seller\MessageAdmin $message
        )
    {
        $this->_sellerFactory = $sellerFactory;
        $this->message = $message;
    }
    /**
     * @params int $id
     * this function return all the word of the day by id
     **/
    public function getMess()
    {
        try {
            // $collection = $this->_sellerFactory->create()->getCollection();
            // $collection->addFieldToFilter('seller_id', $this->message->getSellerId());
            // $messData = $collection->getData();
            $messData = $this->message->getMessage();
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $messData;
    }
}
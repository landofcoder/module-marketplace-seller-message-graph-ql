<?php

declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\GraphQl\Model\Query\ContextInterface;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use \Lof\MarketPlace\Model\ResourceModel\MessageDetail\CollectionFactory;



class SellerMessageDetail implements ResolverInterface
{
  
    /**
     * @var CollectionFactory
     */
    protected $detailCollectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Lof\MarketPlace\Model\MessageDetail $detail
     * 
     * 
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CollectionFactory $detailCollectionFactory

    ) {
        $this->request = $context->getRequest();
        $this->detailCollectionFactory = $detailCollectionFactory;
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
       
        if (!isset($value['id'])) {
            throw new GraphQlInputException(__('Value must contain "id" property.'));
        }
        $id = $value['id'];
        $messDetails = $this->detailCollectionFactory->create()->addFieldToFilter('message_id', $id);
        $data=[];
        foreach ($messDetails as $messegedetail) {
            $data[] = [
                'content' => $messegedetail->getContent(),
                'sender_name' => $messegedetail->getData('sender_name'),
                'created_at'=>$messegedetail->getCreatedAt()
            ];
        }
        return $data;
    }
}

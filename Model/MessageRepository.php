<?php
/**
 * Copyright © Landofcoder All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Model;

use Lof\SellerMessageGraphQl\Api\MessageRepositoryInterface;
use Lof\SellerMessageGraphQl\Api\Data\MessageInterface;
use Lof\SellerMessageGraphQl\Api\Data\MessageInterfaceFactory;
use Lof\SellerMessageGraphQl\Api\Data\MessageSearchResultsInterfaceFactory;
use Lof\SellerMessageGraphQl\Api\Data\AdminMessageInterface;
use Lof\SellerMessageGraphQl\Api\Data\AdminMessageInterfaceFactory;
use Lof\SellerMessageGraphQl\Api\Data\AdminMessageSearchResultsInterfaceFactory;
use Lof\MarketPlace\Model\ResourceModel\Message\CollectionFactory as MessageCollectionFactory;
use Lof\MarketPlace\Model\ResourceModel\MessageDetail\CollectionFactory as MessageDetailCollectionFactory;
use Lof\MarketPlace\Model\ResourceModel\MessageAdmin\CollectionFactory as MessageAdminCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;

/**
 * Class MessageRepository
 */
class MessageRepository implements MessageRepositoryInterface
{

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * SellerMessageRepository constructor.
     * @param MessageCollectionFactory $messageCollectionFactory
     * @param MessageDetailCollectionFactory $messageDetailCollectionFactory
     * @param MessageAdminCollectionFactory $messageAdminCollectionFactory
     * @param MessageInterfaceFactory $dataMessageFactory
     * @param MessageSearchResultsInterfaceFactory $searchResultsFactory
     * @param AdminMessageInterfaceFactory $dataAdminMessageFactory
     * @param AdminMessageSearchResultsInterfaceFactory $searchAdminResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        MessageCollectionFactory $messageCollectionFactory,
        MessageDetailCollectionFactory $messageDetailCollectionFactory,
        MessageAdminCollectionFactory $messageAdminCollectionFactory,
        MessageInterfaceFactory $dataMessageFactory,
        MessageSearchResultsInterfaceFactory $searchResultsFactory,
        AdminMessageInterfaceFactory $dataAdminMessageFactory,
        AdminMessageSearchResultsInterfaceFactory $searchAdminResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->messageDetailCollectionFactory = $messageDetailCollectionFactory;
        $this->messageCollectionFactory = $messageCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->dataAdminMessageFactory = $dataAdminMessageFactory;
        $this->searchAdminResultsFactory = $searchAdminResultsFactory;
        $this->messageAdminCollectionFactory = $messageAdminCollectionFactory;
        $this->dataMessageFactory = $dataMessageFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getListSellerMessages(
        int $sellerId,
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->messageCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Lof\SellerMessageGraphQl\Api\Data\MessageInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $collection->addFieldToFilter("owner_id", $sellerId);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $key => $model) {
            $items[] = $this->getDataModel($model->getData());
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function getListSellerAdminMessages(
        int $sellerId,
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->messageAdminCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Lof\SellerMessageGraphQl\Api\Data\AdminMessageInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $collection->addFieldToFilter("seller_id", $sellerId);

        $searchResults = $this->searchAdminResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $key => $model) {
            $items[] = $this->getDataModel($model->getData());
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function getListMessages(
        int $customerId,
        \Magento\Framework\Api\getListMessages $criteria
    ) {
        $collection = $this->messageCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Lof\SellerMessageGraphQl\Api\Data\MessageInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $collection->addFieldToFilter("sender_id", $customerId);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $key => $model) {
            $items[] = $this->getDataModel($model->getData());
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * convert array data to object
     *
     * @param array|mixed $data
     * @param bool $isAdmin
     * @return MessageInterface|AdminMessageInterface
     */
    public function getDataModel($data = [], $isAdmin = false)
    {
        if ($isAdmin) {
            $dataObject = $this->dataAdminMessageFactory->create();

            $this->dataObjectHelper->populateWithArray(
                $dataObject,
                $data,
                AdminMessageInterface::class
            );
        } else {
            $dataObject = $this->dataMessageFactory->create();

            $this->dataObjectHelper->populateWithArray(
                $dataObject,
                $data,
                MessageInterface::class
            );
        }
        
        return $dataObject;
    }
}

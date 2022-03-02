<?php
/**
 * Copyright © Landofcoder All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface MessageRepositoryInterface
 */
interface MessageRepositoryInterface
{

//     /**
//      * @param int $sellerId
//      * @param int $messageId
//      * @return bool|string
//      */
//     public function setIsReadMessage(
//         int $sellerId,
//         int $messageId
//     );

//     /**
//     * @param int $sellerId
//     * @param int $messageId
//     * @return bool|string
//     */
//    public function setIsReadAdminMessage(
//        int $sellerId,
//        int $messageId
//    );

    /**
     * @param int $sellerId
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Lof\SellerMessageGraphQl\Api\Data\MessageSearchResultsInterface
     */
    public function getListSellerMessages(
        int $sellerId,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * @param int $sellerId
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Lof\SellerMessageGraphQl\Api\Data\AdminMessageSearchResultsInterface
     */
    public function getListSellerAdminMessages(
        int $sellerId,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * @param int $customerId
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Lof\SellerMessageGraphQl\Api\Data\MessageSearchResultsInterface
     */
    public function getListMessages(
        int $customerId,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * @param string $subject
     * @param string $message
     * @return mixed
     */
    public function sendMessageAdmin(string $subject, string $message);
}

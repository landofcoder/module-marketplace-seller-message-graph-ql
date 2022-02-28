<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Mapper;

use \Lof\MarketPlace\Api\Data\SellerMessageInterfaceFactory as sellermessageFactory;

/**
 * Converts the review data from review object to an associative array
 */
class ReviewDataMapper
{
    /**
     * Mapping the review data
     *
     * @param SellerMessageInterfaceFactory $sellermessageFactory
     *
     * @return array
     */
    public function map(SellerMessageInterfaceFactory $sellermessageFactory): array
    {
        return [
            'message_id' => $sellermessageFactory->getData('message_id'),
            'content' => $sellermessageFactory->getData('content'),
        ];
    }
}

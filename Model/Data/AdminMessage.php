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
 * @package    Lof_MarketPlace
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */

namespace Lof\SellerMessageGraphQl\Model\Data;

use Lof\SellerMessageGraphQl\Api\Data\AdminMessageInterface;

/**
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @codeCoverageIgnore
 */
class AdminMessage extends \Magento\Framework\Api\AbstractExtensibleObject implements AdminMessageInterface
{
    /**
     * @inheritDoc
     */
    public function getAdminmessageId()
    {
        return $this->_get(self::ADMINMESSAGE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setAdminmessageId($adminmessageId)
    {
        return $this->setData(self::ADMINMESSAGE_ID, $adminmessageId);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getSubject()
    {
        return $this->_get(self::SUBJECT);
    }

    /**
     * @inheritDoc
     */
    public function setSubject($subject)
    {
        return $this->setData(self::SUBJECT, $subject);
    }

    /**
     * @inheritDoc
     */
    public function getAdminEmail()
    {
        return $this->_get(self::ADMIN_EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setAdminEmail($adminEmail)
    {
        return $this->setData(self::ADMIN_EMAIL, $adminEmail);
    }

    /**
     * @inheritDoc
     */
    public function getAdminName()
    {
        return $this->_get(self::ADMIN_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setAdminName($adminName)
    {
        return $this->setData(self::ADMIN_NAME, $adminName);
    }

    /**
     * @inheritDoc
     */
    public function getSellerEmail()
    {
        return $this->_get(self::SELLER_EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setSellerEmail($sellerEmail)
    {
        return $this->setData(self::SELLER_EMAIL, $sellerEmail);
    }

    /**
     * @inheritDoc
     */
    public function getSellerName()
    {
        return $this->_get(self::SELLER_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setSellerName($sellerName)
    {
        return $this->setData(self::SELLER_NAME, $sellerName);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getIsRead()
    {
        return $this->_get(self::IS_READ);
    }

    /**
     * @inheritDoc
     */
    public function setIsRead($isRead)
    {
        return $this->setData(self::IS_READ, $isRead);
    }

    /**
     * @inheritDoc
     */
    public function getAdminId()
    {
        return $this->_get(self::ADMIN_ID);
    }

    /**
     * @inheritDoc
     */
    public function setAdminId($adminId)
    {
        return $this->setData(self::ADMIN_ID, $adminId);
    }

    /**
     * @inheritDoc
     */
    public function getOwnerId()
    {
        return $this->_get(self::OWNER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setOwnerId($ownerId)
    {
        return $this->setData(self::OWNER_ID, $ownerId);
    }

    /**
     * @inheritDoc
     */
    public function getSellerId()
    {
        return $this->_get(self::SELLER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSellerId($sellerId)
    {
        return $this->setData(self::SELLER_ID, $sellerId);
    }

    /**
     * @inheritDoc
     */
    public function getReceiverId()
    {
        return $this->_get(self::RECEIVER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setReceiverId($receiverId)
    {
        return $this->setData(self::RECEIVER_ID, $receiverId);
    }

    /**
     * @inheritDoc
     */
    public function getSellerSend()
    {
        return $this->_get(self::SELLER_SEND);
    }

    /**
     * @inheritDoc
     */
    public function setSellerSend($sellerSend)
    {
        return $this->setData(self::SELLER_SEND, $sellerSend);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * {@inheritdoc}
     */
    public function setExtensionAttributes(
        \Lof\SellerMessageGraphQl\Api\Data\AdminMessageExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}

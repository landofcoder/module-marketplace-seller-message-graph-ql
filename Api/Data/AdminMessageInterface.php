<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\SellerMessageGraphQl\Api\Data;

interface AdminMessageInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ADMIN_ID = 'admin_id';
    const OWNER_ID = 'owner_id';
    const STATUS = 'status';
    const SELLER_ID = 'seller_id';
    const SELLER_EMAIL = 'seller_email';
    const SELLER_SEND = 'seller_send';
    const ADMIN_EMAIL = 'admin_email';
    const DESCRIPTION = 'description';
    const ADMINMESSAGE_ID = 'adminmessage_id';
    const RECEIVER_ID = 'receiver_id';
    const ADMIN_NAME = 'admin_name';
    const CREATED_AT = 'created_at';
    const SELLER_NAME = 'seller_name';
    const SUBJECT = 'subject';
    const IS_READ = 'is_read';

    /**
     * Get adminmessage_id
     * @return string|null
     */
    public function getAdminmessageId();

    /**
     * Set adminmessage_id
     * @param string $adminmessageId
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setAdminmessageId($adminmessageId);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setDescription($description);

    /**
     * Get subject
     * @return string|null
     */
    public function getSubject();

    /**
     * Set subject
     * @param string $subject
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setSubject($subject);

    /**
     * Get admin_email
     * @return string|null
     */
    public function getAdminEmail();

    /**
     * Set admin_email
     * @param string $adminEmail
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setAdminEmail($adminEmail);

    /**
     * Get admin_name
     * @return string|null
     */
    public function getAdminName();

    /**
     * Set admin_name
     * @param string $adminName
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setAdminName($adminName);

    /**
     * Get seller_email
     * @return string|null
     */
    public function getSellerEmail();

    /**
     * Set seller_email
     * @param string $sellerEmail
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setSellerEmail($sellerEmail);

    /**
     * Get seller_name
     * @return string|null
     */
    public function getSellerName();

    /**
     * Set seller_name
     * @param string $sellerName
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setSellerName($sellerName);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setStatus($status);

    /**
     * Get is_read
     * @return string|null
     */
    public function getIsRead();

    /**
     * Set is_read
     * @param string $isRead
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setIsRead($isRead);

    /**
     * Get admin_id
     * @return string|null
     */
    public function getAdminId();

    /**
     * Set admin_id
     * @param string $adminId
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setAdminId($adminId);

    /**
     * Get owner_id
     * @return string|null
     */
    public function getOwnerId();

    /**
     * Set owner_id
     * @param string $ownerId
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setOwnerId($ownerId);

    /**
     * Get seller_id
     * @return string|null
     */
    public function getSellerId();

    /**
     * Set seller_id
     * @param string $sellerId
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setSellerId($sellerId);

    /**
     * Get receiver_id
     * @return string|null
     */
    public function getReceiverId();

    /**
     * Set receiver_id
     * @param string $receiverId
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setReceiverId($receiverId);

    /**
     * Get seller_send
     * @return string|null
     */
    public function getSellerSend();

    /**
     * Set seller_send
     * @param string $sellerSend
     * @return \Lof\SellerMessageGraphQl\AdminMessage\Api\Data\AdminMessageInterface
     */
    public function setSellerSend($sellerSend);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Lof\SellerMessageGraphQl\Api\Data\AdminMessageExtensionInterface|\Magento\Framework\Api\ExtensionAttributesInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Lof\SellerMessageGraphQl\Api\Data\AdminMessageExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Lof\SellerMessageGraphQl\Api\Data\AdminMessageExtensionInterface $extensionAttributes
    );
}


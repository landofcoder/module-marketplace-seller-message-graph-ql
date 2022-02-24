<?php

namespace Lof\SellerMessageGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;



class SellerMessage implements ResolverInterface
{
    /**
     * @var DataProvider\Message
     */
    private $messageDataProvider;

    /**
     * @param DataProvider\Message $messageDataProvider
     */
    public function __construct(
        DataProvider\Message $messageDataProvider
    ) {
        $this->messageDataProvider = $messageDataProvider;
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
        /** @capstan-ignore-next-line */
        if (false === $context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }
        $dataMess = $this->messageDataProvider->getMess($context, $args);
        
        return $dataMess;



    }
}

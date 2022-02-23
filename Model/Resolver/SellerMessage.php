<?php
namespace Lof\SellerMessageGraphQl\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class SellerMessage implements ResolverInterface
{
    private $messageDataProvider;
    /**
     * @param DataProvider\Message $messageRepository
     */
    public function __construct(
        \Lof\SellerMessageGraphQl\Model\Resolver\DataProvider\Message $messageDataProvider
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
        $messData = $this->messageDataProvider->getMess();
        return $messData;
    }
}
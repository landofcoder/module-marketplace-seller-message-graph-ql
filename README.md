# Mage2 Module Lof SellerOrderGraphQl

    ``landofcoder/module-marketplace-seller-fulfillment-graphql
``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
magento 2 marketplace graphql extension

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Lof`
 - Enable the module by running `php bin/magento module:enable Lof_SellerOrderGraphQl`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require landofcoder/module-marketplace-seller-graphql`
 - enable the module by running `php bin/magento module:enable Lof_SellerOrderGraphQl`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### TODO
- Refactor Graphql queries
- Refactor Resolvers
- Add documendation for Graphql queries

## Queries

1. Get Message By CustomerId
{
  lofListMessage {
    items {
      description
      subject
      status
      created_at
      id
      messDetails {
        content
        sender_name
        created_at
      }
    }
  }
}
2. mutation customer send message seller
mutation {
  LofMkpCustomerSendMessageSeller(input: {seller_id: "2", content: "hákhdkjashd"}) {
    code
    message
  }
}
3. Replies messege


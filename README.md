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
```
{
  sellerMessages(
    filter
    pageSize
    currentPage
    sort
  ) {
    items {
      message_id
      description
      subject
      status
      created_at
      sender_email
      sender_name
      is_read
      sender_id
      owner_id
      receiver_id
      messDetails {
        content
        sender_name
        created_at
      }
    }
  }
}
```
2. Get admin message
```
{
  sellerAdminMessages(
    filter
    pageSize
    currentPage
    sort
  ) {
    total_count
    page_info
    items {
      message_id
      description
      subject
      status
      admin_email
      created_at
      admin_name
      seller_email
      seller_name
      is_read
      sender_id
      admin_id
      owner_id
      seller_id
      receiver_id
      seller_send
      messDetails {
        content
        sender_name
        created_at
      }
    }
  }
}
```
3.1 customer list mesage
```
{
  customerMessages(
  	filter:{}
  )
  {
   	items{
   		created_at
      description
      subject
      status
			message_id   
    }
  }
}
```

3. mutation customer send message seller
```
mutation {
  customerSendMessage(input: {seller_url: "testseller", content: ""}) {
    code
    message
  }
}
```
4. customer Replies messege
```
mutation{
  customerReplyMessage(input:{message_id: "",content: "" }){
    code
    message
  }
}
```
5. Seller reply message
```
mutation{
  sellerReplyMessage(message_id: "",content: "" ){
    code
    message
  }
}
```
6. Seller Send Message to admin
```
mutation{
  sellerSendAdminMessage(subject: "",message: "" ){
    code
    message
  }
}
```

7. Seller reply message
```
muation{
  sellerReplyAdminMessage(message_id: "",content: "" ){
    code
    message
  }
}
```



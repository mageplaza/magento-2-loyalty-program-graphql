# Magento 2 Loyalty Program GraphQL/PWA

**Magento 2 Loyalty Program GraphQL is now a part of the Mageplaza Loyalty Program extension that adds GraphQL features to your Magento 2 stores. This supports PWA compatibility.** 

[Mageplaza Loyalty Program for Magento 2](https://www.mageplaza.com/magento-2-loyalty-program/) brings a useful way to retain customers and build their loyalty. Besides multiple exclusive discount programs, the module enables you to do more for your customers to keep them connected to your brand. 

It’s easy to create discount programs based on your customers’ order status and customer attributes. From the admin backend, you can create special discounts and apply them to the customers whose orders match the conditions you set. The conditions can be set based on the number of orders, total order amount, the average order amount, order status, purchase history, and more. The extension is integrated with Mageplaza Customer Attributes so you can create discounts according to customer attributes which are more specialized to your customers. 

When implementing loyalty programs, you can keep in touch with customers by sending them emails that confirm their successful loyalty programs or the expiration of their participation. These emails will be a bridge between you and your customers that help you keep them active and interested in joining and following the loyalty program. 

In addition to that, you can create an intuitive loyalty program page in each customer’ account. On this page, customers can view the details of loyalty programs and relevant order statistics. They can update the expiration dates of their loyalty programs here by looking at the estimated expiration date so it’s more flexible to use the discounts before it’s gone. Customers can also choose to receive email notifications about their loyalty programs or not right on this page.

With this app, loyalty program management becomes much easier. All your loyalty programs will be organized in a grid which displays their name, status, number of customers, rules, expiration dates, and more. You can create new programs here and edit each program right away with a few clicks. 

Building and maintaining customer loyalty is important for any online business. With Mageplaza Loyalty Program, this will be much easier as you can create loyalty programs in a faster and more efficient way. 

## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-loyalty-program-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

**Note:**
Magento 2 Loyalty Program GraphQL requires installing [Mageplaza Loyalty Program](https://www.mageplaza.com/magento-2-loyalty-program/) in your Magento installation.

## 2. How to use

To perform GraphQL queries in Magento, please do the following requirements:

- Use Magento 2.3.x or higher. Set your site to [developer mode](https://www.mageplaza.com/devdocs/enable-disable-developer-mode-magento-2.html).
- Set GraphQL endpoint as `http://<magento2-server>/graphql` in url box, click **Set endpoint**.
  (e.g. `http://dev.site.com/graphql`)
- To view the queries that the **Mageplaza Loyalty Program GraphQL** extension supports, you can look in `Docs > Query` in the right corner

## 3. Devdocs

- [Loyalty Program API & examples](https://documenter.getpostman.com/view/10589000/T1DmEepF?version=latest)
- [Loyalty Program GraphQL & examples](https://documenter.getpostman.com/view/10589000/TVsrEoVD)


## 4. Contribute to this module

Feel free to **Fork** and contribute to this module. 
You can create a pull request so we will merge your changes main branch.

## 5. Get Support

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any further questions.
- Like this project, Give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)

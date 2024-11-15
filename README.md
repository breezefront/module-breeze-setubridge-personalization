# SetuBridge_Personalization

Breeze integration with [SetuBridge Product Designer](https://store.setubridge.com/product-designer-magento-2.html).

## Required patches

`SetuBridge/Personalization/view/frontend/web/js/listingPagePopup.js`

```diff
     function ($, modal, loader, customerData, $t) {
         "use strict";
         return function (config, node) {
-            var product_id = jQuery(node).data("id");
-            var product_url = jQuery(node).data("url");
+            var product_id = $(node).data("id");
+            var product_url = $(node).data("url");
             var options = {
                 type: "popup",
                 responsive: true,

```

`SetuBridge/Personalization/view/frontend/web/js/popupview.js`

```diff
     function ($, modal, loader, customerData, $t) {
         "use strict";
         return function (config, node) {
-            var product_id = jQuery(node).data("id");
-            var product_url = jQuery(node).data("url");
+            var product_id = $(node).data("id");
+            var product_url = $(node).data("url");
             var firstTimeLoadStatus = true;
             var options = {
                 type: "popup",

```

`SetuBridge/Personalization/view/frontend/web/js/redirectCustomizePage.js`

```diff
@@ -8,14 +8,14 @@
     function ($, modal, loader, customerData, $t) {
         "use strict";
         return function (config, node) {
-            var product_id = jQuery(node).data("id");
-            var product_url = jQuery(node).data("url");
+            var product_id = $(node).data("id");
+            var product_url = $(node).data("url");
             var configOptionsUpdateValuesArray = {};

             $("#customize-product-button").on("click", function (event) {
                 event.preventDefault();

-              //  if(jQuery("#product_addtocart_form").valid()){
+              //  if($("#product_addtocart_form").valid()){
                     $("body").trigger('processStart');
                     $("#customize-product-button").attr("disabled", true);
                     var button_text = $("#customize-product-button span").text();
@@ -28,10 +28,10 @@
                     if(!$.isEmptyObject(configOptionsUpdateValuesArray)){

                         var configOptionsUpdateValuesAllProducts = {};
-                        if(jQuery.type( JSON.parse(localStorage.getItem("configOptionsUpdateValuesArray"))) != "object"){
+                        if(!JSON.parse(localStorage.getItem("configOptionsUpdateValuesArray")) instanceof "object"){
                             localStorage.removeItem('configOptionsUpdateValuesArray');
                         }
-                        if(!jQuery.isEmptyObject(JSON.parse(localStorage.getItem("configOptionsUpdateValuesArray")))){
+                        if(!$.isEmptyObject(JSON.parse(localStorage.getItem("configOptionsUpdateValuesArray")))){
                             configOptionsUpdateValuesAllProducts = JSON.parse(localStorage.getItem("configOptionsUpdateValuesArray"));
                         }
                         configOptionsUpdateValuesAllProducts[product_id] = configOptionsUpdateValuesArray;
@@ -46,7 +46,7 @@

             var productConfigOptionsSetValues = function () {

-                jQuery('#product_addtocart_form .field.configurable select').each(function() {
+                $('#product_addtocart_form .field.configurable select').each(function() {

                     var selectedAttrId = $(this).attr('id');
                     var selectedValue =  $(this).val();

```

## Installation

```bash
composer require swissup/module-breeze-setubridge-personalization
bin/magento module:enable Swissup_BreezeSetubridgePersonalization
```

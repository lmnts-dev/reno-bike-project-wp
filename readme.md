# Reno Bike Project
By Laxalt & McIver

## Frontend Setup
1. From the root directory, type `yarn install`
2. After that, type `gulp` to begin watching the `/pipeline` folder. We pipe everything from there into the respective Wordpress and Shopify themes.

## Wordpress Setup
1. Open the `/wordpress` folder. 
2. Run `composer install`
3. Run `lando start`

### Wordpress Deployment
1. Run `lando push` 

## Shopify Setup
1. Install Shopify Themekit.
2. Run `theme watch` from the `/shopify` folder.

## Run _ngrok for mobile testing
1. Run Gulp / Lando
2. Run `_ngrok/ngrok http 3000` from `/`
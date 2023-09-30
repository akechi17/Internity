---
author: Ahmad Bayhaqi
pubDatetime: 2023-09-22
title: how to deploy
postSlug: how-to-deploy
featured: false
draft: false
tags:
  - laravel
  - vite
ogImage: ""
description: documentation for deploying internity application
---
### Introduction
this guide will cover you to deploying Internity app on linux based operating system. you might reference to [vite docs](https://vitejs.dev/guide/static-deploy.html)to further support. 

## Prerequisites
this application running on laravel and vue stack, with monolith type. that's mean all application front-end and back-end included in one repository. At least you might prepared this foundational tools

- `npm` node package manager, guide to install [here](https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-22-04)
- `composer` php package manager, guide to install [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-22-04)
- database `MySQL`, guide to install [here](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-22-04)
- `meilisearch` guide to install [here](https://www.meilisearch.com/docs/learn/getting_started/installation)
- last you might be need some php extension 

this guide expected you're installing and completed prerequisites step before continuing next step. 

## Step 1 - clone repository 
clone Internity repository on github with following command

```bash
git clone git@github.com:Internity-dev/Internity.gitv
```

## Step 2 - prepare laravel 
you might be wonder where internity source code should placed. but don't worry we can move then. to running app properly you must installing laravel dependency with following command.

```bash
composer install
composer update
composer dump-autoload
```

## Step 3 - prepare vite
install npm depedency with following command.

```bash
npm install
```

build vite with following command

```
npm run build
```

if you found and error you can follow this step to [increase chunksize](https://stackoverflow.com/questions/69260715/skipping-larger-chunks-while-running-npm-run-build). or just adding this line to `vite.config.js`

```javascript
export default defineConfig({
....
build: {
        rollupOptions: {
            output:{
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                }
            }
        }
    }
});
```

## Step 4 - prepare .env

## Step 5 - prepare nginx

## Conclusion
this documentation might be confuse some part, if you faced an issue when installing this application don't be hestitate to open an issue or just ask us and this guide can be improved.

Thank you from writer!


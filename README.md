# php_template

This repository will help you get started with LAMP stack.

## Prerequisite
- Docker
- Any IDE to edit code

## Project structure
```
.
├── DocumentRoot
│   ├── index.php
│   ├── sample.php
│   └── setup.php
├── docker-compose.yml
└── php-apache
    └── Dockerfile
   ``` 
## Build steps

1. `cd php-apache; docker build -t maarut/lamp .`
2. `docker-compose up`
3. Open browser and navigate to http://localhost/setup.php
4. navigate to http://localhost/sample.php
5. Start adding code under DocumentRoot.




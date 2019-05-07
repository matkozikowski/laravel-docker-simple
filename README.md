Application
========================

Information to build enviroment

### Build Project
 - docker-compose up --build

### Application include
 - address http://127.0.0.1:71
 - category CRUD
 - product CRUD
 - dump sql located in mysql-dump folder
 - redis for vote service
 - phpmyadmin: http://127.0.0.1:8000/
 - simple rest api
    - Endpoint http://127.0.0.1:71/api/products, http://127.0.0.1:71/api/categories

### Refresh steps
 - rm -rf db_data
 - rm -rf redis_data
 - docker-compose down -v
 - docker-compose up --build

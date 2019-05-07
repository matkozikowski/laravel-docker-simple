Application
========================

Information to build enviroment

### Build Project
 - docker-compose up --build 

### Application include
 - address 127.0.0.1:71
 - category CRUD
 - product CRUD
 - dump sql located in mysql-dump folder
 - redis for vote service
 - simple rest api
    - Endpoint 127.0.0.1:71/api/products, 127.0.0.1:71/api/categories

### Refresh steps
 - rm -rf db_data
 - rm -rf redis_data
 - docker-compose down -v 
 - docker-compose up --build 
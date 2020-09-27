# api-php

## Requirement :computer::memo:
- PHP
- MySql
- PostMan [https://www.postman.com/]

### Fetch all data
- GET Method
- http://localhost/api/posts/read.php

### Fetch data by Id
- GET Method
- http://localhost/api/posts/readById.php?id=2

### Create data by Id
- POST Method
- http://localhost/api/posts/create.php
- Add Content-Type: application/json in Header
- Add raw data in Body
    ```

    {
        "name": "Update",
        "description": "desc update"
    }

### Update data by Id
- PUT Method
- http://localhost/api/posts/update.php
- Add Content-Type: application/json in Header
- Add raw data in Body
    ```

    {
        "id": "2",
        "name": "Update",
        "description": "desc update"
    }

### Delete data by Id
- DELETE Method
- http://localhost/api/posts/delete.php
- Add Content-Type: application/json in Header
- Add raw data in Body
    ```

    {
        "id": "4",
    }

:sunglasses::sunglasses::sunglasses:

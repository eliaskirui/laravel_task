
## Tasks project

Project setup 
- clone project on your local machine
- add .env file with your database credentials
- run `composer install`
- run `php artisan migrate`
- run `php artisan db:seed`
- run `php artisan serve`

## Public API endpoints

### POST /api/signup - create new user account
#### Request body
```
{
    "name": "John Doe",
    "email": "jdoe@example.com"
    "password": "password"
    "password_confirmation": "password"
}
```
#### Response
```
{
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "jdoe@example.com",
        "email_verified_at": null,
        "created_at": "2021-03-21T12:00:00.000000Z",
        "updated_at": "2021-03-21T12:00:00.000000Z"
    }
}

```

### POST /api/login - get access token

#### Request body

```
{
    "email": "jdoe@example.com",
    "password": "password"
}
```

### Response Body

```
{
    "data" "access_token"
}
```

    
    
- POST /api/signup - create new user account
- POST /api/login - get access token


## API endpoints with access token

### GET /api/tasks - get all tasks
#### Request headers
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer {access_token}
```
#### Response
```
{
    "data": [
        {
            "id": 1,
            "title": "Task 1",
            "description": "Task 1 description",
            "status": "new",
            "created_at": "2021-03-21T12:00:00.000000Z",
            "updated_at": "2021-03-21T12:00:00.000000Z"
        },
        {
            "id": 2,
            "title": "Task 2",
            "description": "Task 2 description",
            "status": "new",
            "created_at": "2021-03-21T12:00:00.000000Z",
            "updated_at": "2021-03-21T12:00:00.000000Z"
        }
    ]
}
```

### GET /api/tasks/{id} - get task by id
#### Request headers
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer {access_token}
```

#### Response
```
{
    "data": {
        "id": 1,
        "title": "Task 1",
        "description": "Task 1 description",
        "status": "new",
        "created_at": "2021-03-21T12:00:00.000000Z",
        "updated_at": "2021-03-21T12:00:00.000000Z"
    }
}
```

### POST /api/tasks - create new task
#### Request headers
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer {access_token}
```
#### Request body
```
{
    "title": "Task 1",
    "description": "Task 1 description",
    "status": "new"
}
```
#### Response
```
{
    "data": {
        "id": 1,
        "title": "Task 1",
        "description": "Task 1 description",
        "status": "new",
        "created_at": "2021-03-21T12:00:00.000000Z",
        "updated_at": "2021-03-21T12:00:00.000000Z"
    }
}
```

### PUT /api/tasks/{id} - update task by id
#### Request headers
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer {access_token}
```
#### Request body
```
{
    "title": "Task 1",
    "description": "Task 1 description",
    "status": "new"
}
```

#### Response
```
{
    "data": {
        "id": 1,
        "title": "Task 1",
        "description": "Task 1 description",
        "status": "new",
        "created_at": "2021-03-21T12:00:00.000000Z",
        "updated_at": "2021-03-21T12:00:00.000000Z"
    }
}
```

### DELETE /api/tasks/{id} - delete task by id
#### Request headers
```
Accept: application/json
Content-Type: application/json
Authorization: Bearer {access_token}
```

#### Response
```
{
    "data": {
        "id": 1,
        "title": "Task 1",
        "description": "Task 1 description",
        "status": "new",
        "created_at": "2021-03-21T12:00:00.000000Z",
        "updated_at": "2021-03-21T12:00:00.000000Z"
    }
}
```


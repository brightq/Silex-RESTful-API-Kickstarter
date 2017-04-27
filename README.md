# Silex RESTful API Kickstarter
version 1.0 BQ20170427

This is the kickstarter API used for develop a RESTful API with Silex


## API Usage
----


**List Resource**
----
| Method| Resource|Comment|
| ------ | ------ | ------ |
| POST| /api/auth/resetPassword | Reset login Password|
| POST| /api/auth/login | User login return token|
| GET| /api/auth/extendtoken | Get extent token for keep the session |
| | | |
| GET | /api/articles| Retrive a list of article |
| GET | /api/article/{id}| |
| POST | /api/article| |
| PUT | /api/article/{id}| |
| DELETE | /api/article/{id}| |


**POST	/api/auth/resetPassword**
----
    Returns json data when success.

  * **URL**

    /api/auth/resetPassword

  * **Method:**

    `POST`
    
  *  **URL Params**

    `None`

  * **Data Params**
    ````
    {
          "username": "test1"
    }
    ````

  * **Success Response:**

    * **Code:** 200 
      **Content:** 
      ````
      { "message":"New temp password has been sent, please use the new temp password to login, after login please change your temp password" }
      ````
   
  * **Error Response:**

    * **Code:** 400 Bad request
      **Content:** 
      ````
      { "message":"bad input parameter" }
      ````

  * **Sample Call:**

    `curl --request POST  --url https://localhost/api/resetPassword --header 'cache-control: no-cache'  --data '{"username": "test1"}'`




## Code Structure


## Installation


## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History



## Credits



## License


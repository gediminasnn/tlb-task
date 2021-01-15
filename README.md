# tlb-task
Simple `/api/users` POST endpoint made for a job interview.

## Setup

Considering you already downloaded the code you must follow these steps:


**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.


**Start the built-in web server**

Symfony's local web server works best.

To install the Symfony local web server, follow
"Downloading the Symfony client" instructions found
here: https://symfony.com/download - you only need to do this
once on your system.

Then, to start the web server, open a terminal, move into the
project, and run:

```
symfony serve (-d)
```


(If this is your first time using this command, you may see an
error that you need to run `symfony server:ca:install` first).

**Setting up `api_key` field**

Before sending request body make sure to put api key in the header

`key` : `api_key`

`value` : `d195e8fb160ff29935bce1fe6772253b18ac92d6b74f1f7407c8cbafbf439d3e`


Now you can run users POST endpoint with request body in it link : `https://localhost:8000/api/users`


Request body example : 
    
    {
        "users": [
            {
                "first_name": "Tom",
                "last_name": "Hardy"
            },
            {
                "first_name": "Tom",
                "last_name": "Gnarly"
            }
        ]
    }

Response body should be :

    {
        "users": [
            {
                "full_name": "Tom Hardy"
            },
            {
                "full_name": "Tom Gnarly"
            }
        ]
    }   


## Testing

There is a test case for `/api/users` endpoint

To run it execute this command

    php bin/phpunit

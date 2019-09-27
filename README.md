# PHP DEVELOPER TEST
> Boilerplate project for interview coding test

## Available Make Commands

* `make` - Starts container
* `make build` - Rebuilds container
* `make shell` - Drops you into a bash shell inside the container
* `make logs` - Trails container stdout/stderr logs
* `make test` - Executes unit tests within the container

## Test Instructions

We would like you to build a simple web application, which should allow users to enter an arbitrary Github username, and be presented with a best guess of the Github user's favourite programming language. The code base should be clean (separation concern and apply best practices) with appropriate tests

This can be computed by using the Github API to fetch all of the user's public Github repos, each of which includes the name of the dominant language for the repository.

Documentation for the Github API can be found [here](https://developer.github.com/v3/).

#### Complete the following user story

```dotenv
AS A user
I WOULD LIKE to search github’s api for specific users
SO THAT I can see what that user’s favourite language is

A/C:
* Access Github API:
    * Guess a user's favourite programming language
    * Handle any username
    * Handle errors appropriately
    * Consider useability of interface
    * Appropriate performance improvements
```

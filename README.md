# Decider
The Decider helps with refactoring when for example you want to refactor a project with a different framework.
The Decider focuses on web applications and is tested with a variety of PHP and javascript frameworks.

When refactoring a project with a different framework, you have to deal with two projects. Let's call these the old project and the new project.
While refactoring, the development of the overall project stagnates. This is undesirable, because clients usually would like to continue adding features and fixing bugs.

The Decider acts as an extra layer on top of the old and new project and will pick the desired project to execute a request. 
This way you can refactor the project part by part and continue development.


### Define your routes
If the old or new project will be used to execute the request depends on the defined routes.
When a route is defined, the request will be executed by the new project. Otherwise, it will use the old project (by default).

**Static routes**\
example: `/foo/bar`\
This static route needs to be copied literally into /decider/storage/registeredUris.json

**Variable routes**\
example: `/foo/5`\
The '5' is a variable Id in this example. To make this testable you need to convert this into a regex.\
The regex for this URL would be: `/^\/foo\/\d+$/`\
The regex strings need to be stored in /decider/storage/regexUris.json\
To format your regex into a string so it meets json syntax, you can use [this](https://www.freeformatter.com/json-escape.html) tool.

### Pre set
Laravel and Kohana adapters are available and ready to go with help of the `Config.sample.php` set by default.\
Copy `Config.sample.php` to `Config.php` and you are ready to go.\

Project uses MVC structural pattern that separates logic into Models - which deal with data manipulation, Views - which present information to the users, and Controllers - which control behaviour of entire application. 
It also uses Front Controller design pattern, which basically routes entire application trough one index.php file using mod_rewrite on apache, and by doing that it provides for more control over the access to the application. Allowing us easy and centralized access control, easy way of taking down the entire website during maintainance and big errors, easy performance measuring etc.
Singleton pattern is used for Database and Config because it enforces a single instance of each object, preventing multiple database connections by accid. With a note that Config could be refactored into regular object if singleton is not beneficial. Config is also made with more robust/standardized data storage in mind (.env files or similar). 
Router is injected as a dependency into other classes that use it (Controller Factory in current version), which allows for easy use of multiple different Router strategies, by simply making another way of parsing the route. 
Controller Factory uses simple factory design pattern, which returns proper, and already configured controller, which is then executed in main index.php file. 
Controllers extend main controller, using advantages of inheritance in OOP, so that children controllers can reuse code that is common for all controllers in general. 
Every model mostly follows Single Responsibility Principle, and is tested independently by using separated file. 

login details:
test@applicableprogramming.com
test

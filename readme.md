## Composer Autoloading
- Composer autoloading provides a variety of different [autoloading functionality](https://getcomposer.org/doc/04-schema.md#autoload), although it is recommended to use PSR 4 autoloading which is the default implementation.
- Autoloading classes with namespaces means it has to follow a convention, usually that convention involves using folders

## Namespace/ folder convention.
- Classes should be stored in folders according to their namespaces.
- In general, you will create a src/ directory in your root folder, sitting at the same level as vendor/, and add your projects there. Below is an example of folder structure.
```
.
+-- src
    |
    +-- Book 
    |   +-- History
    |   |   +-- UnitedStates.php - namespace Book\History;
    +-- Vehicle
    |   +-- Air
    |   |   +-- Wings
    |   |   |   +-- Airplane.php - namespace Vehicle\Air\Wings;
    |   +-- Road
    |   |   +-- Car.php - namespace Vehicle\Road;
+-- tests
    +-- test.php
+-- vendor
```
## Difference between psr-0 and psr-4 autoloading
- See http://stackoverflow.com/questions/24868586/what-is-the-difference-between-psr-0-and-psr-4
- See https://groups.google.com/d/msg/silverstripe-dev/i1voM50oFMk/rPouYXtnSA0J

### psr-0
It is deprecated. Looking at [```vendor/composer/autoload_namespaces.php```](https://jtreminio.com/2012/10/composer-namespaces-in-5-minutes/#the-autoload_namespaces.php-file) file you can see the namespaces and the directories that they are mapped to.

**composer.json**
```
    "autoload": {
        "psr-0": {
            "Book\\": "src/",
            "Vehicle\\": "src/"
        }
    }    
```

- Looking for **Book**\History\UnitedStates in **src/Book**/History/UnitedStates.php
- Looking for **Vehicle**\Air\Wings\Airplane in **src/Vehicle**/Air/Wings/Airplane.php

### psr-4
Looking at ```vendor/composer/autoload_psr4.php``` file you can see the namespaces and the directories that they are mapped to.

**composer.json**
```
    "autoload": {
        "psr-4": {
            "Book\\": "src/",
            "Vehicle\\": "src/"
        }
    }    
```
- Looking for **Book**\History\UnitedStates in **src**/History/UnitedStates.php
- Looking for **Vehicle**\Air\Wings\Airplane in **src**/Air/Wings/Airplane.php

**composer.json**
```
    "autoload": {
        "psr-4": {
            "Book\\": "src/Book/",
            "Vehicle\\": "src/Vehicle/"
        }
    }    
```
- Looking for **Book**\History\UnitedStates **src/Book**/History/UnitedStates.php
- Looking for **Vehicle**\Air\Wings\Airplane in **src/Vehicle**/Air/Wings/Airplane.php

## Be ready for production
Just a reminder, before deploying your code in production, don't forget to optimize the autoloader:
```
$ composer dump-autoload --optimize
```
This can also be used while installing packages with the --optimize-autoloader option. Without that optimization, you may notice a performance loss from 20 to 25%.
## Usage
See ```tests/test.php```
```
composer install
php tests/test.php
```
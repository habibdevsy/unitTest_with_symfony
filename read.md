# Unit Testing and PHPUnit
## What is Unit Testing and PHPUnit?
PHPUnit is a framework independent library for unit testing PHP.
Unit testing is a method by which small units of code are tested against expected results.

## Why Unit Test?
With unit testing we test each component of the code individually.
The importance of unit testing is that it guides you to a small mistake that causes problems in the future, thus saving you time and effort.
Tip (if your code is not testable, change the way the code is written so that it is testable).

## Difficult؟
Writing tests can be difficult, and writing good tests can be more difficult. This topic will be important to you in the long run.

## Requirements
```
composer require --dev symfony/phpunit-bridge
```
We’re using the --dev flag as we only need this installed for our dev environment, tests should not run in production.

Write the command to run the test in the command line:
 
 ```
 php bin / phpunit 
 ```
 You must see this name "Sebastian Bergmann and contributors" for things to be fine.
 
 ## Structure
      -- tests
 
            -- imageUnitTest.php
            
            -- fixtures
            
                -- values.php
                
   In the file "imageUnitTest.php" we write the tests.
   
   "Fixture" folder containing "Values.php" file Contains the expected and actual values that will determine the test result, In other words, the values.php file is the Provider Data.
   

## Clarify a few things

#### Mock
First we need to isolate the unit to be tested
We need something called a mock.
With it we spoof the connection to the database and also spoof any external resources we need inside the unit.
But what does this mean?
We need to test a unit that connects to the database, but we don't want to test the connection to the database. We just want to test this unit, so we use Mock to get an imaginary connection that gives us the result.

#### Assertions
The way we actually test our code is by using PHPUnit’s assertion methods:
```
assertEmpty($actual)
assertEquals($expected, $actual)
assertTrue($actual)
assertFalse($actual)
assertInstanceOf($expected, $actual)
```
You will find full documentation on the site : https://phpunit.de/manual/current/en/appendixes.assertions.html

#### The test function

The function name should begin with ( test)
```
function testCreateWithDataProvider( $expected, $actual)
 ```
 It receives two parameters from the data provider, and through assertEquals it performs unit tests if the inputs match the output, the result is correct
 ```
 assertEquals( $expected, $actual)
 ```
##### setUp()
Function that works before the test,Therefore, I will mock the Manager and inherit the automapping within it so that I do not need to repeat that.


#### Data Providers 
Data Providers is a useful feature in PHPUnit It allows you to run the same test with multiple expected inputs and outputs,The data provider required is determined through annotation as shown
```
    /**
     * @dataProvider provideCreate
     */
```
You wrote a data provider in a file "values.php" 
```
public function provideCreate(): array

    {
        return [
            'title'   => ['expected', 'actual']
        ];
    }

```

You have linked it with the imageUnitTest.php file through:
```
public function provideCreate()
    {
        $result = new values();
        return $result->provideCreate();
    }
```

## to run the test

```
php bin / phpunit
```
You should get
```
PHPUnit version by Sebastian Bergmann and contributors.

Testing Project Test Suite
...
           3 / 3 (100%)

Time: 453 ms, Memory: 6.00 MB

[30;42mOK (3 tests, 3 assertions)[0m
```
## Documentation (TestDox)
you can use PHPUnit's TestDox functionality to generate automated documentation for your project based on its tests as follows:

1- Create a file named "doc.php" inside the tests folder

2- in command line write : 

 ```
 php bin/phpunit --testdox-html tests/doc.html
 
```
You will get formatted HTML code to contain your test results.

## References
https://phpunit.de/

https://symfony.com/doc/current/testing.html

https://blog.martinhujer.cz/how-to-use-data-providers-in-phpunit/

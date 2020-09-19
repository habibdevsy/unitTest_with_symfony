# PHPUnit
## Why unit test
The importance of unit testing is that it guides you to a small mistake that causes problems in the future, thus saving you time and effort.
Tip (if your code is not testable, change the way the code is written so that it is testable)
## Requirements
- composer require --dev symfony/phpunit-bridge

 Write the command to run the test in the command line
 php bin / phpunit  You must see this name "Sebastian Bergmann and contributors" for things to be fine
 ## structure
      -- tests
 
            -- imageUnitTest.php
            
            -- fixtures
            
                -- values.php
                
   In the file "imageUnitTest.php" we write the tests.
   
   "Fixture" folder containing "Values.php" file Contains the expected and actual values that will determine the test result, In other words, the values.php file is the Provider Data
   
## Data Providers 
Data Providers is a useful feature in PHPUnit It allows you to run the same test with multiple expected inputs and outputs.

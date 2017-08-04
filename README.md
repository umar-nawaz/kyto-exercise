# kyto-exercise
A php web application that shows some ASCII star patterns according user's input for different sizes.  

## Features

- Currently shows 3 types of shapes and can be easily extended
- Simple and clean structure
- Size and Blocks can be given by user 
Avaiable Sizes:
● S ​[mall]: 5 lines height
● M ​[edium]: 7 lines height
● L ​[arge]: 11 lines height
Default Shapes:
- Star
- Tree

## Requirements

- PHP 7.0
- basic knowledge of OOP and Composer

## Installation

Clone repository to your server
```sh
git clone https://github.com/umar-nawaz/kyto-exercise.git

# composer install  

```

## Assumptions

- You already have setup Apache2 and PHP on system


## Usage Examples (on localhost)

- http://localhost/kyto-exercise/public/index.php
- http://localhost/kyto-exercise/public/index.php?shape=Star&size=M
- http://localhost/kyto-exercise/public/index.php?shape=Tree&size=L&brick=o

Note that input values are case sensitive. 

## TODOs:
- [ ] Add php autoload feature and get rid of old require/includes
- [ ] Setup PHPUnit for testing (An example class is given in repo)
- [ ] Figure out why Travis is failing and fix
- [ ] Add bash script for installing the project 

## Contribute

Creat your own feature branch, commit open PR. Better to add tests related to your code.
 
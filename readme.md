# CSCI E-15, P3, Kar Ho Lau

## Live URL
<http://p3.orangeedward.xyz>

## Description
The third assignment, P3, devloped with Laravel to provide a set of web developer's tools.

## Demo


## Details for teaching team
No login required.

The page is structured by Bootstrap for styling.

Breadcrumb is fixed to the bottom of the page with navbar-fixed-bottom.

All HTML's FORM 'INPUT' are all setup with Validation Attributes (Client Side Validation), it set input to be number and set MIN and MAX accordingly. It is also utilizing the 'VALIDATE()' function from Laravel to do a second validation for correct input (Server Side Validation)

## Outside code
* Bootstrap: [http://getbootstrap.com/](http://getbootstrap.com/)

## xkcd Password Generator
taken from P1, I had very minor modification (i.e. switching from PureCSS to bootstrap), and cleaned up some of the coding. form action was changed from GET to POST.

## Color Picker
idea inspired by: [http://www.javascripter.net/faq/rgbtohex.htm](http://www.javascripter.net/faq/rgbtohex.htm)

## Laravel packages
* Lorem Ipsum Generator: uses [badcow/lorem-ipsum](https://packagist.org/packages/badcow/lorem-ipsum)
* User Generator: uses [fzaninotto/faker](https://packagist.org/packages/fzaninotto/faker)
* Color Picker: uses [hasbridge/php-color](https://packagist.org/packages/hasbridge/php-color)
* Intervention Validation Class: Color Picker has a hexcolor validation, uses [intervention/validation](https://github.com/Intervention/validation)
* Octal Decoder: uses [ideil/binary-to-text-php](https://packagist.org/packages/ideil/binary-to-text-php)

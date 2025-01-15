# PHP Builders

[![Latest Version](https://img.shields.io/github/release/omaralalwi/php-builders.svg?style=flat-square)](https://github.com/omaralalwi/php-builders/releases)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)

**PHP Builders** is a sample PHP library that provides traits to implement the Builder design pattern easily in PHP applications. It allows developers to create builder classes that can construct complex objects in a fluent and readable manner.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
  - [Creating a Builder Class](#creating-a-builder-class)
  - [Using the Builder](#using-the-builder)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)

## Installation

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require omaralalwi/php-builders
```

## Usage

### Creating a Builder Class

To create a builder class, extend the `FluentBuilder` class and define your properties and methods.

```php
namespace App\Builders;

use Omaralalwi\PhpBuilders\FluentBuilder;

class UserBuilder extends FluentBuilder
{
    protected string $name;
    protected string $email;
    
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    
    public function sendEmail(): self
    {
       // handle send email to user or make any action
       // then return instance of self
       return $this;
    }
    
    // add any another functions then call them as you need
}
```

### Using the Builder

You can convert the built instance to an array or an object using the `toArray()` and `toObject()` methods.

#### Return Array

```php
$userArray = UserBuilder::build()
    ->setName('PHP Builders')
    ->setEmail('hello@phpbuilders.tetst')
    ->sendEmail()
    ->toArray();

getType($userArray) // Array
$userArray['name'] // PHP Builders
$userArray['email'] // hello@phpbuilders.tetst
```

#### Return Object

```php
$userObject = UserBuilder::build()
    ->setName('John Doe')
    ->setEmail('john@example.com')
    ->sendEmail()
    ->toObject();

getType($userArray) // object
$userArray->name // PHP Builders
$userArray->email // hello@phpbuilders.tetst
```

## Contributing

Contributions are welcome! If you have suggestions for improvements or new features, feel free to open an issue or submit a pull request on the [GitHub repository](https://github.com/omaralalwi/php-builders).

## Security

If you discover any security-related issues, please email creator : `omaralwi2010@gmail.com`.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

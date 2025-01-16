# PHP Builders

[![Latest Version](https://img.shields.io/github/release/omaralalwi/php-builders.svg?style=flat-square)](https://github.com/omaralalwi/php-builders/releases)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)

**PHP Builders** is a lightweight PHP library designed to simplify the implementation of the Builder design pattern in PHP applications. 

---

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
  - [By Extending `Fluentbuilder` in Builder Class](#by-extending-fluentbuilder-in-builder-class)
  - [By Include Traits in Builder Class](#by-include-traits)
  - [Cast Builder Class](#cast-builder-class)
    - [Return as Array](#return-as-array)
    - [Return as Object](#return-as-object)
    - [Return as JSON](#return-as-json)
- [Custom Execution Logic](#custom-execution-logic)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)

---

## Installation

Install the package via Composer using the following command:

```bash
composer require omaralalwi/php-builders
```

---

## Usage

**Note**: if you not use any PHP frameworks like (symfony,laravel,codeigniter,Yii,cakePHP..etc), you should add this line:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

**First Way**

### By Extending FluentBuilder in Builder Class

The `FluentBuilder` class integrates all available traits, enabling you to utilize all package features by simply extending this class.

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
        // Logic for sending an email
        return $this;
    }
}
```

**second Way**

### By Include Traits

simplify you can achieve same result by include `Buildable`, `Arrayable`, `Objectable`, `Jsonable` traits directly in builder class, without extending the `FluentBuilder` class.

```php
namespace App\Builders;

use Omaralalwi\PhpBuilders\Traits\{Buildable, Arrayable, Objectable, Jsonable};
use App\Models\User;

class UserBuilder
{
   use Buildable,
        Arrayable,
        Objectable,
        Jsonable;
        
        // same code in first way example
}
```

### cast Builder Class

use `UserBuilder` as following:

```php
$user = UserBuilder::build()
    ->setName('PHP Builders')
    ->setEmail('hello@phpbuilders.test')
    ->sendEmail();
```
then cast it to needed type as following:

**Return as Array**

Convert the built instance to an array using the `toArray()` method:

```php
$userAsArray = $user->toArray();
print_r($userAsArray);
/*
Output:
Array
(
    [name] => PHP Builders
    [email] => hello@phpbuilders.test
)
*/
```

**Return as Object**

Convert the built instance to an object using the `toObject()` method:

```php
$userAsObject = $user->toObject();
print_r($userAsObject);
/*
Output:
stdClass Object
(
    [name] => PHP Builders
    [email] => hello@phpbuilders.test
)
*/
```

**Return as JSON**

Convert the built instance to JSON using the `toJson()` method:

```php
$userAsJson = $user->toJson();
echo $userAsJson;
/*
Output:
{"name":"PHP Builders","email":"hello@phpbuilders.test"}
*/
```

---

#### Custom Execution Logic

```php
namespace App\Builders;

use Omaralalwi\PhpBuilders\FluentBuilder;
use App\Models\User;

class UserBuilder extends FluentBuilder
{
   // same code in previous example, just we added execute method .
   
    public function execute(): User
    {
        // Pre-store logic (e.g., validation, preprocessing)
        return $this->store();
    }

    protected function store(): User
    {
        return User::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }
}
```

```php
$createdUser = UserBuilder::build()
    ->setName('PHP Builders')
    ->setEmail('hello@phpbuilders.test')
    ->execute();
/*
$createdUser is an instance of the User model.
*/
```

> **Note:** Traits like `Arrayable`, `Objectable`, and `Jsonable` can also be included in your builder class as needed if you choose not to extend `FluentBuilder`.

---

## Contributing

Contributions are welcome! To propose improvements or report issues, please open an issue or submit a pull request on the [GitHub repository](https://github.com/omaralalwi/php-builders).

---

## Security

If you discover any security-related issues, please email the author at: `omaralwi2010@gmail.com`.

---

## License

This project is open-source and licensed under the [MIT License](LICENSE).


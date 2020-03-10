# Optional

![logo](logo.png)

The goal of the Optional library is to handle elegantly optional parameters in order to avoid control structures like `if` or `switch`, and to avoid multiple return types.

The code also becomes more declarative.

## Examples

### Sending user data to a template

Context: We want to display user data but the phone number is an optional one.

#### As usually seen

```php
<?php

// ---------------------------------------- interfaces

interface PhoneNumber
{
    public function toString(): string;
}

interface User
{
    public function firstname(): string;
    public function lastname(): string;
    public function phone(): PhoneNumber|null;
}

// ---------------------------------------- implementation

$this->templateEngine->render(
    'template/file/path/',
    [
        'firstname' => $user->firstname(),
        'lastname'  => $user->lastname(),
        'phone'     => is_null($user->phone())
                         ? '--.--.--.--.--'
                         : $user->phone()->toString(),
    ]
);
```

#### With Optional

```php
<?php

// ---------------------------------------- interfaces

interface PhoneNumber
{
    public function toString(): string;
}

interface User
{
    public function firstname(): string;
    public function lastname(): string;
    public function phone(): Maybe; // Maybe<PhoneNumber>
}

// ---------------------------------------- implementation

$this->templateEngine->render(
    'template/file/path/',
    [
        'firstname' => $user->firstname(),
        'lastname'  => $user->lastname(),
        'phone'     => $user->phone()
                            ->map(function (PhoneNumber $phone) { return $phone->toString(); })
                            ->getOr('--.--.--.--.--'),
    ]
);
```

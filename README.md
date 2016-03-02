Install with composer

```
composer require sift/sift-client-api:"dev-master"
```

Usage in your project

```php
use sift\SiftClientAPI

$client = new SiftClientAPI;

$email = 'test@test.com';
$client->verify_email($email);
```
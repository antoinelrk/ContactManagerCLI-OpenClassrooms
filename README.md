# Setup

*Coming soon*

# Améliorations prévues

1. Mettre en place une validation de paramètres:

```php
$validator = Validator::make($attributes, [
    'name' => 'required|string',
    'email' => 'required|email',
    'phone_number' => 'phone_number|required'
]);
```

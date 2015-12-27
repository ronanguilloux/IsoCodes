# CHANGELOG

## 2.0

### BC Breaks

#### [`SSN` validator now implement `IsoCodeInterface`](https://github.com/ronanguilloux/IsoCodes/pull/73)

To validate your SSN in `2.*`:

```php
Ssn::validate($ssn)
```

instead of deprecated `1.*`

```php
$this->ssn = new Ssn();
$this->ssn->validate($ssn)
```
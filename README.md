# Phauthentic Symfony AOP

Symfony bundle for [phauthentic/aop](https://github.com/Phauthentic/aop).
It collects aspects from the container, weaves proxies at compile time and adds the `debug:aop` command.

## Installation

Both packages are installed from GitHub:

```bash
composer config repositories.phauthentic-aop vcs https://github.com/Phauthentic/aop.git
composer config repositories.phauthentic-symfony-aop vcs https://github.com/Phauthentic/aop-symfony.git
composer require phauthentic/symfony-aop:dev-main
```

Enable the bundle in `config/bundles.php`:

```php
return [
    // ...
    Phauthentic\AOP\Symfony\PhauthenticAopBundle::class => ['all' => true],
];
```

A minimal `config/packages/phauthentic_aop.yaml`:

```yaml
phauthentic_aop:
    enabled: true
    proxy_strategy: auto
```

List the registered aspects and the services they weave:

```bash
bin/console debug:aop
```

## Compatibility

| PHP | Symfony 7.2 | Symfony 7.3 / 7.4 | Symfony 8.0 |
|---|---|---|---|
| 8.3 | supported | supported | not possible (Symfony 8 needs PHP 8.4) |
| 8.4 | supported | supported, native lazy objects | supported, native lazy objects |
| 8.5 | supported | supported, native lazy objects | supported, native lazy objects |

CI runs PHP 8.3, 8.4 and 8.5 against Symfony 7.4 and 8.0.

The bundle behaves the same on every stack except for `lazy: true` services woven with the subclass strategy:

- **Symfony 7.3 or newer on PHP 8.4 or newer** builds lazy services as native lazy objects and rejects the generated lazy proxies of older versions.
  A lazy woven service is then a native lazy ghost of the proxy class itself.
  The object the container hands out is the advised object: it is an `AdvisedInterface`, it implements interfaces added with `#[DeclareParents]`, and it initializes itself before the first advised call.
- **PHP 8.3, or Symfony 7.2** has no native lazy objects.
  The service is a generated lazy proxy of the target class that forwards to the advised instance, so the outer object is not an `AdvisedInterface`; call `initializeLazyObject()` to reach the advised instance.

PHP 8.5 reports the resolved class name instead of `self` for a `self` return type.
Pointcut type patterns match both forms, so `execution(self App\Service\Foo::*(..))` and `execution(App\Service\Foo App\Service\Foo::*(..))` behave the same on every version.

The "Lazy services" and "Proxy autoloading" sections of the [Symfony documentation](https://github.com/Phauthentic/aop/blob/main/docs/symfony.md) describe the mechanics.

## Documentation

Full documentation lives in the aop repository:
[Symfony integration](https://github.com/Phauthentic/aop/blob/main/docs/symfony.md)
and the [documentation index](https://github.com/Phauthentic/aop/blob/main/docs/README.md).

## Development

```bash
composer install
composer check
```

`composer check` runs the code style check, PHPStan at level max and the test suite with a coverage gate of 85 %.

CI runs the check on PHP 8.3, 8.4 and 8.5 against Symfony 7.4 and 8.0 (Symfony 8 requires PHP 8.4).
To test against one Symfony line locally, update the Symfony packages with a version constraint, for example `composer update --with 'symfony/http-kernel:8.0.*' --with 'symfony/framework-bundle:8.0.*'`.

## License

MIT, see [LICENSE](LICENSE).

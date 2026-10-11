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

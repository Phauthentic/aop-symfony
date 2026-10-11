# Phauthentic Symfony AOP

Symfony bundle for [phauthentic/aop](https://github.com/Phauthentic/aop).
It collects aspects from the container, weaves proxies at compile time and adds the `debug:aop` command.

## Installation

Both packages are installed from GitHub:

```bash
composer config repositories.phauthentic-aop vcs git@github.com:Phauthentic/aop.git
composer config repositories.phauthentic-symfony-aop vcs git@github.com:Phauthentic/symfony-aop.git
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

The core repository is private, so CI needs the `AOP_DEPLOY_KEY` secret.
It must hold the private half of a read-only deploy key registered on `Phauthentic/aop`.
Without it `composer install` cannot clone the core package.

## License

MIT, see [LICENSE](LICENSE).

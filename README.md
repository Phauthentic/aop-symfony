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

The bundle behaves the same on every stack except for `lazy: true` services woven with the subclass strategy.
The [compatibility section](docs/symfony.md#compatibility) of the Symfony documentation describes the difference, native lazy objects, and PHP 8.5.

## Documentation

- [Documentation index](docs/README.md)
- [Symfony bundle](docs/symfony.md): configuration, how weaving works, `strip_final`, `debug:aop`, troubleshooting
- [Core documentation](https://github.com/Phauthentic/aop/blob/main/docs/README.md): pointcut language, advice, proxies, introductions, standalone usage

A runnable demo application lives in [Phauthentic/aop-symfony-example](https://github.com/Phauthentic/aop-symfony-example).

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

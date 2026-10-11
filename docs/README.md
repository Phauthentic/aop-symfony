# Documentation

Documentation for `phauthentic/symfony-aop`, the Symfony bundle for [phauthentic/aop](https://github.com/Phauthentic/aop).
A complete runnable demo application lives in [Phauthentic/aop-symfony-example](https://github.com/Phauthentic/aop-symfony-example).

## Bundle documentation

All of it is on one page, [Symfony bundle](symfony.md):

| Section | Read it when |
|---|---|
| [Installation](symfony.md#installation) | You add the bundle to an application. |
| [Compatibility](symfony.md#compatibility) | You need the supported PHP and Symfony versions and the lazy service behaviour per stack. |
| [Configuration reference](symfony.md#configuration-reference) | You tune `proxy_strategy`, `include`, `exclude`, `proxy_dir` or `strip_final`. |
| [How weaving works](symfony.md#how-weaving-works) | You want the compiler passes step by step, the strategy rules for the container, `bean()`, lazy services and proxy autoloading. |
| [strip_final](symfony.md#strip_final-opt-in-risky) | You consider advising final classes and accept the risks. |
| [Cache and rebuild behaviour](symfony.md#cache-and-rebuild-behaviour) | You wonder where proxies live and when they are rebuilt. |
| [debug:aop](symfony.md#debugaop) | You want to see what is advised, by whom, and what was skipped. |
| [Troubleshooting](symfony.md#troubleshooting) | An aspect does not run or the build fails. |
| [Services registered by the bundle](symfony.md#services-registered-by-the-bundle) | You need the service ids the bundle defines. |
| [Aspect scopes](symfony.md#aspect-scopes) | You use `pertarget` or `perthis` aspects. |
| [Bundle internals](symfony.md#bundle-internals) | You contribute to the bundle and need the class responsibilities and the test setup. |

## Core documentation

The language-level documentation lives in the [core documentation index](https://github.com/Phauthentic/aop/blob/main/docs/README.md):

- [Concepts](https://github.com/Phauthentic/aop/blob/main/docs/concepts.md)
- [Pointcut expressions](https://github.com/Phauthentic/aop/blob/main/docs/pointcuts.md)
- [Advice](https://github.com/Phauthentic/aop/blob/main/docs/advice.md)
- [Proxies](https://github.com/Phauthentic/aop/blob/main/docs/proxies.md)
- [Introductions](https://github.com/Phauthentic/aop/blob/main/docs/introductions.md)
- [Standalone usage](https://github.com/Phauthentic/aop/blob/main/docs/standalone.md)
- [Examples](https://github.com/Phauthentic/aop/blob/main/docs/examples.md)
- [Architecture](https://github.com/Phauthentic/aop/blob/main/docs/architecture.md)

## Quick commands

```bash
bin/console debug:aop   # lists advised services, methods, advisors, introduced interfaces and skipped services
composer check          # php-cs-fixer, phpstan (level max), phpunit with a coverage gate
```

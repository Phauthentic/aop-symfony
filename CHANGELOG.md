# Changelog

All notable changes to this project are documented in this file.
The format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased]

### Added

- `PhauthenticAopBundle` with the `phauthentic_aop` configuration tree.
- Aspect collection from tagged services, with `#[Aspect]` scopes (singleton, perthis, pertarget).
- Compile-time proxy weaving: interface proxies, subclass proxies and opt-in `strip_final` for final classes.
- Self-invocation scanning of woven services.
- `debug:aop` console command listing aspects, advisors and runtime advice.
- Lazy service support for woven services.

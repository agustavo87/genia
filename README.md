# GenIA: Generative "Artificial Intelligence" (es) Image Generator

## Development and QA

### Docker Shell

```sh
composer run shell
```

### IDE Helper

You can generate IDE helper files `composer run help-ide`. Also the Model IDE helper files and docblocks are automatically generated when `make:model` artisan command is finished.

The code style can be analized and fixed with:
```sh
# Run laravel pint style fixes
composer run pint
```

The _~static_ code analysis can be run with:
```sh
# Run PHPStan code analyses
composer run larastan
```

To install a Git hook to run style, code analysis and tests before commit (git repository has to be initialized already):

```sh
# Installs the git hook for style, code analysis and tests
composer run install-git-hook
```
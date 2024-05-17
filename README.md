# GenIA: Generative "Artificial Intelligence" (es) Image Generator

### Install

```sh
git clone https://github.com/agustavo87/genia.git
```

A docker **development** enviroment with php 8.3 (cli), extensions and composer is included. Can be boot up with

```sh
docker compose up
```

In order to enter with a shell inside the development container

```sh
docker compose exec -it web bash
```

### IDE Helper

You can generate IDE helper files 

```sh
composer run help-ide
```

Also the Model IDE helper files and docblocks are automatically generated when `make:model` artisan command is finished.

### QA

Several actions can be run with composer scripts

```sh
# Code style check and fixes with laravel pint (phpcs).
composer run pint

# The static code analysis can be run with:
composer run larastan

# Test the app (Unit, Components, Feature test suites).
composer run test
```

A git hook that is run before a commit is provided. It make the following checks:

- Code style check
- Static code analysis.
- Tests

Can be installed with

```sh
# Installs the git hook for style, code analysis and tests
composer run install-git-hook
```
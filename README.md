# BrewPHP project

This project was created from the [BrewPHP](https://github.com/brewphp/brewphp)
skeleton. BrewPHP is a small, Django-inspired PHP framework.

## First steps

```bash
composer create-project brewphp/skeleton myapp
cd myapp
php manage.php serve
```

Open <http://127.0.0.1:8000/> and you should see the welcome page.

`create-project` already copied `.env.example` to `.env` and generated a
`SECRET_KEY`. If you cloned this project instead, do it yourself:

```bash
composer install
cp .env.example .env
php manage.php key:generate
```

## Useful commands

| Command | What it does |
|---|---|
| `php manage.php serve` | Start the development server on 127.0.0.1:8000 |
| `php manage.php routes` | List every URL pattern |
| `php manage.php check` | Look for configuration problems |
| `php manage.php about` | Show versions and installed apps |
| `php manage.php list` | Show every command |
| `composer test` | Run the tests |

## Project layout

```
config/settings.php   settings (values from .env)
config/urls.php       root URLconf
apps/pages/           the sample "pages" app: views, urls, templates, tests
templates/            project-level templates (override any app template)
static/               project static files
media/                user uploads
storage/              cache, logs, sessions, compiled templates, SQLite database
public/index.php      front controller: point your web server here
manage.php            command-line entry point
```

## Database

The project uses SQLite out of the box: the database is the file
`storage/db.sqlite3`, created on first use. To use MySQL or PostgreSQL, set
the `DB_*` variables in `.env` (see `.env.example`). Until migrations
arrive in BrewPHP 0.4, create tables with the schema editor, as explained in
the [models documentation](https://docs.brewphp.dev/topics/models/#creating-the-tables).

Read the documentation at <https://docs.brewphp.dev>.

## Note for BrewPHP contributors

While BrewPHP is in development, `composer.json` uses a Composer
[path repository](https://getcomposer.org/doc/05-repositories.md#path)
pointing to `../brewphp` and requires `brewphp/brewphp: @dev`, so the
skeleton always runs against the framework checkout next to it. Before the
first release, the path repository is removed and the constraint becomes
`^0.1` (this is on the release checklist).

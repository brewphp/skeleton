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
| `php manage.php startapp blog` | Create a new app in `apps/blog/` |
| `php manage.php makemigrations` | Write migrations for changes to your models |
| `php manage.php migrate` | Apply migrations to the database |
| `php manage.php showmigrations` | List migrations and whether they are applied |
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
templates/            project-level templates: base.html layout, overrides of app templates
static/               project static files
media/                user uploads
storage/              cache, logs, sessions, compiled templates, SQLite database
public/index.php      front controller: point your web server here
manage.php            command-line entry point
```

## Templates

Pages are `.html` templates in the BrewPHP template language, which works
like Django's: `{{ variable }}`, `{% tag %}` and `{% extends %}`. The home
page `apps/pages/templates/pages/home.html` extends the layout
`templates/base.html`. Templates are compiled to PHP once and cached in
`storage/templates/`. See the
[templates documentation](https://docs.brewphp.dev/topics/templates/).

## Database

The project uses SQLite out of the box: the database is the file
`storage/db.sqlite3`, created on first use. To use MySQL or PostgreSQL, set
the `DB_*` variables in `.env` (see `.env.example`).

Tables come from migrations, like in Django. After adding or changing models
in an app, write the migration and apply it:

```bash
php manage.php makemigrations
php manage.php migrate
```

Commit the files in `apps/<app>/migrations/` with your code. See the
[migrations documentation](https://docs.brewphp.dev/topics/migrations/).

Read the documentation at <https://docs.brewphp.dev>.

## Note for BrewPHP contributors

While BrewPHP is in development, `composer.json` uses a Composer
[path repository](https://getcomposer.org/doc/05-repositories.md#path)
pointing to `../brewphp` and requires `brewphp/brewphp: @dev`, so the
skeleton always runs against the framework checkout next to it. Before the
first release, the path repository is removed and the constraint becomes
`^0.1` (this is on the release checklist).

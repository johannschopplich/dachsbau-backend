# Dachsbau Backend

> ℹ️ Forked from [Kirby Headless Starter](https://github.com/johannschopplich/kirby-headless-starter). All of the features and settings apply here as well.

This website is intended as the backend for the Nuxt.js frontend. If the URL is called and no `Authentication` header is sent with the requerst, the user will automatically forwarded to the Kirby Panel. Especially useful users managing content.

## Prerequisites

- PHP 8.0+

> Kirby is not a free software. You can try it for free on your local machine but in order to run Kirby on a public server you must purchase a [valid license](https://getkirby.com/buy).

## Setup

### Composer

Kirby-related dependencies are managed via [Composer](https://getcomposer.org) and located in the `vendor` directory. To install them, run:

```bash
composer install
```

### Environment Variables

Duplicate the [`.env.development.example`](.env.development.example) as `.env`:

```bash
cp .env.development.example .env
```

Optionally, adapt it's values.

## Usage

### Bearer Token

If you prefer to use a token to secure your Kirby installation, set the environment variable `KIRBY_HEADLESS_API_TOKEN` with a token of your choice.

You will then have to provide the header `Bearer ${token}` with each request.

> ⚠️ Without a token the `/query` route would be publicly accessible by everyone. Be careful.

### Deployment

> ℹ️ See [ploi-deploy.sh](./scripts/ploi-deploy.sh) for exemplary deployment instructions.

> ℹ️ Some hosting environments require to uncomment `RewriteBase /` in [`.htaccess`](public/.htaccess) to make site links work.

## License

[MIT](./LICENSE) License © 2022 [Johann Schopplich](https://github.com/johannschopplich)

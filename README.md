<div align="center">

# Dachsbau Tautenhain (Backend)

Headless Kirby backend for [dachsbau-tautenhain.de](https://dachsbau-tautenhain.de).

[Website](https://dachsbau-tautenhain.de) •
[Frontend](https://github.com/johannschopplich/dachsbau-frontend)

</div>

## Why

Madlen – one of my closest friends – moved into the Dachsbau in Tautenhain to bundle her skills in one place and turn her passion into a profession. Julia Frank and I designed and built the website for her venture: Julia drew the illustrations, I did code and photography. This repository is the content half – a headless Kirby instance that serves the [Nuxt 4 frontend](https://github.com/johannschopplich/dachsbau-frontend) over KQL.

The project doubled as a prototype: there was no best-practice solution for running Kirby truly headless in 2022, so the [kirby-headless-starter](https://github.com/johannschopplich/kirby-headless-starter) and [nuxt-kql](https://nuxt-kql.byjohann.dev) (today [Nuxt Kirby](https://nuxt-kirby.byjohann.dev)) grew out of this site.

## How It's Built

- [Kirby 5](https://getkirby.com) – flat-file CMS, running pure headless (the only template redirects to the Panel)
- [Kirby Headless](https://github.com/johannschopplich/kirby-headless) – bearer-token authentication, KQL endpoint, CORS
- [Cacao Kit Backend](https://github.com/johannschopplich/cacao-kit-backend) as the base – block-first content modeling

Everything site-specific lives in blueprints and `site/config`: a German panel, custom section blocks (`section-backers`, `section-blog`) and a blocks resolver that maps file UUIDs to URLs and dimensions. Content, accounts and media are not committed – the repository ships structure and configuration only.

## Development

1. Create your `.env` from the example:

   ```bash
   cp .env.development.example .env
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Run the PHP server – or use a dev server of your choice (e.g. Laravel Valet):

   ```bash
   composer start
   ```

Linting and formatting run through pnpm: `pnpm install`, then `pnpm run lint` or `pnpm run format`.

Deployment runs through [`scripts/ploi-deploy.sh`](./scripts/ploi-deploy.sh) on [ploi.io](https://ploi.io).

## License

[MIT](./LICENSE) License © 2022-PRESENT [Johann Schopplich](https://github.com/johannschopplich)

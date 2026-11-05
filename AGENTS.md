# dachsbau-backend

Headless Kirby backend of dachsbau-tautenhain.de, the website of the Dachsbau Tautenhain; the Nuxt frontend lives in `../dachsbau-frontend`.

## Commands

```bash
composer start                     # PHP server on localhost:8000, or Herd
pnpm lint
pnpm format:check
scripts/sync-content.sh --upload   # dry run; --apply rsyncs storage/content (not in git), --download pulls
```

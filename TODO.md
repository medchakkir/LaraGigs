# TODO

## Phase 1 – Documentation & Housekeeping
- [ ] Improve README.md: short tagline, badges, screenshots, features, quick start, tech stack
- [ ] Refresh .env.example with required keys
- [ ] Add CHANGELOG.md
- [ ] Add Laravel Pint and Prettier config for code style

## Phase 2 – Frontend & Blade polish
- [x] Convert repeated UI into Blade components (layout, nav, footer, flash-message, listing-card, pagination)
- [x] Ensure @stack/@push regions are preserved
- [x] Apply custom pagination view everywhere
- [x] Add accessibility (aria-labels, focus styles, semantic tags)
- [x] Confirm Alpine.js v3 usage with integrity + crossorigin
- [x] Improve error pages (resources/views/errors/404.blade.php)
- [x] Standardize color scheme across the application
- [x] Center forms vertically and horizontally for better UX
- [x] Improve visual contrast and accessibility in both light and dark modes
- [x] Fix flash message auto-dismiss and close button functionality
- [x] Remove default white borders/outlines on focus
- [x] Improve text content and wording throughout the app for clarity and consistency

## Phase 3 – Backend improvements
- [x] Move inline validation to FormRequests
- [x] Add authorization (Policies/Gates) so only owners can edit/delete listings
- [x] Ensure route model binding is used in controllers
- [x] Review fillable/guarded in models
- [x] Add database indexes and constraints where needed

## Phase 4 – Testing & CI
- [ ] Add feature tests (index/search, show, create/edit/delete, pagination)
- [ ] Add unit tests for model scopes/helpers
- [ ] Add GitHub Actions workflow for Pint + tests

## Phase 5 – Enhancements (optional)
- [ ] Dark mode toggle with Tailwind
- [ ] SEO improvements: meta tags/OG tags
- [ ] Add RSS feed for listings
- [ ] Add sitemap.xml generation
- [ ] Add simple rate limiting for create/update actions

Keep tasks concise, checkable, and in logical order. Output only the TODO.md file.

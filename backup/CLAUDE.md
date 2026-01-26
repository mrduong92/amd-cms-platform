# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

NMT AUTO is a single-page static website for an industrial equipment and renewable energy solutions company. The site is written in Vietnamese and showcases lithium batteries, AI safety cameras, energy storage systems, and forklift services.

## Technology Stack

- **HTML5** - Single file website (`code.html`)
- **Tailwind CSS** - Loaded via CDN with plugins (forms, typography, container-queries)
- **Google Fonts** - Inter (body) and Outfit (headings)
- **Material Symbols** - Icon library from Google

## Development

This is a static HTML file with no build process. To develop:

1. Open `code.html` directly in a browser
2. Or serve with any static file server (e.g., `python -m http.server 8000`)

No package manager, build tools, or testing framework is configured.

## Design System

**Colors (defined in Tailwind config):**
- Primary: `#F97316` (orange)
- Secondary: `#0F172A` (deep navy)
- Background light: `#F8FAFC`
- Background dark: `#020617`

**Custom CSS classes:**
- `.glass-nav` - Glass-morphism effect for navigation
- `.hero-gradient` - Navy overlay gradient
- `.tab-active` / `.tab-inactive` - Product tab states
- `.social-tab-active` / `.social-tab-inactive` - Social media section tabs
- `.hide-scrollbar` - Hides scrollbar on overflow elements

**Dark mode:** Enabled via Tailwind's `class` strategy. Toggle button exists in the UI.

## Structure

The single HTML file contains these sections in order:
1. Navigation (fixed glass-morphism navbar)
2. Hero section with solar energy imagery
3. Industrial solutions grid (6 service categories)
4. Company values/about section
5. Product catalog with tabbed interface (lithium batteries)
6. News and projects
7. Social media feeds (Facebook, YouTube, TikTok placeholders)
8. Partners section
9. Footer with contact info and newsletter

## Notes

- All images are hosted externally (Google AIDA public images)
- Language attribute is set to Vietnamese (`lang="vi"`)
- Responsive design with mobile hamburger menu

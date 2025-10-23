# Changelog

All notable changes to this project will be documented in this file.

## [v1.1.0] - 2025-10-23
### 🚀 Added
- Translation support using `Spatie\LaravelPackageTools` → `hasTranslations()`
- English and Arabic language files under `resources/lang`
- Vendor publish tag `support-ticket-translations` for overriding translations
- Comprehensive `README.md` documentation for installation and usage

### ♻️ Changed
- Refactored `SupportTicketServiceProvider` for cleaner configuration and service registration
- Improved package autoloading structure and PSR-4 compliance
- Updated package file loading (config, routes, migrations, views)

### 🧹 Fixed
- Minor path issues in migration and resource registration
- Improved naming conventions for consistency and clarity

### 📘 Documentation
- Added a detailed setup and translation guide to the README
- Documented publishing commands for configuration and translations

---

## [v1.0.0] - Initial Release
- Basic support ticket management system
- CRUD operations for tickets
- Migration and configuration publishing
- Route and model registration

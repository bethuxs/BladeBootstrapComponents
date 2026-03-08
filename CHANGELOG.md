# Changelog

All notable changes to this project will be documented in this file.

## [1.2.0] - 2026-03-08

### Added
- 🧪 **Pest Testing Framework** - Comprehensive test suite with 50+ tests
  - Feature tests for all form components
  - Feature tests for all UI components
  - Feature tests for all layout components
  - Unit tests for CountriesHelper
  - Custom Pest expectations: `toContainHtml()`, `toHaveAttribute()`
- 🔍 **PHPStan Static Analysis** - Code quality checks at level 8
- 🤖 **GitHub Actions CI/CD** - Automated testing on PHP 8.0, 8.1, 8.2, 8.3
- 📖 **TESTING.md** - Complete testing documentation
- 📝 **composer.json scripts** - `test`, `test:coverage`, `analyze` commands

## [1.1.0] - 2026-03-07

### Added
- ✨ **17 Basic Bootstrap 5 Components**
  - Form: checkbox, radio, checkbox-group, radio-group, file
  - Layout: card, tabs, accordion, collapse, dropdown, list-group, navbar, pagination, offcanvas, empty-state, skeleton
- ✨ **Alert Component** (`<x-bs::alert`) - Dismissible alert boxes with multiple types
- ✨ **Modal Component** (`<x-bs::modal`) - Bootstrap modal dialogs with customizable sizes
- ✨ **Badge Component** (`<x-bs::badge`) - Badge/label component with variants and pill style
- ✨ **Progress Component** (`<x-bs::progress`) - Progress bars with striped and animated options
- ✨ **Spinner Component** (`<x-bs::spinner`) - Loading spinners (border and growing types)
- ✨ **Breadcrumb Component** (`<x-bs::breadcrumb`) - Navigation breadcrumb with active states
- ✨ **Error Message Component** (`<x-bs::messages.error`) - Field-specific error display
- ✨ **CountriesHelper Utility Class** - Helper functions for working with country data
- 📚 **EXAMPLES.md** - Comprehensive examples for all components
- 📝 **Enhanced README** - Complete documentation with all components and usage examples

### Fixed
- 🐛 **Countries Component** - Fixed incorrect key mapping (code → iso)
- 🐛 **Flash Messages** - Improved styling and added dismiss button
- 🐛 **Validation Messages** - Enhanced styling and accessibility
- 🐛 **Form Component** - Better HTTP method handling (GET, POST, PUT, PATCH, DELETE)

### Improved
- ✅ **Internationalization (i18n)** - All hardcoded strings now use Laravel's translation helpers
  - "Selecciona un país" → `__('Select a country')`
  - "¿Estás seguro?" → `__('Are you sure?')`
  - "Please fix the following errors:" → translatable
- ♿ **Accessibility** - Enhanced with ARIA labels and semantic HTML
  - All inputs/textareas have `id` attributes linked to labels
  - Added `role` attributes to alert and progress components
  - Improved keyboard navigation
  - Better screen reader support
- 📋 **Component Props** - Added explicit `@props` to all components
  - `select.blade.php` - Now has complete prop definitions
  - `input.blade.php` - Added `type` prop (default: text)
  - `textarea.blade.php` - Added `rows` prop (default: 3)
  - `button.blade.php` - Added explicit `type` prop (default: button)
  - `form.blade.php` - Better method handling with HTTP verb support
- 🎯 **Consistency** - Fixed Bootstrap classes across components
  - Changed `form-control` to `form-select` for select elements
  - Added `d-block` to error feedback for better visibility
  - Consistent use of `form-label` class

### Changed
- 🔄 **Service Provider** - Better code organization and type hints
- 📖 **Documentation** - Complete rewrite with component-by-component guide

### Security
- 🔒 Improved error message handling with proper escaping

## [1.0.0] - Initial Release

### Added
- Basic form components (form, input, textarea, button, select)
- Countries select component
- Message components (flash, validation)
- Table component with actions
- Bootstrap 5 integration
- Laravel 11 support

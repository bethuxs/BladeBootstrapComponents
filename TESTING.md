# Testing

This project uses Pest for testing. Pest is a modern testing framework for Laravel with a delightful syntax.

## Installation

Install dev dependencies:

```bash
composer install --dev
```

## Running Tests

Run all tests:

```bash
composer test
```

Run tests with coverage:

```bash
composer test:coverage
```

Run specific test file:

```bash
vendor/bin/pest tests/Unit/CountriesHelperTest.php
```

Run tests by group:

```bash
vendor/bin/pest --group countries
```

Run tests in parallel:

```bash
vendor/bin/pest --parallel
```

## Test Structure

```
tests/
├── bootstrap.php           # Test bootstrap file
├── TestCase.php            # Base test case class
├── Pest.php               # Pest configuration and helpers
├── Feature/               # Feature tests
│   ├── FormComponentsTest.php
│   ├── UIComponentsTest.php
│   └── LayoutComponentsTest.php
└── Unit/                  # Unit tests
    └── CountriesHelperTest.php
```

## Test Coverage

Tests cover:

- ✅ All form components (input, textarea, select, checkbox, radio, file)
- ✅ All UI components (alert, badge, progress, spinner, breadcrumb, modal, table, card)
- ✅ All layout components (tabs, accordion, collapse, dropdown, list-group, navbar, offcanvas, empty-state, skeleton)
- ✅ CountriesHelper utility class
- ✅ Component rendering output
- ✅ HTML attribute presence
- ✅ CSS class application
- ✅ Error handling

## Custom Expectations

### `toContainHtml($html)`
Check if rendered output contains HTML:

```php
expect($rendered)->toContainHtml('value="email"');
```

### `toHaveAttribute($attribute, $value = null)`
Check if rendered output has attribute:

```php
expect($rendered)->toHaveAttribute('type', 'email');
expect($rendered)->toHaveAttribute('required');
```

## Writing Tests

Example test:

```php
test('input component renders correctly', function () {
    $rendered = Blade::render(<<<'HTML'
        <x-bs::form.input name="email" label="Email" type="email" />
    HTML);
    
    expect($rendered)
        ->toContainHtml('type="email"')
        ->toContainHtml('name="email"')
        ->toContainHtml('form-control');
});
```

## CI/CD

Tests automatically run on:
- Every push to `main` or `develop` branches
- Every pull request to `main` or `develop` branches
- Tests run on PHP 8.0, 8.1, 8.2, 8.3 with Laravel 11

Coverage reports are uploaded to Codecov.

## Tips

- Use `test()` instead of `it()` for clarity
- Use descriptive test names
- Group related tests with `->group('name')`
- Use `expect()` for assertions (more readable than `$this->assert*()`)

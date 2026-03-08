# Bethuxs Blade Bootstrap Components

A lightweight and flexible library of Blade components designed to integrate seamlessly with Bootstrap 5. This library simplifies building responsive UIs in Laravel by encapsulating Bootstrap 5 components into reusable Blade templates.

---

## Features

- ✨ Prebuilt components for common Bootstrap 5 elements
- 🔧 Fully customizable with dynamic attributes
- 📦 Easy integration with Laravel projects
- ♿ Accessibility-first design (ARIA labels, semantic HTML)
- 🌐 Internationalization (i18n) support built-in
- 🎨 Supports Bootstrap's utility classes
- 💡 Well-typed component props

---

## Installation

### Requirements

- **Laravel**: 11.x (PHP 8.0+)
- **PHP**: 8.0 or higher
- **Bootstrap**: 5.x

### Steps

1. Install the package via Composer:

   ```bash
   composer require bethuxs/blade-bootstrap-components
   ```

2. The components are automatically registered. No need to publish!

3. Include the Bootstrap 5 assets in your application:

   ```html
   <!-- Add in your main layout file -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   ```

---

## Components

### Form Components

#### `<x-bs::form>`
Main form wrapper with automatic CSRF and method handling.

```blade
<x-bs::form method="POST" route="products.store">
  <!-- Form content here -->
</x-bs::form>
```

**Props:**
- `method` (string, default: `"POST"`) - HTTP method
- `route` (string) - Route name for action
- `submit` (string) - Submit button text (optional)

---

#### `<x-bs::form.input>`
Text input with label and error handling.

```blade
<x-bs::form.input 
  name="email" 
  label="Email" 
  type="email"
  value="{{ old('email') }}"
/>
```

**Props:**
- `name` (required) - Input name attribute
- `label` (string) - Label text
- `value` (mixed) - Input value
- `type` (string, default: `"text"`) - Input type
- `placeholder` (string) - Placeholder text

---

#### `<x-bs::form.textarea>`
Multi-line text input with customizable rows.

```blade
<x-bs::form.textarea
  name="description"
  label="Description"
  rows="5"
  value="{{ old('description') }}"
/>
```

**Props:**
- `name` (required) - Textarea name
- `label` (string) - Label text
- `value` (mixed) - Textarea content
- `rows` (int, default: `3`) - Number of rows

---

#### `<x-bs::form.button`
Styled button with Bootstrap classes.

```blade
<x-bs::form.button 
  label="Save" 
  type="submit" 
  contextual="success"
/>
```

**Props:**
- `label` (string) - Button text
- `type` (string, default: `"button"`) - Button type
- `contextual` (string, default: `"primary"`) - Bootstrap color (primary, success, danger, etc.)
- `size` (string) - Size (sm, lg)

---

#### `<x-bs::form.select`
Dropdown select with error handling.

```blade
<x-bs::form.select
  name="status"
  label="Status"
  :options="['active' => 'Active', 'inactive' => 'Inactive']"
  placeholder="Select a status"
/>
```

**Props:**
- `name` (required) - Select name
- `label` (string) - Label text
- `options` (array, default: `[]`) - Options key => value
- `placeholder` (string) - Placeholder option text
- `value` (mixed) - Selected value

---

#### `<x-bs::form.countries`
Select component pre-filled with world countries.

```blade
<x-bs::form.countries
  name="country"
  label="Country"
  useIso="false"
/>
```

**Props:**
- `name` (required) - Select name
- `label` (string) - Label text
- `useIso` (bool, default: `false`) - Use ISO code (true) or emoji (false)
- `placeholder` (string, default: `__('Select a country')`)
- `value` (mixed) - Selected value

---

### Message Components

#### `<x-bs::messages.all`
Display both flash and validation messages.

```blade
<x-bs::messages.all />
```

---

#### `<x-bs::messages.flash`
Session flash messages with auto-dismiss.

```blade
<x-bs::messages.flash />
```

---

#### `<x-bs::messages.validation`
Validation error summaries.

```blade
<x-bs::messages.validation />
```

---

#### `<x-bs::messages.error`
Field-specific error message.

```blade
<x-bs::messages.error field="email" />
```

---

### Alert & Feedback

#### `<x-bs::alert`
Dismissible alert component.

```blade
<x-bs::alert type="success" title="Success!">
  Your changes have been saved.
</x-bs::alert>
```

**Props:**
- `type` (string, default: `"info"`) - Alert type (success, danger, warning, info)
- `title` (string) - Alert title
- `dismissible` (bool, default: `true`) - Show close button

---

#### `<x-bs::badge`
Badge/label component.

```blade
<x-bs::badge variant="primary" pill>
  New
</x-bs::badge>
```

**Props:**
- `variant` (string, default: `"primary"`) - Badge color
- `pill` (bool, default: `false`) - Rounded corners

---

#### `<x-bs::progress`
Progress bar.

```blade
<x-bs::progress 
  value="65" 
  max="100" 
  variant="success"
  striped
/>
```

**Props:**
- `value` (int, default: `0`) - Current value
- `max` (int, default: `100`) - Maximum value
- `variant` (string, default: `"primary"`) - Color
- `striped` (bool) - Striped pattern
- `animated` (bool) - Animation effect
- `label` (string) - Custom label

---

#### `<x-bs::spinner`
Loading spinner.

```blade
<x-bs::spinner type="border" size="sm" />
```

**Props:**
- `type` (string, default: `"border"`) - Type (border, grow)
- `size` (string) - Size (sm, lg)
- `label` (string) - Accessibility label

---

### Navigation & Layout

#### `<x-bs::breadcrumb`
Breadcrumb navigation.

```blade
<x-bs::breadcrumb :items="[
  ['label' => 'Home', 'url' => route('home')],
  ['label' => 'Products', 'url' => route('products.index')],
  ['label' => 'Edit', 'url' => null],
]" />
```

**Props:**
- `items` (array) - Breadcrumb items with label and optional url

---

#### `<x-bs::modal`
Bootstrap modal dialog.

```blade
<x-bs::modal id="confirmModal" title="Confirm Action" centered>
  <p>Are you sure?</p>
</x-bs::modal>
```

**Props:**
- `id` (required) - Modal ID
- `title` (string) - Modal title
- `size` (string) - Size (sm, lg, xl)
- `centered` (bool) - Center modal vertically
- `scrollable` (bool) - Scrollable content

---

#### `<x-bs::table`
Styled table wrapper.

```blade
<x-bs::table :thead="'<tr><th>Name</th><th>Email</th></tr>'">
  @foreach($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
    </tr>
  @endforeach
</x-bs::table>
```

---

#### `<x-bs::table.actions`
Action buttons for table rows.

```blade
<x-bs::table.actions
  viewRoute="{{ route('users.show', $user->id) }}"
  editRoute="{{ route('users.edit', $user->id) }}"
  deleteRoute="{{ route('users.destroy', $user->id) }}"
/>
```

**Props:**
- `viewRoute` (string) - View link (optional)
- `editRoute` (string) - Edit link (optional)
- `deleteRoute` (string) - Delete form action (optional, shows confirmation)

---

## Helpers

### CountriesHelper

Utility class for working with country data.

```php
use Bethuxs\BladeBootstrapComponents\CountriesHelper;

// Get all countries
$countries = CountriesHelper::all();

// Get as select options (iso => name)
$options = CountriesHelper::asOptions();

// Get as emoji options
$emojiOptions = CountriesHelper::asEmojiOptions();

// Find by ISO code
$country = CountriesHelper::findByIso('US');

// Find by emoji
$country = CountriesHelper::findByEmoji('🇺🇸');
```

---

## Complete Form Example

```blade
<x-bs::form method="POST" route="users.store">
  <div class="row">
    <div class="col-md-6">
      <x-bs::form.input
        name="name"
        label="Full Name"
        type="text"
        required
      />
    </div>
    <div class="col-md-6">
      <x-bs::form.input
        name="email"
        label="Email Address"
        type="email"
        required
      />
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <x-bs::form.select
        name="country"
        label="Country"
        :options="CountriesHelper::asOptions()"
      />
    </div>
    <div class="col-md-6">
      <x-bs::form.input
        name="phone"
        label="Phone Number"
        type="tel"
      />
    </div>
  </div>

  <x-bs::form.textarea
    name="bio"
    label="Biography"
    rows="4"
  />

  <div class="mt-3">
    <x-bs::form.button label="Save" type="submit" contextual="success" />
    <x-bs::form.button label="Cancel" contextual="secondary" />
  </div>
</x-bs::form>
```

---

## Customization

Components follow Bootstrap 5 conventions and accept standard HTML attributes through `$attributes`. You can override individual components by creating files in your app's `resources/views/components/` directory.

---

## Contributing

Contributions are welcome! Please submit pull requests to improve components and documentation.

---

## License

This project is open-sourced software licensed under the [MIT license](LICENSE.md).

---

## Changelog

### v1.1.0 (Current)
- ✨ Added Alert component
- ✨ Added Modal component  
- ✨ Added Badge component
- ✨ Added Progress component
- ✨ Added Spinner component
- ✨ Added Breadcrumb component
- ✨ Added CountriesHelper utility class
- 🐛 Fixed countries component key mapping
- ✅ Added i18n support to all components
- ♿ Improved accessibility (ARIA labels, semantic HTML)
- 📝 Enhanced documentation

---

## Acknowledgments

Built with ❤️ for the Laravel community. Special thanks to Bootstrap for the amazing CSS framework.


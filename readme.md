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

#### `<x-bs::form.checkbox`
Single checkbox input with label.

```blade
<x-bs::form.checkbox
  name="agree"
  label="I agree to the terms"
  value="1"
/>
```

**Props:**
- `name` (required) - Checkbox name
- `label` (string) - Checkbox label
- `value` (mixed) - Checkbox value
- `checked` (bool, default: `false`) - Is checked

---

#### `<x-bs::form.radio`
Single radio button input.

```blade
<x-bs::form.radio
  name="gender"
  label="Male"
  value="male"
/>
```

**Props:**
- `name` (required) - Radio name
- `label` (string) - Radio label
- `value` (mixed, required) - Radio value
- `checked` (bool) - Is checked

---

#### `<x-bs::form.checkbox-group`
Multiple checkboxes with label.

```blade
<x-bs::form.checkbox-group
  name="interests"
  label="Your Interests"
  :options="['sports' => 'Sports', 'music' => 'Music', 'reading' => 'Reading']"
  :values="old('interests', [])"
  inline
/>
```

**Props:**
- `name` (required) - Group name (stored as array)
- `label` (string) - Group label
- `options` (array, default: `[]`) - Options key => value
- `values` (array, default: `[]`) - Selected values
- `inline` (bool, default: `false`) - Display inline

---

#### `<x-bs::form.radio-group`
Multiple radio buttons with label.

```blade
<x-bs::form.radio-group
  name="level"
  label="Skill Level"
  :options="['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced']"
  value="{{ old('level') }}"
  inline
/>
```

**Props:**
- `name` (required) - Group name
- `label` (string) - Group label
- `options` (array, default: `[]`) - Options key => value
- `value` (mixed) - Selected value
- `inline` (bool, default: `false`) - Display inline

---

#### `<x-bs::form.file`
File input with validation support.

```blade
<x-bs::form.file
  name="avatar"
  label="Profile Picture"
  accept="image/*"
  multiple
/>
```

**Props:**
- `name` (required) - File input name
- `label` (string) - Input label
- `accept` (string) - Accepted file types
- `multiple` (bool, default: `false`) - Allow multiple files

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

### Layout Components

#### `<x-bs::card`
Card component for content grouping.

```blade
<x-bs::card title="User Information" subtitle="Personal details">
  <p>Content goes here</p>
</x-bs::card>
```

**Props:**
- `title` (string) - Card title
- `subtitle` (string) - Card subtitle
- `footer` (string) - Footer content

---

#### `<x-bs::tabs`
Tabbed interface with content.

```blade
<x-bs::tabs :items="[
  [
    'id' => 'tab1',
    'label' => 'Tab 1',
    'content' => '<p>Content 1</p>',
    'active' => true,
  ],
  [
    'id' => 'tab2',
    'label' => 'Tab 2',
    'content' => '<p>Content 2</p>',
  ],
]" />
```

**Props:**
- `items` (array, required) - Tab items with id, label, content, active

---

#### `<x-bs::accordion`
Collapsible accordion component.

```blade
<x-bs::accordion id="myAccordion" :items="[
  [
    'title' => 'Section 1',
    'content' => '<p>Content 1</p>',
    'open' => true,
  ],
  [
    'title' => 'Section 2',
    'content' => '<p>Content 2</p>',
  ],
]" />
```

**Props:**
- `items` (array, required) - Accordion items with title, content, id, open
- `flush` (bool, default: `false`) - Remove borders

---

#### `<x-bs::collapse`
Collapse/expandable section.

```blade
<x-bs::collapse title="Show Details">
  <p>Detailed content here</p>
</x-bs::collapse>
```

**Props:**
- `title` (string) - Collapse header text
- `id` (string) - Unique ID

---

#### `<x-bs::dropdown`
Dropdown menu component.

```blade
<x-bs::dropdown label="Actions" :items="[
  ['label' => 'Edit', 'url' => '#edit'],
  ['label' => 'Delete', 'url' => '#delete'],
  ['divider' => true],
  ['label' => 'Settings', 'url' => '#settings'],
]" />
```

**Props:**
- `label` (string, required) - Button label
- `items` (array) - Menu items with label, url, divider, header
- `split` (bool) - Split dropdown button

---

#### `<x-bs::list-group`
List group component with optional badges.

```blade
<x-bs::list-group :items="[
  ['id' => '1', 'label' => 'Item 1', 'url' => '#1', 'active' => true],
  ['id' => '2', 'label' => 'Item 2', 'url' => '#2', 'badge' => 'New'],
]" />
```

**Props:**
- `items` (array) - List items with label, url, badge, id, active
- `flush` (bool) - Remove borders
- `active` (string) - Active item id

---

#### `<x-bs::navbar`
Navigation bar component.

```blade
<x-bs::navbar brand="MyApp" :items="[
  ['id' => 'home', 'label' => 'Home', 'url' => route('home')],
  ['id' => 'about', 'label' => 'About', 'url' => route('about')],
]" dark />
```

**Props:**
- `brand` (string) - Brand name
- `brandUrl` (string, default: `"/"`) - Brand link
- `items` (array) - Navigation items
- `dark` (bool) - Dark theme
- `active` (string) - Active item id

---

#### `<x-bs::pagination`
Paginated results navigation.

```blade
<x-bs::pagination :paginator="$users" />
```

**Props:**
- `paginator` (LengthAwarePaginator) - Laravel paginator instance

---

#### `<x-bs::offcanvas`
Offcanvas sidebar component.

```blade
<x-bs::offcanvas id="sidebar" title="Menu" placement="start">
  <p>Sidebar content</p>
</x-bs::offcanvas>
```

**Props:**
- `id` (required) - Unique ID
- `title` (string) - Sidebar title
- `placement` (string, default: `"start"`) - Position (start, end, top, bottom)
- `backdrop` (bool, default: `true`) - Hide on backdrop click

---

#### `<x-bs::empty-state`
Empty state placeholder.

```blade
<x-bs::empty-state title="No results">
  Try adjusting your search terms
</x-bs::empty-state>
```

**Props:**
- `title` (string) - Empty state title

---

#### `<x-bs::skeleton`
Loading skeleton placeholder.

```blade
<x-bs::skeleton height="100px" count="3" />
```

**Props:**
- `height` (string, default: `"100px"`) - Skeleton height
- `count` (int, default: `3`) - Number of skeletons

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


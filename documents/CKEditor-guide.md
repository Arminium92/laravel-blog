# CKEditor 5 Custom Build Integration Guide

## 1. Install CKEditor 5

> **Note:** CKEditor 5 is compatible with any modern JavaScript bundler. For a quick sample project setup, we recommend using Vite.

```bash
npm install ckeditor5
```

---

## 2. Create Your HTML File

Create or edit an `index.html` file in your project and paste the following code:

```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 Sample</title>
</head>
<body>
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor" id="editor-container">
            <div class="editor-container__editor">
                <div id="editor"></div>
            </div>
        </div>
    </div>
    <script type="module" src="./main.js"></script>
</body>
</html>
```

---

## 3. Set Up the Styles

Create a `style.css` file in your project (in the same directory as `main.js`) and paste the following code:

```css
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap');

@media print {
    body {
        margin: 0 !important;
    }
}

.main-container {
    font-family: 'Lato';
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
}

.ck-content {
    font-family: 'Lato';
    line-height: 1.6;
    word-break: break-word;
}

.editor-container_classic-editor .editor-container__editor {
    min-width: 795px;
    max-width: 795px;
}
```

---

## 4. Set Up Your JavaScript

Create or edit a `main.js` file in your project (in the same directory as `style.css`) and paste the following code:

```js
/**
 * This configuration was generated using the CKEditor 5 Builder.
 * You can modify it anytime using this link:
 * https://ckeditor.com/ckeditor-5/builder/#installation/NoNgNARATAdCMAYKQIwKigrATm1bALFApgMwDsIBmBKp2paAHKUwgg7iFOdggcggBTAHbIEYYCjASJ0uQF1IBbAGNyQgCakICoA=
 */

import {
    ClassicEditor,
    Autosave,
    BlockQuote,
    Bold,
    Essentials,
    Heading,
    ImageEditing,
    ImageUtils,
    Indent,
    IndentBlock,
    Italic,
    Link,
    List,
    ListProperties,
    Paragraph,
    Table,
    TableCaption,
    TableCellProperties,
    TableColumnResize,
    TableProperties,
    TableToolbar,
    TodoList,
    Underline
} from 'ckeditor5';

import 'ckeditor5/ckeditor5.css';
import './style.css';

const LICENSE_KEY =
    'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDg0NzY3OTksImp0aSI6ImMyYTVkZGMyLTU2YmUtNDM5Yi05Yjk4LWIxNzNkOGU3YTJkMCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6IjBlMDdiYzA1In0.0BYn65c1ryCcofJ7BWyyXEkqgwLw4HEpmlSAAtaJai2YYgvl6v0t4udN0jskadp4F4Fb9EiDBwpyX3L1vb-P0w';

const editorConfig = {
    toolbar: {
        items: [
            'undo',
            'redo',
            '|',
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            '|',
            'link',
            'insertTable',
            'blockQuote',
            '|',
            'bulletedList',
            'numberedList',
            'todoList',
            'outdent',
            'indent'
        ],
        shouldNotGroupWhenFull: false
    },
    plugins: [
        Autosave,
        BlockQuote,
        Bold,
        Essentials,
        Heading,
        ImageEditing,
        ImageUtils,
        Indent,
        IndentBlock,
        Italic,
        Link,
        List,
        ListProperties,
        Paragraph,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableProperties,
        TableToolbar,
        TodoList,
        Underline
    ],
    heading: {
        options: [
            {
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
            },
            {
                model: 'heading1',
                view: 'h1',
                title: 'Heading 1',
                class: 'ck-heading_heading1'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
            },
            {
                model: 'heading4',
                view: 'h4',
                title: 'Heading 4',
                class: 'ck-heading_heading4'
            },
            {
                model: 'heading5',
                view: 'h5',
                title: 'Heading 5',
                class: 'ck-heading_heading5'
            },
            {
                model: 'heading6',
                view: 'h6',
                title: 'Heading 6',
                class: 'ck-heading_heading6'
            }
        ]
    },
    initialData:
        `<h1>Hello From CKEditor!</h1>`,
    licenseKey: LICENSE_KEY,
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        decorators: {
            toggleDownloadable: {
                mode: 'manual',
                label: 'Downloadable',
                attributes: {
                    download: 'file'
                }
            }
        }
    },
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true
        }
    },
    placeholder: 'Type or paste your content here!',
    table: {
        contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells',
            'tableProperties',
            'tableCellProperties'
        ]
    }
};

ClassicEditor.create(document.querySelector('#editor'), editorConfig);
```

---

## 5. Start Editing!

You have now set up CKEditor 5 with your custom build and configuration.  
Feel free to experiment with the features and toolbar options!

---

# CKEditor 5 Custom Build Integration Guide

---

## 6. Make CKEditor Reusable in Laravel (Blade Component)

To keep your code clean and use CKEditor anywhere in your Laravel app, create a **Blade component**.

---

### Step 1: Create the Component Class

Run this command in your terminal:

```bash
php artisan make:component CKEditor
```

This creates:
- `app/View/Components/CKEditor.php` (the PHP class)
- `resources/views/components/c-k-editor.blade.php` (the Blade view)

---

### Step 2: Edit the Component Class

Open `app/View/Components/CKEditor.php` and update it:

```php
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CKEditor extends Component
{
    public $name;
    public $id;

    public function __construct($name, $id = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
    }

    public function render()
    {
        return view('components.c-k-editor');
    }
}
```

---

### Step 3: Edit the Blade Component View

Open `resources/views/components/c-k-editor.blade.php` and use:

```php
<div>
    <textarea name="{{ $name }}" id="{{ $id ?? $name }}" {{ $attributes }}>{{ $slot }}</textarea>
    @once
        @vite(['resources/js/ckeditor-custom.js', 'resources/css/ckeditor-custom.css'])
    @endonce
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.ClassicEditor) {
                ClassicEditor.create(document.querySelector('#{{ $id ?? $name }}'), window.editorConfig)
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
</div>
```

---

### Step 4: Use the Component Anywhere

Now, in any Blade file (for example, your post creation form), just use:

```php
<x-ckeditor name="body" id="editor">{{ old('body') }}</x-ckeditor>
```

You can also pass other attributes like `required` or `class`:

```php
<x-ckeditor name="body" id="editor" required class="form-control">{{ old('body') }}</x-ckeditor>
```

---

### Step 5: Build Your Assets

After any changes to your JS or CSS, run:

```bash
npm run dev
```

---

## 🎉 Done!

You now have a **clean, reusable CKEditor 5** integration in your Laravel project.  
Just use `<x-ckeditor ...>` wherever you need a rich text editor!

---
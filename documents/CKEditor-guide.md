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
        `<h2>Congratulations on setting up CKEditor 5! 🎉</h2>
        <p>
            You've successfully created a CKEditor 5 project. This powerful text editor
            will enhance your application, enabling rich text editing capabilities that
            are customizable and easy to use.
        </p>
        <h3>What's next?</h3>
        <ol>
            <li>
                <strong>Integrate into your app</strong>: time to bring the editing into
                your application. Take the code you created and add to your application.
            </li>
            <li>
                <strong>Explore features:</strong> Experiment with different plugins and
                toolbar options to discover what works best for your needs.
            </li>
            <li>
                <strong>Customize your editor:</strong> Tailor the editor's
                configuration to match your application's style and requirements. Or
                even write your plugin!
            </li>
        </ol>
        <p>
            Keep experimenting, and don't hesitate to push the boundaries of what you
            can achieve with CKEditor 5. Your feedback is invaluable to us as we strive
            to improve and evolve. Happy editing!
        </p>
        <h3>Helpful resources</h3>
        <ul>
            <li>📝 <a href="https://portal.ckeditor.com/checkout?plan=free">Trial sign up</a>,</li>
            <li>📕 <a href="https://ckeditor.com/docs/ckeditor5/latest/installation/index.html">Documentation</a>,</li>
            <li>⭐️ <a href="https://github.com/ckeditor/ckeditor5">GitHub</a> (star us if you can!),</li>
            <li>🏠 <a href="https://ckeditor.com">CKEditor Homepage</a>,</li>
            <li>🧑‍💻 <a href="https://ckeditor.com/ckeditor-5/demo/">CKEditor 5 Demos</a>,</li>
        </ul>
        <h3>Need help?</h3>
        <p>
            See this text, but the editor is not starting up? Check the browser's
            console for clues and guidance. It may be related to an incorrect license
            key if you use premium features or another feature-related requirement. If
            you cannot make it work, file a GitHub issue, and we will help as soon as
            possible!
        </p>`,
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
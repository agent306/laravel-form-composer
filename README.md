# Laravel 10 form composer

Form builder for Laravel 10.
By default it only generates JSON.

Separate NPM packages are available to generate forms for the following frameworks with Tailwind styles. Feel free to submit PRs for them if you deem so.

- VueJS
- ReactJS
- Svelte

> UI libraries will be linked when they are ready and released

## Installation

### Update your composer.json file with the following

```json
{
    // ...,
    "repositories": {
        // ...,
        "agent306/form-composer": {
            "type": "vcs",
            "url": "https://github.com/agent306/laravel-form-composer.git"
        }
    },
    "require": {
        // ...,
        "agent306/form-composer": "@dev",
        // ...,
    }
}
```

And run `composer install`

## Quick start

Forms can be generated in two ways:

### Creating a from with the composer
```php
<?php

// ...
use Agent306\FormComposer\Field;
use Agent306\FormComposer\Facades\FormComposer;

class PostsResourceController extends Controller
{
    public function create()
    {
        $form = FormComposer::create(
            'Create new Post', /* Form title */
            'Create a post for your subscribers', /* Form description */
            route('posts.store'), /* Form submission URL */
            'POST', /* Form method */
        );

        $form->add(
            'photo',      /* Field label */
            'post_photo', /* Field name (for processing) */
            Field::FILE,  /* Field type */
            [             /* Field options */
                'rules' => ['required'],
                'allow' => ['jpg', 'png', 'svg']
            ],
        );

        $form->add('banner', 'banner_photo', Field::FILE, [
            'rules' => 'required,max:2048', /* 2MB max file size*/
            'allow' => ['jpg', 'png', 'svg'] /* Only allow these file types */
        ]);
    }
}
```

### Parsing an already generated schema (preferably from a database)

```php
<?php

// ...
use Agent306\FormComposer\Field;
use Agent306\FormComposer\Facades\FormComposer;

class PostsResourceController extends Controller
{
    public function create()
    {
        $formData = Forms::query()->findOrFail(1);
        $form = FormComposer::parse($formData->schema);

        /* You can add additional fields to the form if necessary */
        $form->add('Comments Allowed?', 'comments_allowed', Field::CHECKBOX, [ 'default' => false ]);
    }
}
```

## Contributing

Project follows [PSR-4](http://www.php-fig.org/psr/psr-4/) standard. It's currently not covered with PHPUnit tests, its coming soon (tm).

To run tests first install dependencies with `composer install`.
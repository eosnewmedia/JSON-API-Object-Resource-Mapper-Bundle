JSON API Server / Resource Mapper Bundle
=======================================

Symfony integration for object and resource mappers from [enm/json-api-server-common](https://eosnewmedia.github.io/JSON-API-Common/)

1. [Installation](#installation)
1. [Usage](#usage)

## Installation

```bash
composer require enm/json-api-server-common
```

in your `AppKernel`:

```php
<?php
// config/bundles.php
return [
    // ...
    Enm\Bundle\JsonApi\Mapper\EnmJsonApiMapperBundle::class => ['all'=>true],
    // ...
];
```

## Usage
Your object mappers must be defined as services and tagged with `json_api.object_mapper` to be detected by this bundle.

Your resource mappers must be defined as services and tagged with `json_api.resource_mapper` to be detected by this bundle.

```yaml
services:
    app.mappers.example:
        class: App\Mappers\ExampleMapper # this mapper will implement object and resource mapper interface...
        tags:
            - { name: 'json_api.object_mapper' }
            - { name: 'json_api.resource_mapper' }
```

The registry service, which you will need for dependency injection, is `Enm\JsonApi\Mapper\ObjectResourceMapper`. 

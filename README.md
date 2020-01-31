# Plugin Boilerplate Catenapress

A plugin boilerplate for developing Catenapress Wordpress plugins. This repo should serve as an example on how to write and structure code when writing Catenapress Wordpress plugins at Catenamedia.

## Requirements

- `php` ^7.3
- `composer`

## Installation

Installation is simple and done in 4 steps

- Copy or clone contents of this repo into `plugins/your-plugin-name` directory of your wordpress installation
- Change `Plugin name: ` comment inside `plugin-example.php` 
- Change `plugin-example.php` filename to something more appropriate
- Edit `composer.json` file to change default namespace. 
```json
"autoload": {
"psr-4": {
  "Catenamedia\\CatenaPress\\PluginExample\\":"src/" //should be changed
}
},
"autoload-dev": {
"psr-4": {
  "Catenamedia\\CatenaPress\\PluginExample\\Test\\": "tests/" //should be changed
}
}
```
- Run `composer install`
- Happy development!


## Project structure

For easier maintenance and development, entire project is separated in following sections:
- Plugin file (for bootstrapping plugin)
- PHP code (under `src` directory)
- JS code (`js` directory)
- Style code (`styles`)

### Plugin file
Plugin file (here `plugin-example.php`) should follow Wordpress Codex when it comes to defining main plugin .php file. This code should not contain any business, display or any other logic, it should just serve as a main point of plugin initialization.
It can include block registration, API endpoints regisrtration, script, style registration etc.
Please, make sure that line
```php
require_once('vendor/autoload.php');
```
is present on the top of the plugin class, so that you can use namespaces for importing classes. If you remove this line, plugin will probably break.
Feel free to edit this file according to your needs, as long as you are using it for initializing and bootstrapping plugin.
In this example, it is shown how to register API endpoints and Gutenberg blocks.

### Namespaces

Every class/interface should have its own namespaces for two reason.
- Avoiding name collisions
- Autoloading classes

In order for autoloading to work, namespaces should follow directory and filename structure.
Namespace in this example starts with `Catenamedia\CatenaPress\PluginExample\` and it points to .php files inside `src` directory.

For example:

Class `Casino` defined in file `src/Entity/Casino.php` should have following namespace defined: `Catenamedia\CatenaPress\PluginExample\Entity\Casino`
To import this class inside some other file, you should put:

```php
use Catenamedia\CatenaPress\PluginExample\Entity\Casino;
```

Note that directory and file names inside `src` directory should be in CamelCase and corresponding namespace parts as well.

### Registering API Endpoints
If you need to register API endpoints, you can do that in `src/API/RouteRegistryCallback.php` by adding call to `register_rest_route()` inside `__invoke()` method
```php
register_rest_route(
    '/example-route/example',
    'route-name',
    [
        [
            'methods'   => 'GET',
            'callback'  => new CasinoGETCallback(CasinoProviderFactory::createCatenaProvider()),
            'permission_callback' => new CasinoGETPermissionCallback(),
        ],
        'schema' => new CasinoGETSchemaCallback()
    ]
);
```
#### Handler Callback
Note that callback for endpoint is a separate class-as-a-function, meaning that class that handles request to the endpoint must implement `__invoke()` magic method. This method takes `WP_REST_Request` object as a parameter.
For this route, handler class is located in  `src/API/Casino/CasinoGETCallback.php`. Method should return `WP_REST_Response` object. If you need to inject any dependencies into this handler, you can do it via constructor as shown in `src/API/Casino/CasinoGETCallback.php`.

#### Permission Callback
Permission Callback checks whether user is authorized to perform request.
Similar to Handler Callback, Permission Callback is also separate class-as-a-function. For this route, handler class is located in `src/API/Casino/CasinoGETPermissionCallback.php`. It should stay in the same directory as a Handler Callback class to keep code neat. Permission logic should be written inside `__invoke()` function. This method takes `WP_REST_Request` object as a parameter, and it should return true or WP_Error if user does not have sufficient permission for request.

#### Schema Callback
Schema Callback defines schema for endpoint. It is optional, but having it is considered as a good practice.
Like Permission or Handler Callback, it is also class-as-a-function. `__invoke()` gets `WP_REST_Request` object as a parameter, and should return an array that represents schema. For this route, handler class is located in `src/API/Casino/CasinoGETSchemaCallback.php`. It should stay in the same directory as a Handler Callback class to keep code neat.

### Registering Blocks

Registering blocks should be done in `src/Service/Block/BlockRegistry.php`. There you should register block type and appropriate js and style scripts. Please, use minified and packed versions that should be in `js/dist` and `styles/dist` directory.
```php
register_block_type(
    'catenamedia/blocks/casino-card-wp-data',
    [
        'render_callback' => BlockRendererFactory::createCasinoCardRendererACF(),
        'editor_script' => 'casino-card-block-editor-script',
        'editor_style' => 'casino-card-block-editor-style',
        'script' => 'casino-card-block-script',
        'style' => 'casino-card-block-style',
        'attributes' => ['id' => ['type' => 'string']]
    ]
);
```
Each block render callback function-as-a-class should have its own directory under `src/Block` if you need render callback defined (like `CasinoCardRenderCallback.php`)

Each block should have its own directory under `src/js`, and all .js files related to it should be there

Each block should have its own directory under `src\styles`, and all .scss or .css files related to it should be there.

#### Render Callback

Render Callback for Gutenberg block is a separate class-as-a function. This class should implement `render()` method from `src/Service/Block/AbstractBlockRenderCallback.php`. It takes array of block's attributes as an argument and it should return HTML string.

If you need to inject any dependencies into this handler, you can do it via constructor as shown in `src/Service/Block/Casino/CasinoCardRenderCallback.php`. In that case, it is easier to wrap class instantiation into factory method inside `src/Service/Block/BlockRendererFactory.php` like this:
```php
/**
 * @return CasinoCardRenderCallback
 * @throws \Exception
 */
public static function createCasinoCardRendererCatena(): CasinoCardRenderCallback
{
    return new CasinoCardRenderCallback(CasinoProviderFactory::createCatenaProvider());
}
```
so that you can just use this handler via single line in our code where needed:
```php
 BlockRendererFactory::createCasinoCardRendererCatena();
```


### Business Logic

Entire business logic, written in PHP, should be inside `src/Service` directory.

It is advised to create subdirectories inside it to separate logic per domain (Like it is Casino, for example). Make sure that you are not mixing display logic and data retrieval, but keep it in separate classes.

Also, make sure that that all class dependencies are injected either through constructor or as a method param (try to avoid object instantiation inside methods and classes).

Usage of internal data entities is encouraged so that business logic should is decoupled from db or microservice data format. Entities should be defined inside `src/Entity` dir.

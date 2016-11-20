+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GeniusTS\Roles\Traits\HasRoleAndPermission;
use GeniusTS\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use App\Traits\ActionButtonAttributeTrait;
class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use Notifiable,HasRoleAndPermission,ActionButtonAttributeTrait;

    private $action = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }*/
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => 'Laravel',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'PRC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'zh',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        Mews\Captcha\CaptchaServiceProvider::class,//验证码
        GeniusTS\Roles\RolesServiceProvider::class,//权限包
        Prettus\Repository\Providers\RepositoryServiceProvider::class,//l5-repository
        Laracasts\Flash\FlashServiceProvider::class, // flash 通知
        HieuLe\Active\ActiveServiceProvider::class, //Active
        Arcanedev\LogViewer\LogViewerServiceProvider::class, //系统日志
        Barryvdh\Debugbar\ServiceProvider::class, //Debug


        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

        'Debugbar' => Barryvdh\Debugbar\Facade::class,
    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_KEY'),
            'secret' => env('PUSHER_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                //
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    | Supported: "apc", "array", "database", "file", "memcached", "redis"
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT  => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing a RAM based store such as APC or Memcached, there might
    | be other applications utilizing the same cache. So, we'll specify a
    | value to get prefixed to all our keys so we can avoid collisions.
    |
    */

    'prefix' => 'laravel',

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',

    'default'   => [
        'length'    => 4,
        'width'     => 82,
        'height'    => 42,
        'quality'   => 90,
    ],

    'flat'   => [
        'length'    => 6,
        'width'     => 160,
        'height'    => 46,
        'quality'   => 90,
        'lines'     => 6,
        'bgImage'   => false,
        'bgColor'   => '#ecf2f4',
        'fontColors'=> ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Additional Compiled Classes
    |--------------------------------------------------------------------------
    |
    | Here you may specify additional classes to include in the compiled file
    | generated by the `artisan optimize` command. These should be classes
    | that are included on basically every request into the application.
    |
    */

    'files' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled File Providers
    |--------------------------------------------------------------------------
    |
    | Here you may list service providers which define a "compiles" function
    | that returns additional files that should be compiled, providing an
    | easy way to get common files from any packages you are utilizing.
    |
    */

    'providers' => [
        //
    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_OBJ,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Debugbar Settings
     |--------------------------------------------------------------------------
     |
     | Debugbar is enabled by default, when debug is set to true in app.php.
     | You can override the value by setting enable to true or false instead of null.
     |
     */

    'enabled' => null,

    /*
     |--------------------------------------------------------------------------
     | Storage settings
     |--------------------------------------------------------------------------
     |
     | DebugBar stores data for session/ajax requests.
     | You can disable this, so the debugbar stores data in headers/session,
     | but this can cause problems with large data collectors.
     | By default, file storage (in the storage folder) is used. Redis and PDO
     | can also be used. For PDO, run the package migrations first.
     |
     */
    'storage' => [
        'enabled'    => true,
        'driver'     => 'file', // redis, file, pdo, custom
        'path'       => storage_path('debugbar'), // For file driver
        'connection' => null,   // Leave null for default connection (Redis/PDO)
        'provider'   => '' // Instance of StorageInterface for custom driver
    ],

    /*
     |--------------------------------------------------------------------------
     | Vendors
     |--------------------------------------------------------------------------
     |
     | Vendor files are included by default, but can be set to false.
     | This can also be set to 'js' or 'css', to only include javascript or css vendor files.
     | Vendor files are for css: font-awesome (including fonts) and highlight.js (css files)
     | and for js: jquery and and highlight.js
     | So if you want syntax highlighting, set it to true.
     | jQuery is set to not conflict with existing jQuery scripts.
     |
     */

    'include_vendors' => true,

    /*
     |--------------------------------------------------------------------------
     | Capture Ajax Requests
     |--------------------------------------------------------------------------
     |
     | The Debugbar can capture Ajax requests and display them. If you don't want this (ie. because of errors),
     | you can use this option to disable sending the data through the headers.
     |
     */

    'capture_ajax' => true,

    /*
     |--------------------------------------------------------------------------
     | Clockwork integration
     |--------------------------------------------------------------------------
     |
     | The Debugbar can emulate the Clockwork headers, so you can use the Chrome
     | Extension, without the server-side code. It uses Debugbar collectors instead.
     |
     */
    'clockwork' => false,

    /*
     |--------------------------------------------------------------------------
     | DataCollectors
     |--------------------------------------------------------------------------
     |
     | Enable/disable DataCollectors
     |
     */

    'collectors' => [
        'phpinfo'         => true,  // Php version
        'messages'        => true,  // Messages
        'time'            => true,  // Time Datalogger
        'memory'          => true,  // Memory usage
        'exceptions'      => true,  // Exception displayer
        'log'             => true,  // Logs from Monolog (merged in messages if enabled)
        'db'              => true,  // Show database (PDO) queries and bindings
        'views'           => true,  // Views with their data
        'route'           => true,  // Current route information
        'laravel'         => false, // Laravel version and environment
        'events'          => false, // All events fired
        'default_request' => false, // Regular or special Symfony request logger
        'symfony_request' => true,  // Only one can be enabled..
        'mail'            => true,  // Catch mail messages
        'logs'            => false, // Add the latest log messages
        'files'           => false, // Show the included files
        'config'          => false, // Display config settings
        'auth'            => false, // Display Laravel authentication status
        'gate'            => false, // Display Laravel Gate checks
        'session'         => true,  // Display session data
    ],

    /*
     |--------------------------------------------------------------------------
     | Extra options
     |--------------------------------------------------------------------------
     |
     | Configure some DataCollectors
     |
     */

    'options' => [
        'auth' => [
            'show_name' => false,   // Also show the users name/email in the debugbar
        ],
        'db' => [
            'with_params'       => true,   // Render SQL with the parameters substituted
            'timeline'          => false,  // Add the queries to the timeline
            'backtrace'         => false,  // EXPERIMENTAL: Use a backtrace to find the origin of the query in your files.
            'explain' => [                 // EXPERIMENTAL: Show EXPLAIN output on queries
                'enabled' => false,
                'types' => ['SELECT'],     // ['SELECT', 'INSERT', 'UPDATE', 'DELETE']; for MySQL 5.6.3+
            ],
            'hints'             => true,    // Show hints for common mistakes
        ],
        'mail' => [
            'full_log' => false
        ],
        'views' => [
            'data' => false,    //Note: Can slow down the application, because the data can be quite large..
        ],
        'route' => [
            'label' => true  // show complete route on bar
        ],
        'logs' => [
            'file' => null
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Inject Debugbar in Response
     |--------------------------------------------------------------------------
     |
     | Usually, the debugbar is added just before <body>, by listening to the
     | Response after the App is done. If you disable this, you have to add them
     | in your template yourself. See http://phpdebugbar.com/docs/rendering.html
     |
     */

    'inject' => true,

    /*
     |--------------------------------------------------------------------------
     | DebugBar route prefix
     |--------------------------------------------------------------------------
     |
     | Sometimes you want to set route prefix to be used by DebugBar to load
     | its resources from. Usually the need comes from misconfigured web server or
     | from trying to overcome bugs like this: http://trac.nginx.org/nginx/ticket/97
     |
     */
    'route_prefix' => '_debugbar',

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],

        'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default'   => '7xsgy7.com1.z0.glb.clouddn.com', //你的七牛域名
                'https'     => '',         //你的HTTPS域名
                'custom'    => '',     //你的自定义域名
             ],
            'access_key'=> 'le5qZii2o6iez9brj-_KoFUuN0UKir15QS28NzBJ',  //AccessKey
            'secret_key'=> 'zKrTVwyLbsNfHuClvn8hk33UT-HZVEzHiQTFn_Eu',  //SecretKey
            'bucket'    => 'iwanli',  //Bucket名字
            'notify_url'=> '',  //持久化处理回调地址
        ]

    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Arcanedev\LogViewer\Contracts\Utilities\Filesystem;

return [
    /* ------------------------------------------------------------------------------------------------
     |  Log files storage path
     | ------------------------------------------------------------------------------------------------
     */
    'storage-path'  => storage_path('logs'),

    /* ------------------------------------------------------------------------------------------------
     |  Log files pattern
     | ------------------------------------------------------------------------------------------------
     */
    'pattern'       => [
        'prefix'    => Filesystem::PATTERN_PREFIX,    // 'laravel-'
        'date'      => Filesystem::PATTERN_DATE,      // '[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]'
        'extension' => Filesystem::PATTERN_EXTENSION, // '.log'
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Locale
     | ------------------------------------------------------------------------------------------------
     |  Supported locales :
     |    'auto', 'ar', 'de', 'en', 'es', 'fa', 'fr', 'hu', 'hy', 'it', 'ko', 'nl', 'pl', 'pt-BR', 'ro', 'ru',
     |    'sv', 'th', 'tr', 'zh-TW', 'zh'
     */
    'locale'        => 'zh',

    /* ------------------------------------------------------------------------------------------------
     |  Route settings
     | ------------------------------------------------------------------------------------------------
     */
    'route'         => [
        'enabled'    => false,

        'attributes' => [
            'prefix'     => 'admin/viewer',

            'middleware' => ['auth:web'],
        ],
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Log entries per page
     | ------------------------------------------------------------------------------------------------
     |  This defines how many log entries are displayed per page.
     */
    'per-page'      => 30,

    /* ------------------------------------------------------------------------------------------------
     |  LogViewer's Facade
     | ------------------------------------------------------------------------------------------------
     */
    'facade'        => 'LogViewer',

    /* ------------------------------------------------------------------------------------------------
     |  Download settings
     | ------------------------------------------------------------------------------------------------
     */
    'download'      => [
        'prefix'    => 'laravel-',

        'extension' => 'log',
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Menu settings
     | ------------------------------------------------------------------------------------------------
     */
    'menu'  => [
        'filter-route'  => 'log.filter',

        'icons-enabled' => true,
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Icons
     | ------------------------------------------------------------------------------------------------
     */
    'icons' =>  [
        /**
         * Font awesome >= 4.3
         * http://fontawesome.io/icons/
         */
        'all'       => 'fa fa-fw fa-list fa-2x',                 // http://fontawesome.io/icon/list/
        'emergency' => 'fa fa-fw fa-bug fa-2x',                  // http://fontawesome.io/icon/bug/
        'alert'     => 'fa fa-fw fa-bullhorn fa-2x',             // http://fontawesome.io/icon/bullhorn/
        'critical'  => 'fa fa-fw fa-heartbeat fa-2x',            // http://fontawesome.io/icon/heartbeat/
        'error'     => 'fa fa-fw fa-times-circle fa-2x',         // http://fontawesome.io/icon/times-circle/
        'warning'   => 'fa fa-fw fa-exclamation-triangle fa-2x', // http://fontawesome.io/icon/exclamation-triangle/
        'notice'    => 'fa fa-fw fa-exclamation-circle fa-2x',   // http://fontawesome.io/icon/exclamation-circle/
        'info'      => 'fa fa-fw fa-info-circle fa-2x',          // http://fontawesome.io/icon/info-circle/
        'debug'     => 'fa fa-fw fa-life-ring fa-2x',            // http://fontawesome.io/icon/life-ring/
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Colors
     | ------------------------------------------------------------------------------------------------
     */
    'colors' =>  [
        'levels'    => [
            'empty'     => '#D1D1D1',
            'all'       => '#8A8A8A',
            'emergency' => '#B71C1C',
            'alert'     => '#D32F2F',
            'critical'  => '#F44336',
            'error'     => '#FF5722',
            'warning'   => '#FF9100',
            'notice'    => '#4CAF50',
            'info'      => '#1976D2',
            'debug'     => '#90CAF9',
        ],
    ],
];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mail Driver
    |--------------------------------------------------------------------------
    |
    | Laravel supports both SMTP and PHP's "mail" function as drivers for the
    | sending of e-mail. You may specify which one you're using throughout
    | your application here. By default, Laravel is setup for SMTP mail.
    |
    | Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill",
    |            "ses", "sparkpost", "log"
    |
    */

    'driver' => env('MAIL_DRIVER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Host Address
    |--------------------------------------------------------------------------
    |
    | Here you may provide the host address of the SMTP server used by your
    | applications. A default option is provided that is compatible with
    | the Mailgun mail service which will provide reliable deliveries.
    |
    */

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Host Port
    |--------------------------------------------------------------------------
    |
    | This is the SMTP port used by your application to deliver e-mails to
    | users of the application. Like the host we have set this value to
    | stay compatible with the Mailgun e-mail application by default.
    |
    */

    'port' => env('MAIL_PORT', 587),

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => 'hello@example.com',
        'name' => 'Example',
    ],

    /*
    |--------------------------------------------------------------------------
    | E-Mail Encryption Protocol
    |--------------------------------------------------------------------------
    |
    | Here you may specify the encryption protocol that should be used when
    | the application send e-mail messages. A sensible default using the
    | transport layer security protocol should provide great security.
    |
    */

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Server Username
    |--------------------------------------------------------------------------
    |
    | If your SMTP server requires a username for authentication, you should
    | set it here. This will get used to authenticate with your server on
    | connection. You may also set the "password" value below this one.
    |
    */

    'username' => env('MAIL_USERNAME'),

    /*
    |--------------------------------------------------------------------------
    | SMTP Server Password
    |--------------------------------------------------------------------------
    |
    | Here you may set the password required by your SMTP server to send out
    | messages from your application. This will be given to the server on
    | connection so that the application will be able to send messages.
    |
    */

    'password' => env('MAIL_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Sendmail System Path
    |--------------------------------------------------------------------------
    |
    | When using the "sendmail" driver to send e-mails, we will need to know
    | the path to where Sendmail lives on this server. A default path has
    | been provided here, which will work well on most of your systems.
    |
    */

    'sendmail' => '/usr/sbin/sendmail -bs',

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Driver
    |--------------------------------------------------------------------------
    |
    | The Laravel queue API supports a variety of back-ends via an unified
    | API, giving you convenient access to each back-end using the same
    | syntax for each one. Here you may set the default queue driver.
    |
    | Supported: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'default' => env('QUEUE_DRIVER', 'sync'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each server that
    | is used by your application. A default configuration has been added
    | for each back-end shipped with Laravel. You are free to add more.
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => 'your-public-key',
            'secret' => 'your-secret-key',
            'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
            'queue' => 'your-queue-name',
            'region' => 'us-east-1',
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => 'default',
            'retry_after' => 90,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control which database and table are used to store the jobs that
    | have failed. You may change them to any database / table you wish.
    |
    */

    'failed' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
/*
|--------------------------------------------------------------------------
| Prettus Repository Config
|--------------------------------------------------------------------------
|
|
*/
return [

    /*
    |--------------------------------------------------------------------------
    | Repository Pagination Limit Default
    |--------------------------------------------------------------------------
    |
    */
    'pagination' => [
        'limit' => 15
    ],

    /*
    |--------------------------------------------------------------------------
    | Fractal Presenter Config
    |--------------------------------------------------------------------------
    |

    Available serializers:
    ArraySerializer
    DataArraySerializer
    JsonApiSerializer

    */
    'fractal'    => [
        'params'     => [
            'include' => 'include'
        ],
        'serializer' => League\Fractal\Serializer\DataArraySerializer::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Config
    |--------------------------------------------------------------------------
    |
    */
    'cache'      => [
        /*
         |--------------------------------------------------------------------------
         | Cache Status
         |--------------------------------------------------------------------------
         |
         | Enable or disable cache
         |
         */
        'enabled'    => true,

        /*
         |--------------------------------------------------------------------------
         | Cache Minutes
         |--------------------------------------------------------------------------
         |
         | Time of expiration cache
         |
         */
        'minutes'    => 30,

        /*
         |--------------------------------------------------------------------------
         | Cache Repository
         |--------------------------------------------------------------------------
         |
         | Instance of Illuminate\Contracts\Cache\Repository
         |
         */
        'repository' => 'cache',

        /*
          |--------------------------------------------------------------------------
          | Cache Clean Listener
          |--------------------------------------------------------------------------
          |
          |
          |
          */
        'clean'      => [

            /*
              |--------------------------------------------------------------------------
              | Enable clear cache on repository changes
              |--------------------------------------------------------------------------
              |
              */
            'enabled' => true,

            /*
              |--------------------------------------------------------------------------
              | Actions in Repository
              |--------------------------------------------------------------------------
              |
              | create : Clear Cache on create Entry in repository
              | update : Clear Cache on update Entry in repository
              | delete : Clear Cache on delete Entry in repository
              |
              */
            'on'      => [
                'create' => true,
                'update' => true,
                'delete' => true,
            ]
        ],

        'params'     => [
            /*
            |--------------------------------------------------------------------------
            | Skip Cache Params
            |--------------------------------------------------------------------------
            |
            |
            | Ex: http://prettus.local/?search=lorem&skipCache=true
            |
            */
            'skipCache' => 'skipCache'
        ],

        /*
       |--------------------------------------------------------------------------
       | Methods Allowed
       |--------------------------------------------------------------------------
       |
       | methods cacheable : all, paginate, find, findByField, findWhere, getByCriteria
       |
       | Ex:
       |
       | 'only'  =>['all','paginate'],
       |
       | or
       |
       | 'except'  =>['find'],
       */
        'allowed'    => [
            'only'   => null,
            'except' => null
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Criteria Config
    |--------------------------------------------------------------------------
    |
    | Settings of request parameters names that will be used by Criteria
    |
    */
    'criteria'   => [
        /*
        |--------------------------------------------------------------------------
        | Accepted Conditions
        |--------------------------------------------------------------------------
        |
        | Conditions accepted in consultations where the Criteria
        |
        | Ex:
        |
        | 'acceptedConditions'=>['=','like']
        |
        | $query->where('foo','=','bar')
        | $query->where('foo','like','bar')
        |
        */
        'acceptedConditions' => [
            '=',
            'like'
        ],
        /*
        |--------------------------------------------------------------------------
        | Request Params
        |--------------------------------------------------------------------------
        |
        | Request parameters that will be used to filter the query in the repository
        |
        | Params :
        |
        | - search : Searched value
        |   Ex: http://prettus.local/?search=lorem
        |
        | - searchFields : Fields in which research should be carried out
        |   Ex:
        |    http://prettus.local/?search=lorem&searchFields=name;email
        |    http://prettus.local/?search=lorem&searchFields=name:like;email
        |    http://prettus.local/?search=lorem&searchFields=name:like
        |
        | - filter : Fields that must be returned to the response object
        |   Ex:
        |   http://prettus.local/?search=lorem&filter=id,name
        |
        | - orderBy : Order By
        |   Ex:
        |   http://prettus.local/?search=lorem&orderBy=id
        |
        | - sortedBy : Sort
        |   Ex:
        |   http://prettus.local/?search=lorem&orderBy=id&sortedBy=asc
        |   http://prettus.local/?search=lorem&orderBy=id&sortedBy=desc
        |
        */
        'params'             => [
            'search'       => 'search',
            'searchFields' => 'searchFields',
            'filter'       => 'filter',
            'orderBy'      => 'orderBy',
            'sortedBy'     => 'sortedBy',
            'with'         => 'with'
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Generator Config
    |--------------------------------------------------------------------------
    |
    */
    'generator'  => [
        'basePath'      => app_path(),
        'rootNamespace' => 'App\\',
        'paths'         => [
            'models'       => 'Models',
            'repositories' => 'Repositories\\Eloquent',
            'interfaces'   => 'Repositories\\Contracts',
            'transformers' => 'Repositories\\Transformers',
            'presenters'   => 'Repositories\\Presenters',
            'validators'   => 'Repositories\\Validators',
            'controllers'  => 'Http/Controllers/Admin',
            'provider'     => 'RepositoryServiceProvider',
            'criteria'     => 'Repositories\\Criteria',
            'stubsOverridePath' => app_path()
        ]
    ]
];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Package Connection
    |--------------------------------------------------------------------------
    |
    | You can set a different database connection for this package. It will set
    | new connection for models Role and Permission. When this option is null,
    | it will connect to the main database, which is set up in database.php
    |
    */

    'connection' => null,

    /*
    |--------------------------------------------------------------------------
    | Slug Separator
    |--------------------------------------------------------------------------
    |
    | Here you can change the slug separator. This is very important in matter
    | of magic method __call() and also a `Slugable` trait. The default value
    | is a dot.
    |
    */

    'separator' => '.',

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | If you want, you can replace default models from this package by models
    | you created. Have a look at `GeniusTS\Roles\Models\Role` model and
    | `GeniusTS\Roles\Models\Permission` model.
    |
    */

    'models' => [
        'role'       => GeniusTS\Roles\Models\Role::class,
        'permission' => GeniusTS\Roles\Models\Permission::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Roles, Permissions and Allowed "Pretend"
    |--------------------------------------------------------------------------
    |
    | You can pretend or simulate package behavior no matter what is in your
    | database. It is really useful when you are testing you application.
    | Set up what will methods is(), can() and allowed() return.
    |
    */

    'pretend' => [

        'enabled' => false,

        'options' => [
            'is'      => true,
            'can'     => true,
            'allowed' => true,
        ],

    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
    | to immediately expire on the browser closing, set that option.
    |
    */

    'lifetime' => 120,

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
    | should be encrypted before it is stored. All encryption will be run
    | automatically by Laravel and you can use the Session like normal.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => null,

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" session driver, you may specify the table we
    | should use to manage the sessions. Of course, a sensible default is
    | provided for you; however, you are free to change this as needed.
    |
    */

    'table' => 'sessions',

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using the "apc" or "memcached" session drivers, you may specify a
    | cache store that should be used for these sessions. This value must
    | correspond with one of the application's configured cache stores.
    |
    */

    'store' => null,

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Here you may change the name of the cookie used to identify a session
    | instance by ID. The name specified here will get used every time a
    | new session cookie is created by the framework for every driver.
    |
    */

    'cookie' => 'laravel_session_idashboard',

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
    | your application but you are free to change this when necessary.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | Here you may change the domain of the cookie used to identify a session
    | in your application. This will determine which domains the cookie is
    | available to in your application. A sensible default has been set.
    |
    */

    'domain' => env('SESSION_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you if it can not be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE', false),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
    | the HTTP protocol. You are free to modify this option if needed.
    |
    */

    'http_only' => true,

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        realpath(base_path('resources/views')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => realpath(storage_path('framework/views')),

];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth']],function ($router)
{
	$router->get('/dash','DashboardController@index');
	$router->get('/i18n', 'DashboardController@dataTableI18n');
	// 权限
	require(__DIR__ . '/admin/permission.php');
	// 角色
	require(__DIR__ . '/admin/role.php');
	// 用户
	require(__DIR__ . '/admin/user.php');
	// 菜单
	require(__DIR__ . '/admin/menu.php');

});

// 后台系统日志
Route::group(['prefix' => 'admin/log','middleware' => ['auth','check.permission:log']],function ($router)
{
	$router->get('/','\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log.dash');
	$router->get('list','\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log.index');
	$router->post('delete','\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log.destroy');
	$router->get('/{date}','\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log.show');
	$router->get('/{date}/download','\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log.download');
	$router->get('/{date}/{level}','\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log.filter');

});
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'check.permission' => \App\Http\Middleware\CheckPermission::class,
    ];
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ActionButtonAttributeTrait;
class Menu extends Model
{
	use ActionButtonAttributeTrait;

	private $action = 'menu';

    protected $fillable = ['pid','name','icon','slug','url','active','description','sort'];

    public function setSortAttribute($value)
    {
    	if ($value && is_numeric($value)) {
	        $this->attributes['sort'] = intval($value);
    	}else{
    		$this->attributes['sort'] = 0;
    	}
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Models;
use GeniusTS\Roles\Models\Permission as Model;
use App\Traits\ActionButtonAttributeTrait;
class Permission extends Model
{
    use ActionButtonAttributeTrait;

    private $action = 'permission';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Models;
use App\Traits\ActionButtonAttributeTrait;
use GeniusTS\Roles\Models\Role as Model;
class Role extends Model
{
    use ActionButtonAttributeTrait;

    private $action = 'role';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function setLevelAttribute($value)
    {
    	if ($value && is_numeric($value)) {
	        $this->attributes['level'] = intval($value);
    	}else{
    		$this->attributes['level'] = 1;
    	}
    }

}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 视图composer共享后台菜单数据
         */
        view()->composer(
            'layouts.partials.sidebar', 'App\Http\ViewComposers\MenuComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('App.User.*', function ($user, $userId) {
            return (int) $user->id === (int) $userId;
        });
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Traits;
trait ActionButtonAttributeTrait
{
	/**
	 * 查看按钮
	 * @author 晚黎
	 * @date   2016-10-31T18:14:09+0800
	 * @param  boolean		$type [默认为跳转页面查看信息,false时<a>标签带上modal样式]
	 * @return [type]
	 */
	public function getShowActionButton($type = true)
	{
		//开启查看按钮
		if (config('admin.global.'.$this->action.'.show')) {
			if (auth()->user()->can(config('admin.permissions.'.$this->action.'.show'))) {
				if ($type) {
					return '<a href="'.url('admin/'.$this->action.'/'.$this->id).'" class="btn btn-xs btn-outline btn-info tooltips" data-toggle="tooltip" data-original-title="' . trans('admin/action.actionButton.show') . '"  data-placement="top"><i class="fa fa-eye"></i></a> ';
				}
				return '<a href="'.url('admin/'.$this->action.'/'.$this->id).'" class="btn btn-xs btn-info tooltips" data-toggle="modal" data-target="#myModal" data-original-title="' . trans('admin/action.actionButton.show') . '"  data-placement="top"><i class="fa fa-eye"></i></a> ';
			}
			return '';
		}
		return '';
	}
	/**
	 * 修改按钮
	 * @author 晚黎
	 * @date   2016-10-31T18:13:50+0800
	 * @return [type]
	 */
	public function getEditActionButton()
	{
		if (auth()->user()->can(config('admin.permissions.'.$this->action.'.edit'))) {
			return '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/edit').'" class="btn btn-xs btn-outline btn-warning tooltips" data-original-title="' . trans('admin/action.actionButton.edit') . '"  data-placement="top"><i class="fa fa-edit"></i></a> ';
		}
		return '';
	}

	/**
	 * 彻底删除按钮
	 * @author 晚黎
	 * @date   2016-10-31T18:14:39+0800
	 * @param  boolean
	 * @return [type]
	 */
	public function getDestroyActionButton()
	{
		if (auth()->user()->can(config('admin.permissions.'.$this->action.'.destroy'))) {
			return '<a href="javascript:;" onclick="return false" class="btn btn-xs btn-outline btn-danger tooltips destroy_item" data-original-title="' . trans('admin/action.actionButton.destroy') . '"  data-placement="top"><i class="fa fa-trash"></i><form action="'.url('admin/'.$this->action.'/'.$this->id).'" method="POST" name="delete_item" style="display:none"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="'.csrf_token().'"></form></a> ';
		}
		return '';
	}
	/**
	 * 重置用户密码
	 * @author 晚黎
	 * @date   2016-10-31T18:14:48+0800
	 * @return [type]
	 */
	public function getResetActionButton()
	{
		if (auth()->user()->can(config('admin.permissions.'.$this->action.'.reset'))) {
			return '<a href="javascript:;" data-id="'.$this->id.'" class="btn btn-outline btn-xs btn-default tooltips reset_password" data-container="body" data-original-title="' . trans('admin/action.actionButton.reset') . '"  data-placement="top"><i class="fa fa-lock"></i></a> ';
		}
		return '';
	}
	
	/**
	 * 获取按钮
	 * @author 晚黎
	 * @date   2016-10-31T18:14:57+0800
	 * @param  boolean
	 * @return [type]
	 */
	public function getActionButtonAttribute($showType = true)
	{
		return $this->getShowActionButton($showType).
				$this->getResetActionButton().
				$this->getEditActionButton().
				$this->getDestroyActionButton();
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
return [
	// 自定义登录字段
	'username' 	=> 'username',
	// 重置用户密码
	'reset' 	=> '123456',
	// 分页
	'list' => [
		'start'=> 0,
		'length' => 10,
	],
	/**
	 * 全局状态
	 * active 	正常
	 * ban 		禁用
	 * addit 	待审核
	 * trash	回收站
	 * destory 	彻底删除
	 */
	'status' => [
		'active' => 1,
		'ban' => 2,
		'audit' => 3,
		'trash' => 99,
		'destory' => -1
	],
	'permission' => [
		// 控制是否显示查看按钮
		'show' => false,
	],
	'role' => [
		// 控制是否显示查看按钮
		'show' => true,
	],
	'user' => [
		// 控制是否显示查看按钮
		'show' => true,
	],
	// 缓存
	'cache' => [
		'menuList' => 'menuList'
	]
];

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
return [
	'permission' => [
		'list' 		=> 'permission.list',
		'create' 	=> 'permission.create',
		'edit' 		=> 'permission.edit',
		'destroy' 	=> 'permission.destroy',
	],
	'role' => [
		'list' 		=> 'role.list',
		'create' 	=> 'role.create',
		'edit' 		=> 'role.edit',
		'destroy' 	=> 'role.destroy',
		'show' 		=> 'role.show',
	],
	'user' => [
		'list' 		=> 'user.list',
		'create' 	=> 'user.create',
		'edit' 		=> 'user.edit',
		'destroy' 	=> 'user.destroy',
		'show' 		=> 'user.show',
		'reset' 	=> 'user.reset',
	],
	'menu' => [
		'list' 		=> 'menu.list',
		'create' 	=> 'menu.create',
		'edit' 		=> 'menu.edit',
		'orderable' => 'menu.edit',
		'destroy' 	=> 'menu.destroy',
		'show' 		=> 'menu.show',
	],
	'log' => [
		'list' 		=> 'log.list',
		'destroy' 	=> 'log.destroy',
		'show' 		=> 'log.show',
		'download' 	=> 'log.download',
		'filter' 	=> 'log.filter',
	],
];
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('用户名');
            $table->string('username')->unique()->comment('账号');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_user');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('model')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_user');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0)->comment('菜单关系');
            $table->string('name')->default('')->comment('菜单名称');
            $table->string('icon')->default('')->comment('图标');
            $table->string('slug')->default('')->comment('菜单对应的权限');
            $table->string('url')->default('')->comment('菜单链接地址');
            $table->string('active')->default('')->comment('菜单高亮地址');
            $table->string('description')->default('')->comment('描述');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');
	}

}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = new Menu;
        $index->name = "控制台";
        $index->pid = 0;
        $index->icon = "fa fa-dashboard";
        $index->slug = "system.index";
        $index->url = "admin/dash";
        $index->active = "admin/dash";
        $index->description = "后台首页";
        $index->save();

        /**
         * -------------------------------------------------
         * 系统管理
         * -------------------------------------------------
         */
        $system = new Menu;
        $system->name = "系统管理";
        $system->pid = 0;
        $system->icon = "fa fa-cog";
        $system->slug = "system.manage";
        $system->url = "";
        $system->active = "admin/role*,admin/permission*,admin/user*,admin/menu*,admin/log*";
        $system->description = "系统功能管理";
        $system->save();

        $user = new Menu;
        $user->name = "用户管理";
        $user->pid = $system->id;
        $user->icon = "fa fa-users";
        $user->slug = "user.list";
        $user->url = "admin/user";
        $user->active = "admin/user*";
        $user->description = "显示用户管理";
        $user->save();


        $role = new Menu;
        $role->name = "角色管理";
        $role->pid = $system->id;
        $role->icon = "fa fa-male";
        $role->slug = "role.list";
        $role->url = "admin/role";
        $role->active = "admin/role*";
        $role->description = "显示角色管理";
        $role->save();


        $permission = new Menu;
        $permission->name = "权限管理";
        $permission->pid = $system->id;
        $permission->icon = "fa fa-paper-plane";
        $permission->slug = "permission.list";
        $permission->url = "admin/permission";
        $permission->active = "admin/permission*";
        $permission->description = "显示权限管理";
        $permission->save();

        $menu = new Menu;
        $menu->name = "菜单管理";
        $menu->pid = $system->id;
        $menu->icon = "fa fa-navicon";
        $menu->slug = "menu.list";
        $menu->url = "admin/menu";
        $menu->active = "admin/menu*";
        $menu->description = "显示菜单管理";
        $menu->save();

        $log = new Menu;
        $log->name = "系统日志";
        $log->pid = $system->id;
        $log->icon = "fa fa-file-text-o";
        $log->slug = "log.all";
        $log->url = "admin/log";
        $log->active = "admin/log*";
        $log->description = "显示系统日志";
        $log->save();
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //////////////////
        ///登录后台权限 //
        /////////////////
        Permission::create([
            'name' => '登录后台权限',
            'slug' => 'system.login',
            'description' => '登录后台权限'
        ]);
        Permission::create([
            'name' => '后台首页',
            'slug' => 'system.index',
            'description' => '后台首页'
        ]);
        //////////
        //系统管理//
        //////////
        Permission::create([
            'name' => '系统管理',
            'slug' => 'system.manage',
            'description' => '系统管理'
        ]);
        /**
         * 显示菜单列表
         */
        Permission::create([
            'name' => '显示菜单列表',
            'slug' => 'menu.list',
            'description' => '显示菜单列表'
        ]);
        /**
         * 创建菜单
         */
        Permission::create([
            'name' => '创建菜单',
            'slug' => 'menu.create',
            'description' => '创建菜单'
        ]);
        /**
         * 删除菜单
         */
        Permission::create([
            'name' => '删除菜单',
            'slug' => 'menu.destroy',
            'description' => '删除菜单'
        ]);
        /**
         * 修改菜单
         */
        Permission::create([
            'name' => '修改菜单',
            'slug' => 'menu.edit',
            'description' => '修改菜单'
        ]);
        /**
         * 查看菜单信息
         */
        Permission::create([
            'name' => '查看菜单',
            'slug' => 'menu.show',
            'description' => '查看菜单'
        ]);
        /////////////
        //角色管理 //
        ////////////
        /**
         * 显示角色列表
         */
        Permission::create([
            'name' => '显示角色列表',
            'slug' => 'role.list',
            'description' => '显示角色列表'
        ]);
        /**
         * 创建角色
         */
        Permission::create([
            'name' => '创建角色',
            'slug' => 'role.create',
            'description' => '创建角色'
        ]);
        /**
         * 删除角色
         */
        Permission::create([
            'name' => '删除角色',
            'slug' => 'role.destroy',
            'description' => '删除角色'
        ]);
        /**
         * 修改角色
         */
        Permission::create([
            'name' => '修改角色',
            'slug' => 'role.edit',
            'description' => '修改角色'
        ]);
        /**
         * 查看角色权限
         */
        Permission::create([
            'name' => '查看角色权限',
            'slug' => 'role.show',
            'description' => '查看角色权限'
        ]);
        /////////////
        //权限管理 //
        ////////////
        /**
         * 显示权限列表
         */
        Permission::create([
            'name' => '显示权限列表',
            'slug' => 'permission.list',
            'description' => '显示权限列表'
        ]);
        /**
         * 创建权限
         */
        Permission::create([
            'name' => '创建权限',
            'slug' => 'permission.create',
            'description' => '创建权限'
        ]);
        /**
         * 删除权限
         */
        Permission::create([
            'name' => '删除权限',
            'slug' => 'permission.destroy',
            'description' => '删除权限'
        ]);
        /**
         * 修改权限
         */
        Permission::create([
            'name' => '修改权限',
            'slug' => 'permission.edit',
            'description' => '修改权限'
        ]);
        /////////////
        //用户管理 //
        ////////////
        /**
         * 显示用户列表
         */
        Permission::create([
            'name' => '显示用户列表',
            'slug' => 'user.list',
            'description' => '显示用户列表'
        ]);
        /**
         * 创建用户
         */
        Permission::create([
            'name' => '创建用户',
            'slug' => 'user.create',
            'description' => '创建用户'
        ]);
        /**
         * 修改用户信息
         */
        Permission::create([
            'name' => '修改用户',
            'slug' => 'user.edit',
            'description' => '修改用户'
        ]);
        /**
         * 删除用户
         */
        Permission::create([
            'name' => '删除用户',
            'slug' => 'user.destroy',
            'description' => '删除用户'
        ]);
        /**
         * 查看用户信息
         */
        Permission::create([
            'name' => '查看用户信息',
            'slug' => 'user.show',
            'description' => '查看用户信息'
        ]);
        /**
         * 修改用户密码
         */
        Permission::create([
            'name' => '修改用户密码',
            'slug' => 'user.reset',
            'description' => '修改用户密码'
        ]);
        ////////
        //日志//
        ////////
        Permission::create([
            'name' => '日志管理',
            'slug' => 'log.list',
            'description' => '日志管理'
        ]);

        Permission::create([
            'name' => '删除日志',
            'slug' => 'log.destroy',
            'description' => '删除日志'
        ]);

        Permission::create([
            'name' => '查看日志',
            'slug' => 'log.show',
            'description' => '查看日志'
        ]);

        Permission::create([
            'name' => '下载日志',
            'slug' => 'log.download',
            'description' => '下载日志'
        ]);

        Permission::create([
            'name' => '筛选日志信息',
            'slug' => 'log.filter',
            'description' => '筛选日志信息'
        ]);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Seeder;
use GeniusTS\Roles\Models\Role;
use GeniusTS\Roles\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => '超级管理员',
            'slug' => 'admin',
            'description' => '超级管理员',
        ]);
        $userRole = Role::create([
            'name' => '普通用户',
            'slug' => 'user',
            'description' => '普通用户',
        ]);
        /*管理员初始化所有权限*/
        $all_permissions = Permission::all();
        foreach ($all_permissions as $permission) {
        	$adminRole->attachPermission($permission);
        }
        /**
         * 普通用户赋予一般权限
         */
        $loginBackendPer = Permission::where('slug', 'systems.login')->first();
        $userRole->attachPermission($loginBackendPer);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

use Illuminate\Database\Seeder;
use GeniusTS\Roles\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Role::where('slug','admin')->first();
        $user = Role::where('slug','user')->first();
        factory('App\User', 1)->create([
        	'name' => '晚黎',
            'username' => 'iwanli',
        	'email' => '709344897@qq.com',
        	'password' => bcrypt('123456')
        ])->each(function ($u) use ($admin){
            $u->attachRole($admin);
        });

        factory('App\User', 3)->create([
        	'password' => bcrypt('123456')
        ])->each(function ($u) use ($user){
            $u->attachRole($user);
        });
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
$router->group(['prefix' => 'menu'],function ($router)
{
	$router->get('orderable','MenuController@orderable')->name('menu.orderable');
});
$router->resource('menu','MenuController');
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
$router->group(['prefix' => 'permission'],function ($router)
{
	$router->get('ajaxIndex','PermissionController@ajaxIndex')->name('permission.ajaxIndex');
});
$router->resource('permission','PermissionController',['except' => ['show']]);
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
$router->group(['prefix' => 'role'],function ($router)
{
	$router->get('ajaxIndex','RoleController@ajaxIndex')->name('role.ajaxIndex');
});
$router->resource('role','RoleController');
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
$router->group(['prefix' => 'user'],function ($router)
{
	$router->get('ajaxIndex','UserController@ajaxIndex')->name('user.ajaxIndex');
	$router->get('/{id}/reset','UserController@resetPassword')->name('user.reset');
});
$router->resource('user','UserController');
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Middleware;
use Closure;
use Route;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$model)
    {
        $routeName = Route::currentRouteName();
        $permission = '';
        switch ($routeName) {
            case $model.'.index':
            case $model.'.ajaxIndex':
            case $model.'.dash':
                $permission = config('admin.permissions.'.$model.'.list','');
                break;
            case $model.'.create':
            case $model.'.store':
                $permission = config('admin.permissions.'.$model.'.create','');
                break;
            case $model.'.edit':
            case $model.'.update':
                $permission = config('admin.permissions.'.$model.'.edit','');
                break;
            
            default:
                $permission = config('admin.permissions.'.$model,'');
                break;
        }
        if (!$request->user()->can($permission)) {
            abort(500,trans('admin/errors.permissions'));
        }
        return $next($request);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['name'] = 'required';
        $rules['slug'] = 'required';
        $rules['url'] = 'required';
        // 添加权限
        if (request()->isMethod('PUT') || request()->isMethod('PATH')) {
            // 修改时 request()->method() 方法返回的是 PUT或PATCH
            $rules['id'] = 'numeric|required';
        }
        return $rules;
        return [
            'name'      => 'required',
            'slug'      => 'required',
            'url'       => 'required',
        ];
    }
    /**
     * 验证信息
     * @author 晚黎
     * @date   2016-11-02T10:25:59+0800
     * @return [type]                   [description]
     */
    public function messages()
    {
        return [
            'required'  => trans('validation.required'),
            'numeric'   => trans('validation.numeric'),
        ];
    }
    /**
     * 字段名称
     * @author 晚黎
     * @date   2016-11-02T10:28:52+0800
     * @return [type]                   [description]
     */
    public function attributes()
    {
        return [
            'name'      => trans('admin/menu.model.name'),
            'url'       => trans('admin/menu.model.url'),
            'slug'      => trans('admin/menu.model.slug'),
            'id'        => trans('admin/menu.model.id'),
        ];
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['name'] = 'required';
        // 添加权限
        if (request()->isMethod('POST')) {
            $rules['slug'] = 'required|unique:permissions,slug';
        }else{
            // 修改时 request()->method() 方法返回的是 PUT或PATCH
            $rules['slug'] = 'required|unique:permissions,slug,'.$this->id;
            $rules['id'] = 'numeric|required';
        }
        return $rules;
    }
    /**
     * 验证信息
     * @author 晚黎
     * @date   2016-11-02T10:25:59+0800
     * @return [type]                   [description]
     */
    public function messages()
    {
        return [
            'required'  => trans('validation.required'),
            'unique'    => trans('validation.unique'),
            'numeric'   => trans('validation.numeric'),
        ];
    }
    /**
     * 字段名称
     * @author 晚黎
     * @date   2016-11-02T10:28:52+0800
     * @return [type]                   [description]
     */
    public function attributes()
    {
        return [
            'id'    => trans('admin/permission.model.id'),
            'name'  => trans('admin/permission.model.name'),
            'slug'  => trans('admin/permission.model.slug'),
        ];
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['name'] = 'required';
        // 添加权限
        if (request()->isMethod('POST')) {
            $rules['slug'] = 'required|unique:roles,slug';
        }else{
            // 修改时 request()->method() 方法返回的是 PUT或PATCH
            $rules['slug'] = 'required|unique:roles,slug,'.$this->id;
            $rules['id'] = 'numeric|required';
        }
        return $rules;
    }
    /**
     * 验证信息
     * @author 晚黎
     * @date   2016-11-02T10:25:59+0800
     * @return [type]                   [description]
     */
    public function messages()
    {
        return [
            'required'  => trans('validation.required'),
            'unique'    => trans('validation.unique'),
            'numeric'   => trans('validation.numeric'),
        ];
    }
    /**
     * 字段名称
     * @author 晚黎
     * @date   2016-11-02T10:28:52+0800
     * @return [type]                   [description]
     */
    public function attributes()
    {
        return [
            'id'    => trans('admin/role.model.id'),
            'name'  => trans('admin/role.model.name'),
            'slug'  => trans('admin/role.model.slug'),
        ];
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['name']      = 'required';
        $rules['email']     = 'email';
        // 添加权限
        if (request()->isMethod('POST')) {
            $rules['username'] = 'required|unique:users,username';
            $rules['password']  = 'required';
        }else{
            // 修改时 request()->method() 方法返回的是 PUT或PATCH
            $rules['username'] = 'required|unique:users,username,'.$this->id;
            $rules['id'] = 'numeric|required';
        }
        return $rules;
    }

    /**
     * 验证信息
     * @author 晚黎
     * @date   2016-11-03T14:52:55+0800
     * @return [type]                   [description]
     */
    public function messages()
    {
        return [
            'required'  => trans('validation.required'),
            'unique'    => trans('validation.unique'),
            'numeric'   => trans('validation.numeric'),
            'email'     => trans('validation.email'),
        ];
    }
    /**
     * 字段名称
     * @author 晚黎
     * @date   2016-11-03T14:52:38+0800
     * @return [type]                   [description]
     */
    public function attributes()
    {
        return [
            'id'        => trans('admin/user.model.id'),
            'name'      => trans('admin/user.model.name'),
            'username'  => trans('admin/user.model.username'),
            'email'     => trans('admin/user.model.email'),
        ];
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Service\Admin\MenuService;
class MenuComposer
{
    
    protected $menu;

    
    public function __construct(MenuService $menu)
    {
        $this->menu = $menu;
    }

    
    public function compose(View $view)
    {
        $view->with('sidebarMenu', $this->menu->getMenuList());
    }
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Presenters\Admin;

class MenuPresenter
{
	public function menuNestable($menus)
	{
		if ($menus) {
			$item = '';
			foreach ($menus as $v) {
				$item.= $this->getNestableItem($v);
			}
			return $item;
		}
		return '暂无菜单';
	}

	/**
	 * 返回菜单HTML代码
	 * @author 晚黎
	 * @date   2016-11-04T11:05:21+0800
	 * @param  [type]                   $menu [description]
	 * @return [type]                         [description]
	 */
	protected function getNestableItem($menu)
	{
		if ($menu['child']) {
			return $this->getHandleList($menu['id'],$menu['name'],$menu['icon'],$menu['child']);
		}
		$labelInfo = $menu['pid'] == 0 ?  'label-info':'label-warning';
		return <<<Eof
				<li class="dd-item dd3-item" data-id="{$menu['id']}">
                    <div class="dd-handle dd3-handle">Drag</div>
                    <div class="dd3-content"><span class="label {$labelInfo}"><i class="{$menu['icon']}"></i></span> {$menu['name']} {$this->getActionButtons($menu['id'])}</div>
                </li>
Eof;
	}
	/**
	 * 判断是否有子集
	 * @author 晚黎
	 * @date   2016-11-04T11:05:28+0800
	 * @param  [type]                   $id    [description]
	 * @param  [type]                   $name  [description]
	 * @param  [type]                   $child [description]
	 * @return [type]                          [description]
	 */
	protected function getHandleList($id,$name,$icon,$child)
	{
		$handle = '';
		if ($child) {
			foreach ($child as $v) {
				$handle .= $this->getNestableItem($v);
			}
		}

		$html = <<<Eof
		<li class="dd-item dd3-item" data-id="{$id}">
            <div class="dd-handle dd3-handle">Drag</div>
            <div class="dd3-content">
            	<span class="label label-info"><i class="{$icon}"></i></span> {$name} {$this->getActionButtons($id)}
            </div>
            <ol class="dd-list">
                {$handle}
            </ol>
        </li>
Eof;
		return $html;
	}

	/**
	 * 菜单按钮
	 * @author 晚黎
	 * @date   2016-11-04T11:05:38+0800
	 * @param  [type]                   $id   [description]
	 * @param  boolean                  $bool [description]
	 * @return [type]                         [description]
	 */
	protected function getActionButtons($id)
	{
		$action = '<div class="pull-right">';
		if (auth()->user()->can(config('admin.permissions.menu.show'))) {
			$action .= '<a href="javascript:;" class="btn btn-xs tooltips showInfo" data-href="'.url('admin/menu',[$id]).'" data-toggle="tooltip" data-original-title="'.trans('admin/action.actionButton.show').'"  data-placement="top"><i class="fa fa-eye"></i></a>';
		}
		if (auth()->user()->can(config('admin.permissions.menu.edit'))) {
			$action .= '<a href="javascript:;" data-href="'.url('admin/menu/'.$id.'/edit').'" class="btn btn-xs tooltips editMenu" data-toggle="tooltip"data-original-title="'.trans('admin/action.actionButton.edit').'"  data-placement="top"><i class="fa fa-edit"></i></a>';
		}
		if (auth()->user()->can(config('admin.permissions.menu.destroy'))) {
			$action .= '<a href="javascript:;" class="btn btn-xs tooltips destroy_item" data-id="'.$id.'" data-original-title="'.trans('admin/action.actionButton.destroy').'"data-toggle="tooltip"  data-placement="top"><i class="fa fa-trash"></i><form action="'.url('admin/menu',[$id]).'" method="POST" style="display:none"><input type="hidden"name="_method" value="delete"><input type="hidden" name="_token" value="'.csrf_token().'"></form></a>';
		}
		$action .= '</div>';
		return $action;
	}
	/**
	 * 根据用户不同的权限显示不同的内容
	 * @author 晚黎
	 * @date   2016-11-04T13:40:11+0800
	 * @return [type]                   [description]
	 */
	public function canCreateMenu()
	{
		$canCreateMenu = auth()->user()->can(config('admin.permissions.menu.create'));

		$title = $canCreateMenu ?  trans('admin/menu.welcome'):trans('admin/menu.sorry');
		$desc = $canCreateMenu ? trans('admin/menu.description'):trans('admin/menu.description_sorry');
		$createButton = $canCreateMenu ? '<br><a href="javascript:;" class="btn btn-primary m-t create_menu">'.trans('admin/menu.action.create').'</a>':'';
		return <<<Eof
		<div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">{$title}</h3>
            <div class="error-desc">
                {$desc}{$createButton}
            </div>
        </div>
Eof;
	}
	/**
	 * 添加修改菜单关系select
	 * @author 晚黎
	 * @date   2016-11-04T16:29:51+0800
	 * @param  [type]                   $menus [description]
	 * @param  string                   $pid   [description]
	 * @return [type]                          [description]
	 */
	public function topMenuList($menus,$pid = '')
	{
		$html = '<option value="0">'.trans('admin/menu.topMenu').'</option>';
		if ($menus) {
			foreach ($menus as $v) {
				$html .= '<option value="'.$v['id'].'" '.$this->checkMenu($v['id'],$pid).'>'.$v['name'].'</option>';
			}
		}
		return $html;
	}

	public function checkMenu($menuId,$pid)
	{
		if ($pid !== '') {
			if ($menuId == $pid) {
				return 'selected="selected"';
			}
			return '';
		}
		return '';
	}
	/**
	 * 获取菜单关系名称
	 * @author 晚黎
	 * @date   2016-11-04
	 * @param  [type]     $menus [所有菜单数据]
	 * @param  [type]     $pid   [菜单关系pid]
	 * @return [type]            [description]
	 */
	public function topMenuName($menus,$pid)
	{
		if ($pid == 0) {
			return '顶级菜单';
		}
		if ($menus) {
			foreach ($menus as $v) {
				if ($v['id'] == $pid) {
					return $v['name'];
				}
			}
		}
		return '';
	}
	/**
	 * 后台左侧菜单
	 * @author 晚黎
	 * @date   2016-11-06
	 * @param  [type]     $sidebarMenus [菜单数据]
	 * @return [type]                   [HTML]
	 */
	public function sidebarMenuList($sidebarMenus)
	{
		$html = '';
		if ($sidebarMenus) {
			foreach ($sidebarMenus as $menu) {
				if ($menu['child']) {
					$active = active_class(if_uri_pattern(explode(',',$menu['active'])),'active');
					$url = url($menu['url']);
					$html .= <<<Eof
					<li class="{$active}">
			          	<a href="{$url}"><i class="{$menu['icon']}"></i> <span class="nav-label">{$menu['name']}</span> <span class="fa arrow"></span></a>
			          	<ul class="nav nav-second-level collapse">
			              	{$this->childMenu($menu['child'])}
			          	</ul>
			      	</li>
Eof;
				}else{
					$html .= '<li class="'.active_class(if_uri_pattern(explode(',',$menu['active'])),'active').'"><a href="'.url($menu['url']).'"><i class="'.$menu['icon'].'"></i> <span class="nav-label">'.$menu['name'].'</span></a></li>';
				}
			}
		}
		return $html;
	}
	/**
	 * 多级菜单显示
	 * @author 晚黎
	 * @date   2016-11-06
	 * @param  [type]     $childMenu [子菜单数据]
	 * @return [type]                [HTML]
	 */
	public function childMenu($childMenu)
	{
		$html = '';
		if ($childMenu) {
			foreach ($childMenu as $v) {
				$html .= '<li class="'.active_class(if_uri_pattern(explode(',',$v['active'])),'active').'"><a href="'.url($v['url']).'">'.$v['name'].'</a></li>';
			}
		}
		return $html;
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Presenters\Admin;

class RolePresenter
{
	/**
	 * 修改角色界面，角色权限列表
	 * @author 晚黎
	 * @date   2016-11-03T09:36:36+0800
	 * @param  [type]                   $permissions     [所有权限]
	 * @param  [type]                   $rolePermissions [该角色已有的权限]
	 * @return [type]                                    [html]
	 */
	public function permissionList($permissions,$rolePermissions=[])
	{
		$html = '';
		if ($permissions) {
			foreach ($permissions as $key => $permission) {
				$html .= "<tr><td>".$key."</td><td>";
				if (is_array($permission)) {
					foreach ($permission as $k => $v) {
						$html .= <<<Eof
						<div class="col-md-4">
	                     	<div class="i-checks">
	                        	<label> <input type="checkbox" name="permission[]" {$this->checkPermisison($v['id'],$rolePermissions)} value="{$v['id']}"> <i></i> {$v['name']} </label>
	                      	</div>
                      	</div>
Eof;
					}
				}
				$html .= '</td></tr>';
			}
		}
		return $html;
	}
	/**
	 * 添加角色出现错误时，获取已经填写的权限
	 * @author 晚黎
	 * @date   2016-11-03T09:42:15+0800
	 * @param  [type]                   $permissionId   [权限ID]
	 * @param  [type]                   $rolePermissions[修改角色时所有权限ID数组]
	 * @return [type]                                   [string]
	 */
	private function checkPermisison($permissionId,$rolePermissions = [])
	{
		$permissions = old('permission');
		if ($permissions) {
			return in_array($permissionId,$permissions) ? 'checked="checked"':'';
		}
		if ($rolePermissions) {
			if ($rolePermissions) {
				if ($permissions) {
					if (in_array($permissionId,$rolePermissions) && in_array($permissionId,$permissions)) {
						return 'checked="checked"';
					}
				}else{
					return in_array($permissionId,$rolePermissions) ? 'checked="checked"':'';
				}
				return '';
			}
			return '';
		}
		return '';
	}

	/**
	 * 查看用户角色权限时展示的table
	 * @author 晚黎
	 * @date   2016-11-03T10:58:56+0800
	 * @param  [type]                   $rolePermissions [description]
	 * @return [type]                                    [description]
	 */
	public function showRolePermissions($rolePermissions)
	{
		$html = '';
		if (!$rolePermissions->isEmpty()) {
			// 将角色权限分组
			$permissionArray = [];
			foreach ($rolePermissions as $v) {
				array_set($permissionArray, $v->slug, ['id' => $v->id,'name' => $v->name]);
			}
			if ($permissionArray) {
				foreach ($permissionArray as $key => $permission) {
					$html .= "<tr><td>".$key."</td><td>";
					if (is_array($permission)) {
						foreach ($permission as $k => $v) {
							$html .= <<<Eof
							<div class="col-md-4">
	                        	<label> {$v['name']} </label>
	                      	</div>
Eof;
						}
					}
					$html .= '</td></tr>';
				}
			}
		}
		return $html;
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Presenters\Admin;
class UserPresenter
{
	/**
	 * 创建修改用户界面，角色权限列表
	 * @author 晚黎
	 * @date   2016-11-03T09:36:36+0800
	 * @param  [type]                   $permissions     [所有权限]
	 * @param  [type]                   $rolePermissions [该角色已有的权限]
	 * @return [type]                                    [html]
	 */
	public function permissionList($permissions,$rolePermissions=[])
	{
		$html = '';
		if ($permissions) {
			foreach ($permissions as $key => $permission) {
				$html .= "<tr><td>".$key."</td><td>";
				if (is_array($permission)) {
					foreach ($permission as $k => $v) {
						$html .= <<<Eof
						<div class="col-md-4">
	                     	<div class="i-checks">
	                        	<label> <input type="checkbox" name="permission[]" {$this->checkPermisison($v['id'],$rolePermissions)} value="{$v['id']}"> <i></i> {$v['name']} </label>
	                      	</div>
                      	</div>
Eof;
					}
				}
				$html .= '</td></tr>';
			}
		}
		return $html;
	}
	/**
	 * 添加用户出现错误时，获取已经选中的选项
	 * @author 晚黎
	 * @date   2016-11-03T09:42:15+0800
	 * @param  [type]                   $permissionId   [权限ID]
	 * @param  [type]                   $rolePermissions[修改角色时所有权限ID数组]
	 * @return [type]                                   [string]
	 */
	private function checkPermisison($permissionId,$rolePermissions = [])
	{
		$permissions = old('permission');
		if ($permissions) {
			return in_array($permissionId,$permissions) ? 'checked="checked"':'';
		}
		if ($rolePermissions) {
			if ($permissions) {
				if (in_array($permissionId,$rolePermissions) && in_array($permissionId,$permissions)) {
					return 'checked="checked"';
				}
			}else{
				return in_array($permissionId,$rolePermissions) ? 'checked="checked"':'';
			}
			return '';
		}
		return '';
	}
	/**
	 * 角色列表
	 * @author 晚黎
	 * @date   2016-11-03T14:05:56+0800
	 * @param  [type]                   $roles [所有角色对象]
	 * @return [type]                          [HTML]
	 */
	public function roleList($roles,$userRoles=[])
	{
		$html = '';
		if (!$roles->isEmpty()) {
			foreach ($roles as $role) {
				$html .= '<label class="checkbox-inline"><div class="i-checks"><label> <input type="checkbox" name="role[]" '.$this->checkRole($role->id,$userRoles).' value="'.$role->id.'"> '.$role->name.' [<a data-target="#myModal" data-toggle="modal" href="'.url('admin/role',[$role->id]).'">'.trans('admin/user.role_info').'</a>]</label></div></label>';
			}
		}
		return $html;
	}
	/**
	 * 添加用户出现错误时，获取已经选中的角色
	 * @author 晚黎
	 * @date   2016-11-03T14:25:33+0800
	 * @param  [type]                   $roleId    [description]
	 * @param  array                    $userRoles [description]
	 * @return [type]                              [description]
	 */
	public function checkRole($roleId,$userRoles = [])
	{
		$roles = old('role');
		if ($roles) {
			return in_array($roleId,$roles) ? 'checked="checked"':'';
		}
		if ($userRoles) {
			if ($roles) {
				if (in_array($roleId,$userRoles) && in_array($roleId,$roles)) {
					return 'checked="checked"';
				}
			}else{
				return in_array($roleId,$userRoles) ? 'checked="checked"':'';
			}
			return '';
		}
		return '';
	}
	/**
	 * 查看用户信息时展示的table
	 * @author 晚黎
	 * @date   2016-11-03T16:49:04+0800
	 * @param  [type]                   $rolePermissions [description]
	 * @return [type]                                    [description]
	 */
	public function showUserPermissions($userPermissions)
	{
		$html = '';
		if (!$userPermissions->isEmpty()) {
			// 将角色权限分组
			$permissionArray = [];
			foreach ($userPermissions as $v) {
				array_set($permissionArray, $v->slug, ['id' => $v->id,'name' => $v->name]);
			}
			if ($permissionArray) {
				foreach ($permissionArray as $key => $permission) {
					$html .= "<tr><td>".$key."</td><td>";
					if (is_array($permission)) {
						foreach ($permission as $k => $v) {
							$html .= <<<Eof
							<div class="col-md-4">
	                        	<label> {$v['name']} </label>
	                      	</div>
Eof;
						}
					}
					$html .= '</td></tr>';
				}
			}
		}
		return $html;
	}
	/**
	 * 查看用户信息时展示的角色
	 * @author 晚黎
	 * @date   2016-11-03T16:55:32+0800
	 * @param  [type]                   $userRoles [description]
	 * @return [type]                              [description]
	 */
	public function showUserRoles($userRoles)
	{
		$html = '';
		if (!$userRoles->isEmpty()) {
			foreach ($userRoles as $role) {
				$html .= '<label class="checkbox-inline">'.$role->name.' [<a data-target="#myModal" data-toggle="modal" href="'.url('admin/role',[$role->id]).'">'.trans('admin/user.role_info').'</a>]</label>';
			}
		}
		return $html;
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface MenuRepository
 * @package namespace App\Repositories\Contracts;
 */
interface MenuRepository extends RepositoryInterface
{
    //
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PermissionRepository
 * @package namespace App\Repositories\Contracts;
 */
interface PermissionRepository extends RepositoryInterface
{
    //
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository
 * @package namespace App\Repositories\Contracts;
 */
interface RoleRepository extends RepositoryInterface
{
    //
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package namespace App\Repositories\Contracts;
 */
interface UserRepository extends RepositoryInterface
{
    //
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Repositories\Eloquent;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\MenuRepository;
use App\Models\Menu;
/**
 * 菜单仓库
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }

    public function allMenus()
    {
    	return $this->model->orderBy('sort','desc')->get()->toArray();
    }

    public function createMenu($attributes)
    {
        $model = new $this->model;
        return $model->fill($attributes)->save();
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Repositories\Eloquent;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\PermissionRepository;
use App\Models\Permission;
/**
 * Class PermissionRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }
    /**
     * 查询权限并分页
     * @author 晚黎
     * @date   2016-11-02T15:17:24+0800
     * @param  [type]                   $start  [起始数目]
     * @param  [type]                   $length [读取条数]
     * @param  [type]                   $search [搜索数组数据]
     * @param  [type]                   $order  [排序数组数据]
     * @return [type]                           [查询结果集，包含查询的数量及查询的结果对象]
     */
    public function getPermissionList($start,$length,$search,$order)
    {
        $permission = $this->model;
        if ($search['value']) {
            if($search['regex'] == 'true'){
                $permission = $permission->where('name', 'like', "%{$search['value']}%")->orWhere('slug','like', "%{$search['value']}%");
            }else{
                $permission = $permission->where('name', $search['value'])->orWhere('slug', $search['value']);
            }
        }

        $count = $permission->count();
        
        $permission = $permission->orderBy($order['name'], $order['dir']);

        $permissions = $permission->offset($start)->limit($length)->get();

        return compact('count','permissions');
    }
    /**
     * 获取所有的权限并按照功能分组
     * @author 晚黎
     * @date   2016-11-03T13:20:18+0800
     * @return [type]                   [description]
     */
    public function groupPermissionList()
    {
        $permissions = $this->model->all();
        $array = [];
        if ($permissions) {
            foreach ($permissions as $v) {
                array_set($array, $v->slug, ['id' => $v->id,'name' => $v->name]);
            }
        }
        return $array;
    }

}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Repositories\Eloquent;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\RoleRepository;
use App\Models\Role;
/**
 * 角色仓库
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * 查询角色并分页
     * @author 晚黎
     * @date   2016-11-02T15:17:24+0800
     * @param  [type]                   $start  [起始数目]
     * @param  [type]                   $length [读取条数]
     * @param  [type]                   $search [搜索数组数据]
     * @param  [type]                   $order  [排序数组数据]
     * @return [type]                           [查询结果集，包含查询的数量及查询的结果对象]
     */
    public function getRoleList($start,$length,$search,$order)
    {
        $role = $this->model;
        if ($search['value']) {
            if($search['regex'] == 'true'){
                $role = $role->where('name', 'like', "%{$search['value']}%")->orWhere('slug','like', "%{$search['value']}%");
            }else{
                $role = $role->where('name', $search['value'])->orWhere('slug', $search['value']);
            }
        }

        $count = $role->count();
        
        $role = $role->orderBy($order['name'], $order['dir']);

        $roles = $role->offset($start)->limit($length)->get();

        return compact('count','roles');
    }

    public function createRole($formData)
    {
        $role = $this->model;
        if ($role->fill($formData)->save()) {
            // 更新角色权限关系
            if (isset($formData['permission'])) {
                $role->permissions()->sync($formData['permission']);
            }
            return true;
        }
        return false;
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Repositories\Eloquent;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\UserRepository;
use App\User;
/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * 查询角色并分页
     * @author 晚黎
     * @date   2016-11-03T12:56:28+0800
     * @param  [type]                   $start  [起始数目]
     * @param  [type]                   $length [读取条数]
     * @param  [type]                   $search [搜索数组数据]
     * @param  [type]                   $order  [排序数组数据]
     * @return [type]                           [查询结果集，包含查询的数量及查询的结果对象]
     */
    public function getUserList($start,$length,$search,$order)
    {
        $user = $this->model;
        if ($search['value']) {
            if($search['regex'] == 'true'){
                $user = $user->where('name', 'like', "%{$search['value']}%")->orWhere('username','like', "%{$search['value']}%");
            }else{
                $user = $user->where('name', $search['value'])->orWhere('username', $search['value']);
            }
        }

        $count = $user->count();
        
        $user = $user->orderBy($order['name'], $order['dir']);

        $users = $user->offset($start)->limit($length)->get();

        return compact('count','users');
    }

    // public function createRole($formData)
    // {
    //     $role = $this->model;
    //     if ($role->fill($formData)->save()) {
    //         // 更新角色权限关系
    //         if (isset($formData['permission'])) {
    //             $role->permissions()->sync($formData['permission']);
    //         }
    //         return true;
    //     }
    //     return false;
    // }
    
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Service\Admin;
use App\Repositories\Eloquent\MenuRepositoryEloquent;
use Exception,DB;
/**
* 菜单service
*/
class MenuService
{
	private $menu;

	public function __construct(MenuRepositoryEloquent $menu)
	{
		$this->menu = $menu;
	}

	/**
	 * 递归菜单数据
	 * @author 晚黎
	 * @date   2016-11-04T10:43:11+0800
	 * @param  [type]                   $menus [数据库或缓存中查询出来的数据]
	 * @param  integer                  $pid   [菜单关系id]
	 * @return [type]                          [description]
	 */
	public function sortMenu($menus,$pid=0)
	{
		$arr = [];
		if (empty($menus)) {
			return '';
		}
		foreach ($menus as $key => $v) {
			if ($v['pid'] == $pid) {
				$arr[$key] = $v;
				$arr[$key]['child'] = self::sortMenu($menus,$v['id']);
			}
		}
		return $arr;
	}
	/**
	 * 排序子菜单并缓存
	 * @author 晚黎
	 * @date   2016-11-04T10:44:11+0800
	 * @return [type]                   [Array]
	 */
	public function sortMenuSetCache()
	{
		$menus = $this->menu->allMenus();
		if ($menus) {
			$menuList = $this->sortMenu($menus);
			foreach ($menuList as $key => &$v) {
				if ($v['child']) {
					$sort = array_column($v['child'], 'sort');
					array_multisort($sort,SORT_DESC,$v['child']);
				}
			}
			// 缓存菜单数据
			cache()->forever(config('admin.global.cache.menuList'),$menuList);
			return $menuList;
			
		}
		return '';
	}
	/**
	 * 获取菜单数据
	 * @author 晚黎
	 * @date   2016-11-04T10:45:38+0800
	 * @return [type]                   [description]
	 */
	public function getMenuList()
	{
		// 判断数据是否缓存
		if (cache()->has(config('admin.global.cache.menuList'))) {
			return cache()->get(config('admin.global.cache.menuList'));
		}
		return $this->sortMenuSetCache();
	}
	/**
	 * 添加菜单
	 * @author 晚黎
	 * @date   2016-11-04T15:10:32+0800
	 * @param  [type]                   $attributes [表单数据]
	 * @return [type]                               [Boolean]
	 */
	public function storeMenu($attributes)
	{
		try {
			$result = $this->menu->create($attributes);
			if ($result) {
				// 更新缓存
				$this->sortMenuSetCache();
			}
			return [
				'status' => $result,
				'message' => $result ? trans('admin/alert.menu.create_success'):trans('admin/alert.menu.create_error'),
			];
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 根据菜单ID查找数据
	 * @author 晚黎
	 * @date   2016-11-04T16:25:59+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function findMenuById($id)
	{
		$menu = $this->menu->find($id);
		if ($menu){
			return $menu;
		}
		// TODO替换正查找不到数据错误页面
		abort(404);
	}
	/**
	 * 修改菜单数据
	 * @author 晚黎
	 * @date   2016-11-04
	 * @param  [type]     $attributes [表单数据]
	 * @param  [type]     $id         [resource路由id]
	 * @return [type]                 [Array]
	 */
	public function updateMenu($attributes,$id)
	{
		// 防止用户恶意修改表单id，如果id不一致直接跳转500
		if ($attributes['id'] != $id) {
			return [
				'status' => false,
				'message' => trans('admin/errors.user_error'),
			];
		}
		try {
			$isUpdate = $this->menu->update($attributes,$id);
			if ($isUpdate) {
				// 更新缓存
				$this->sortMenuSetCache();
			}
			return [
				'status' => $isUpdate,
				'message' => $isUpdate ? trans('admin/alert.menu.edit_success'):trans('admin/alert.menu.edit_error'),
			];
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
		

	}
	/**
	 * 删除菜单
	 * @author 晚黎
	 * @date   2016-11-04
	 * @param  [type]     $id [菜单ID]
	 * @return [type]         [description]
	 */
	public function destroyMenu($id)
	{
		try {
			$isDestroy = $this->menu->delete($id);
			if ($isDestroy) {
				// 更新缓存
				$this->sortMenuSetCache();
			}
			flash_info($isDestroy,trans('admin/alert.menu.destroy_success'),trans('admin/alert.menu.destroy_error'));
			return $isDestroy;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}

	public function orderable($nestableData)
	{
		try {
			$dataArray = json_decode($nestableData,true);
			$menus = array_values($this->getMenuList());
			$menuCount = count($dataArray);
			$bool = false;
			DB::beginTransaction();
			foreach ($dataArray as $k => $v) {
				$sort = $menuCount - $k;
				if (!isset($menus[$k])) {
					$this->menu->update(['sort' => $sort,'pid' => 0],$v['id']);
					$bool = true;
				}else{
					if (isset($menus[$k]['id']) && $v['id'] != $menus[$k]['id']) {
						$this->menu->update(['sort' => $sort,'pid' => 0],$v['id']);
						$bool = true;
					}
				}
				if (isset($v['children']) && !empty($v['children'])) {
					$childCount = count($v['children']);
					foreach ($v['children'] as $key => $child) {
						$chidlSort = $childCount - $key;
						if (!isset($menus[$k]['child'][$key])) {
							foreach ($v['children'] as $index => $val) {
								$reIndex = $childCount - $index;
								$this->menu->update(['pid' => $v['id'],'sort' => $reIndex],$val['id']);
							}
							$bool = true;
						}else{
							if (isset($menus[$k]['child'][$key]) && ($child['id'] != $menus[$k]['child'][$key]['id'])) {
								$this->menu->update(['pid' => $v['id'],'sort' => $chidlSort],$child['id']);
								$bool = true;
							}
						}
					}
				}
			}
			DB::commit();
			if ($bool) {
				// 更新缓存
				$this->sortMenuSetCache();
			}
			return [
				'status' => $bool,
				'message' => $bool ? trans('admin/alert.menu.order_success'):trans('admin/alert.menu.order_error')
			];
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			DB::rollBack();
			dd($e);
		}
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Service\Admin;
use App\Repositories\Eloquent\PermissionRepositoryEloquent;
use Exception;
/**
* 权限service
*/
class PermissionService
{

	private $permission;

	function __construct(PermissionRepositoryEloquent $permission)
	{
		$this->permission =  $permission;
	}
	/**
	 * datatables获取数据
	 * @author 晚黎
	 * @date   2016-11-02T10:31:46+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		// datatables请求次数
		$draw = request('draw', 1);
		// 开始条数
		$start = request('start', config('admin.golbal.list.start'));
		// 每页显示数目
		$length = request('length', config('admin.golbal.list.length'));
		// datatables是否启用模糊搜索
		$search['regex'] = request('search.regex', false);
		// 搜索框中的值
		$search['value'] = request('search.value', '');
		// 排序
		$order['name'] = request('columns.' .request('order.0.column',0) . '.name');
		$order['dir'] = request('order.0.dir','asc');

		$result = $this->permission->getPermissionList($start,$length,$search,$order);

		$permissions = [];

		if ($result['permissions']) {
			foreach ($result['permissions'] as $v) {
				$v->actionButton = $v->getActionButtonAttribute();
				$permissions[] = $v;
			}
		}

		return [
			'draw' => $draw,
			'recordsTotal' => $result['count'],
			'recordsFiltered' => $result['count'],
			'data' => $permissions,
		];
	}
	/**
	 * 添加权限
	 * @author 晚黎
	 * @date   2016-11-02T10:32:18+0800
	 * @param  [type]                   $formData [表单中所有的数据]
	 * @return [type]                             [true or false]
	 */
	public function storePermission($formData)
	{
		try {
			$result = $this->permission->create($formData);
			flash_info($result,trans('admin/alert.permission.create_success'),trans('admin/alert.permission.create_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 根据ID获取权限数据
	 * @author 晚黎
	 * @date   2016-11-02T11:44:36+0800
	 * @param  [type]                   $id [权限id]
	 * @return [type]                       [查询出来的权限对象，查不到数据时跳转404]
	 */
	public function editView($id)
	{
		$permission =  $this->permission->find($id);
		if ($permission) {
			return $permission;
		}
		abort(404);
	}
	/**
	 * 修改权限
	 * @author 晚黎
	 * @date   2016-11-02T12:45:00+0800
	 * @param  [type]                   $attributes [表单数据]
	 * @param  [type]                   $id         [resource路由传递过来的id]
	 * @return [type]                               [true or false]
	 */
	public function updatePermission($attributes,$id)
	{
		// 防止用户恶意修改表单id，如果id不一致直接跳转500
		if ($attributes['id'] != $id) {
			abort(500);
		}
		try {
			$result = $this->permission->update($attributes,$id);
			flash_info($result,trans('admin/alert.permission.edit_success'),trans('admin/alert.permission.edit_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 权限暂不做状态管理，直接删除
	 * @author 晚黎
	 * @date   2016-11-02T13:23:45+0800
	 * @param  [type]                   $id [权限id]
	 * @return [type]                       [true or false]
	 */
	public function destroyPermission($id)
	{
		try {
			$result = $this->permission->delete($id);
			flash_info($result,trans('admin/alert.permission.destroy_success'),trans('admin/alert.permission.destroy_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
		
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Service\Admin;
use App\Repositories\Eloquent\RoleRepositoryEloquent;
use App\Repositories\Eloquent\PermissionRepositoryEloquent;
use Exception;
/**
* 角色service
*/
class RoleService
{

	private $role;
	private $permission;

	function __construct(RoleRepositoryEloquent $role,PermissionRepositoryEloquent $permission)
	{
		$this->role =  $role;
		$this->permission =  $permission;
	}
	/**
	 * datatables获取数据
	 * @author 晚黎
	 * @date   2016-11-02T10:31:46+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		// datatables请求次数
		$draw = request('draw', 1);
		// 开始条数
		$start = request('start', config('admin.golbal.list.start'));
		// 每页显示数目
		$length = request('length', config('admin.golbal.list.length'));
		// datatables是否启用模糊搜索
		$search['regex'] = request('search.regex', false);
		// 搜索框中的值
		$search['value'] = request('search.value', '');
		// 排序
		$order['name'] = request('columns.' .request('order.0.column',0) . '.name');
		$order['dir'] = request('order.0.dir','asc');

		$result = $this->role->getRoleList($start,$length,$search,$order);

		$roles = [];

		if ($result['roles']) {
			foreach ($result['roles'] as $v) {
				$v->actionButton = $v->getActionButtonAttribute(false);
				$roles[] = $v;
			}
		}

		return [
			'draw' => $draw,
			'recordsTotal' => $result['count'],
			'recordsFiltered' => $result['count'],
			'data' => $roles,
		];
	}
	/**
	 * 添加角色视图页面数据
	 * @author 晚黎
	 * @date   2016-11-02T17:25:53+0800
	 * @return [type]                   [description]
	 */
	public function getAllPermissionList()
	{
		return $this->permission->groupPermissionList();
	}
	/**
	 * 添加权限
	 * @author 晚黎
	 * @date   2016-11-03
	 * @param  [type]     $formData [表单中所有的数据]
	 * @return [type]               [true or false]
	 */
	public function storeRole($formData)
	{
		try {
			$result = $this->role->createRole($formData);
			flash_info($result,trans('admin/alert.role.create_success'),trans('admin/alert.role.create_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 根据ID获取权限数据
	 * @author 晚黎
	 * @date   2016-11-03T09:22:44+0800
	 * @param  [type]                   $id [权限id]
	 * @return [type]                       [查询出来的权限对象，查不到数据时跳转404]
	 */
	public function findRoleById($id)
	{
		$role =  $this->role->with(['permissions'])->find($id);
		if ($role) {
			return $role;
		}
		abort(404);
	}
	/**
	 * 修改权限
	 * @author 晚黎
	 * @date   2016-11-03T09:54:21+0800
	 * @param  [type]                   $attributes [表单数据]
	 * @param  [type]                   $id         [resource路由传递过来的id]
	 * @return [type]                               [Boolean]
	 */
	public function updateRole($attributes,$id)
	{
		// 防止用户恶意修改表单id，如果id不一致直接跳转500
		if ($attributes['id'] != $id) {
			abort(500,trans('admin/errors.user_error'));
		}
		try {
			$result = $this->role->update($attributes,$id);
			if ($result) {
				// 更新角色权限关系
				if (isset($attributes['permission'])) {
					$result->permissions()->sync($attributes['permission']);
				}else{
					$result->permissions()->sync([]);
				}
			}
			flash_info($result,trans('admin/alert.role.edit_success'),trans('admin/alert.role.edit_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 角色暂不做状态管理，直接删除
	 * @author 晚黎
	 * @date   2016-11-03T10:01:36+0800
	 * @param  [type]                   $id [权限id]
	 * @return [type]                       [Boolean]
	 */
	public function destroyRole($id)
	{
		try {
			$result = $this->role->delete($id);
			flash_info($result,trans('admin/alert.role.destroy_success'),trans('admin/alert.role.destroy_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
		
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Service\Admin;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\RoleRepositoryEloquent;
use App\Repositories\Eloquent\PermissionRepositoryEloquent;
use Exception;
/**
* 角色service
*/
class UserService
{

	private $user;
	private $role;
	private $permission;

	function __construct(UserRepositoryEloquent $user,RoleRepositoryEloquent $role,PermissionRepositoryEloquent $permission)
	{
		$this->user =  $user;
		$this->role =  $role;
		$this->permission =  $permission;
	}
	/**
	 * datatables获取数据
	 * @author 晚黎
	 * @date   2016-11-02T10:31:46+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		// datatables请求次数
		$draw = request('draw', 1);
		// 开始条数
		$start = request('start', config('admin.golbal.list.start'));
		// 每页显示数目
		$length = request('length', config('admin.golbal.list.length'));
		// datatables是否启用模糊搜索
		$search['regex'] = request('search.regex', false);
		// 搜索框中的值
		$search['value'] = request('search.value', '');
		// 排序
		$order['name'] = request('columns.' .request('order.0.column',0) . '.name');
		$order['dir'] = request('order.0.dir','asc');

		$result = $this->user->getUserList($start,$length,$search,$order);

		$users = [];

		if ($result['users']) {
			foreach ($result['users'] as $v) {
				$v->actionButton = $v->getActionButtonAttribute();
				$users[] = $v;
			}
		}

		return [
			'draw' => $draw,
			'recordsTotal' => $result['count'],
			'recordsFiltered' => $result['count'],
			'data' => $users,
		];
	}
	/**
	 * 创建用户视图数据
	 * @author 晚黎
	 * @date   2016-11-03T13:29:53+0800
	 * @return [type]                   [description]
	 */
	public function createView()
	{
		return [$this->getAllPermissionList(),$this->getAllRoles()];
	}
	/**
	 * 获取所有权限并分组
	 * @author 晚黎
	 * @date   2016-11-03T13:30:13+0800
	 * @return [type]                   [description]
	 */
	public function getAllPermissionList()
	{
		return $this->permission->groupPermissionList();
	}
	/**
	 * 获取所有的角色
	 * @author 晚黎
	 * @date   2016-11-03T13:23:46+0800
	 * @return [type]                   [description]
	 */
	public function getAllRoles()
	{
		return $this->role->all(['id','name']);
	}
	/**
	 * 添加用户
	 * @author 晚黎
	 * @date   2016-11-03T15:16:00+0800
	 * @param  [type]                   $formData [表单中所有的数据]
	 * @return [type]                             [Boolean]
	 */
	public function storeUser($formData)
	{
		try {
			$result = $this->user->create($formData);
			if ($result) {
				// 角色与用户关系
				if ($formData['role']) {
					$result->roles()->sync($formData['role']);
				}
				// 权限与用户关系
				if ($formData['permission']) {
					$result->userPermissions()->sync($formData['permission']);
				}
			}
			flash_info($result,trans('admin/alert.user.create_success'),trans('admin/alert.user.create_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 编辑用户视图所需数据
	 * @author 晚黎
	 * @date   2016-11-03T15:52:46+0800
	 * @param  [type]                   $id [用户ID]
	 * @return [type]                       [description]
	 */
	public function editView($id)
	{
		return [$this->findUserById($id),$this->getAllPermissionList(),$this->getAllRoles()];
	}
	/**
	 * 根据ID获取权限数据
	 * @author 晚黎
	 * @date   2016-11-03T09:22:44+0800
	 * @param  [type]                   $id [权限id]
	 * @return [type]                       [查询出来的权限对象，查不到数据时跳转404]
	 */
	public function findUserById($id)
	{
		$role =  $this->user->with(['userPermissions','roles'])->find($id);
		if ($role) {
			return $role;
		}
		abort(404);
	}
	/**
	 * 修改用户
	 * @author 晚黎
	 * @date   2016-11-03T16:12:05+0800
	 * @param  [type]                   $attributes [表单数据]
	 * @param  [type]                   $id         [resource路由传递过来的id]
	 * @return [type]                               [Boolean]
	 */
	public function updateUser($attributes,$id)
	{
		// 防止用户恶意修改表单id，如果id不一致直接跳转500
		if ($attributes['id'] != $id) {
			abort(500,trans('admin/errors.user_error'));
		}
		try {
			$result = $this->user->update($attributes,$id);
			if ($result) {
				// 更新用户角色关系
				if (isset($attributes['role'])) {
					$result->roles()->sync($attributes['role']);
				}else{
					$result->roles()->sync([]);
				}
				// 更新用户权限关系
				if (isset($attributes['permission'])) {
					$result->userPermissions()->sync($attributes['permission']);
				}else{
					$result->userPermissions()->sync([]);
				}
			}
			flash_info($result,trans('admin/alert.user.edit_success'),trans('admin/alert.user.edit_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
	}
	/**
	 * 用户暂不做状态管理，直接删除
	 * @author 晚黎
	 * @date   2016-11-03T16:33:12+0800
	 * @param  [type]                   $id [用户ID]
	 * @return [type]                       [Boolean]
	 */
	public function destroyUser($id)
	{
		try {
			$result = $this->user->delete($id);
			flash_info($result,trans('admin/alert.user.destroy_success'),trans('admin/alert.user.destroy_error'));
			return $result;
		} catch (Exception $e) {
			// TODO 错误信息发送邮件
			dd($e);
		}
		
	}
	/**
	 * 重置用户密码
	 * @author 晚黎
	 * @date   2016-11-03T17:30:09+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function resetUserPassword($id)
	{
		$responseData = [
			'status'=> false,
			'msg' 	=> trans('admin/alert.user.reset_error'),
		];
		$result = $this->user->update(['password' => config('admin.global.reset')],$id);
		if ($result) {
			$responseData['status'] = true;
			$responseData['msg'] 	= trans('admin/alert.user.reset_success');
		}
		return $responseData;
	}
}
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	/**
	 * 控制台
	 * @author 晚黎
	 * @date   2016-10-29
	 * @return [type]     [description]
	 */
    public function index()
    {
    	return view('admin.dashboard.index');
    }
    /**
     * datatable国际化
     * @author 晚黎
     * @date   2016-10-29
     * @return [type]     [description]
     */
    public function dataTableI18n()
    {
    	return response()->json(trans('pagination.i18n'));
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Admin\MenuService;
use App\Http\Requests\MenuRequest;
class MenuController extends Controller
{
    private $menu;

    public function __construct(MenuService $menu)
    {
        // 自定义权限中间件
        $this->middleware('check.permission:menu');
        $this->menu = $menu;
    }

    /**
     * 菜单列表
     * @author 晚黎
     * @date   2016-11-04T09:17:47+0800
     * @return [type]                   [description]
     */
    public function index()
    {
        $menus = $this->menu->getMenuList();
        return view('admin.menu.list')->with(compact('menus'));
    }

    /**
     * 添加菜单视图
     * @author 晚黎
     * @date   2016-11-04T09:53:36+0800
     * @return [type]                   [description]
     */
    public function create()
    {
        $menus = $this->menu->getMenuList();
        return view('admin.menu.create')->with(compact('menus'));
    }

    /**
     * 添加菜单
     * @author 晚黎
     * @date   2016-11-04T15:08:20+0800
     * @param  MenuRequest              $request [description]
     * @return [type]                            [description]
     */
    public function store(MenuRequest $request)
    {
        $responseData = $this->menu->storeMenu($request->all());
        return response()->json($responseData);
    }

    /**
     * 查看菜单详细数据
     * @author 晚黎
     * @date   2016-11-04
     * @param  [type]     $id [description]
     * @return [type]         [description]
     */
    public function show($id)
    {
        $menus = $this->menu->getMenuList();
        $menu = $this->menu->findMenuById($id);
        return view('admin.menu.show')->with(compact('menu','menus'));
    }

    /**
     * 修改菜单视图
     * @author 晚黎
     * @date   2016-11-04T16:26:53+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
        $menu = $this->menu->findMenuById($id);
        $menus = $this->menu->getMenuList();
        return view('admin.menu.edit')->with(compact('menu','menus'));
    }

    /**
     * 修改菜单数据
     * @author 晚黎
     * @date   2016-11-04T17:57:32+0800
     * @param  MenuRequest              $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(MenuRequest $request, $id)
    {
        $responseData = $this->menu->updateMenu($request->all(),$id);
        return response()->json($responseData);
    }

    /**
     * 删除菜单
     * @author 晚黎
     * @date   2016-11-04
     * @param  [type]     $id [description]
     * @return [type]         [description]
     */
    public function destroy($id)
    {
        $this->menu->destroyMenu($id);
        return redirect('admin/menu');
    }

    public function orderable()
    {
        $responseData = $this->menu->orderable(request('nestable',''));
        return response()->json($responseData);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service\Admin\PermissionService;
use App\Http\Requests\PermissionRequest;
class PermissionController extends Controller
{
    private $permission;

    function __construct(PermissionService $permission)
    {
        // 自定义权限中间件
        $this->middleware('check.permission:permission');
        $this->permission = $permission;
    }
    /**
     * 权限列表
     * @author 晚黎
     * @date   2016-10-29
     * @return [type]     [description]
     */
    public function index()
    {
        return view('admin.permission.list');
    }
    /**
     * datatables获取数据
     * @author 晚黎
     * @date   2016-10-29
     * @return [type]     [description]
     */
    public function ajaxIndex()
    {
        $responseData = $this->permission->ajaxIndex();
        return response()->json($responseData);
    }

    /**
     * 添加权限视图
     * @author 晚黎
     * @date   2016-11-01T16:47:26+0800
     * @return [type]                   [description]
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * 添加权限
     * @author 晚黎
     * @date   2016-11-02T10:30:30+0800
     * @param  PermissionRequest        $request [description]
     * @return [type]                            [description]
     */
    public function store(PermissionRequest $request)
    {
        $this->permission->storePermission($request->all());
        return redirect('admin/permission');
    }

    /**
     * 修改权限视图
     * @author 晚黎
     * @date   2016-11-02T11:42:41+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
        $permission = $this->permission->editView($id);
        return view('admin.permission.edit')->with(compact('permission'));
    }

    /**
     * 修改权限
     * @author 晚黎
     * @date   2016-11-02T11:58:45+0800
     * @param  PermissionRequest        $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->permission->updatePermission($request->all(),$id);
        return redirect('admin/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permission->destroyPermission($id);
        return redirect('admin/permission');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service\Admin\RoleService;
use App\Http\Requests\RoleRequest;
class RoleController extends Controller
{
    private $role;

    function __construct(RoleService $role)
    {
        // 自定义权限中间件
        $this->middleware('check.permission:role');
        $this->role = $role;
    }

    /**
     * 角色列表
     * @author 晚黎
     * @date   2016-11-02T17:01:40+0800
     * @return [type]                   [description]
     */
    public function index()
    {
        return view('admin.role.list');
    }
    /**
     * datatables获取数据
     * @author 晚黎
     * @date   2016-11-02T17:01:59+0800
     * @return [type]                   [description]
     */
    public function ajaxIndex()
    {
        $responseData = $this->role->ajaxIndex();
        return response()->json($responseData);
    }

    /**
     * 创建角色视图
     * @author 晚黎
     * @date   2016-11-02T17:02:16+0800
     * @return [type]                   [description]
     */
    public function create()
    {
        $permissions = $this->role->getAllPermissionList();
        return view('admin.role.create')->with(compact('permissions'));
    }

    /**
     * 添加角色
     * @author 晚黎
     * @date   2016-11-03
     * @param  RoleRequest $request [description]
     * @return [type]               [description]
     */
    public function store(RoleRequest $request)
    {
        $this->role->storeRole($request->all());
        return redirect('admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->role->findRoleById($id);
        return view('admin.role.show')->with(compact('role'));
    }

    /**
     * 修改角色
     * @author 晚黎
     * @date   2016-11-03T09:21:49+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
        $permissions = $this->role->getAllPermissionList();
        $role = $this->role->findRoleById($id);
        return view('admin.role.edit')->with(compact('role','permissions'));
    }

    /**
     * 修改角色
     * @author 晚黎
     * @date   2016-11-03T09:52:58+0800
     * @param  RoleRequest              $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(RoleRequest $request, $id)
    {
        $this->role->updateRole($request->all(),$id);
        return redirect('admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->role->destroyRole($id);
        return redirect('admin/role');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Admin\UserService;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    private $user;

    function __construct(UserService $user)
    {
        // 自定义权限中间件
        $this->middleware('check.permission:user');
        $this->user = $user;
    }

    /**
     * 用户列表
     * @author 晚黎
     * @date   2016-11-03T11:50:59+0800
     * @return [type]                   [description]
     */
    public function index()
    {
        return view('admin.user.list');
    }

    public function ajaxIndex()
    {
        $responseData = $this->user->ajaxIndex();
        return response()->json($responseData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        list($permissions,$roles) = $this->user->createView();
        return view('admin.user.create')->with(compact('permissions','roles'));
    }

    /**
     * 添加用户
     * @author 晚黎
     * @date   2016-11-03T15:14:56+0800
     * @param  UserRequest              $request [description]
     * @return [type]                            [description]
     */
    public function store(UserRequest $request)
    {
        $this->user->storeUser($request->all());
        return redirect('admin/user');
    }

    /**
     * 查看用户信息
     * @author 晚黎
     * @date   2016-11-03T16:42:06+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function show($id)
    {
        $user = $this->user->findUserById($id);
        return view('admin.user.show')->with(compact('user'));
    }

    /**
     * 修改用户视图
     * @author 晚黎
     * @date   2016-11-03T16:41:48+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
        list($user,$permissions,$roles) = $this->user->editView($id);
        return view('admin.user.edit')->with(compact('user','permissions','roles'));
    }

    /**
     * 修改用户
     * @author 晚黎
     * @date   2016-11-03T16:10:02+0800
     * @param  UserRequest              $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(UserRequest $request, $id)
    {
        $this->user->updateUser($request->all(),$id);
        return redirect('admin/user');
    }

    /**
     * 删除用户
     * @author 晚黎
     * @date   2016-11-03T17:20:49+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function destroy($id)
    {
        $this->user->destroyUser($id);
        return redirect('admin/user');
    }

    /**
     * 重置用户密码
     * @author 晚黎
     * @date   2016-11-03T17:21:05+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function resetPassword($id)
    {
        $responseData = $this->user->resetUserPassword($id);
        return response()->json($responseData);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dash';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * 自定义登录字段
     * @author 晚黎
     * @date   2016-10-20
     * @return [type]
     */
    public function username()
    {
        return config('admin.global.username');
    }

    /**
     * 重写登录验证，添加验证码
     * @author 晚黎
     * @date   2016-10-20
     * @param  Request
     * @return [type]
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 
            'password' => 'required',
            // 'captcha' => 'required|captcha'
        ],[
            'captcha.required' => trans('validation.required'),
            'captcha.captcha' => trans('validation.captcha'),
        ]);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

## Laravel 5.4 Starterkit Web Admin

### Introduction

Simple but powerful starter project to build web based administrative application. This project is based on awesome [Laravel 5.4](https://github.com/laravel/laravel) PHP Framework and [Admin LTE 2](https://github.com/almasaeed2010/AdminLTE) web admin control panel theme. The purpose of this project is to provide starter project which contains fundamental component to build web based administrative application.

### Features

1. User Authorization
2. User Management
3. Role Management
4. Access Control
5. Auto-Generated Avatar
6. Email Verification
7. System Log
8. Auto-Generated Breadcrumbs
9. Data Table Integration
10. UUID Generator

### Components

* Framework: [laravel/laravel](https://github.com/laravel/laravel)
* Themes: [almasaeed2010/AdminLTE](https://github.com/almasaeed2010/AdminLTE)
* UUID Generator: [webpatser/laravel-uuid](https://github.com/webpatser/laravel-uuid).
* Avatar Generator: [yzalis/Identicon](https://github.com/yzalis/Identicon).
* Breadcrumbs Generator: [davejamesmiller/laravel-breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs).
* Access Control: [zizaco/entrust](https://github.com/zizaco/entrust)
* Data Table: [yajra/laravel-datatables-oracle](https://github.com/yajra/laravel-datatables-oracle).

### Installation

You need to install [Composer](https://getcomposer.org/download/) and [Git] (https://git-scm.com/downloads) in your system before using this starterkit.

Start by running this command
```
git clone git@github.com:badr-interactive/starterkit-webadmin.git
composer install
cp .env.example .env
```
Wait for the installation process, and then inside the `.env` file find this section:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=homestead
```

Change the database configuration above according to your database configuration. After changing the database configuration file the section below in your `.env` file:

```
CACHE_DRIVER=file
```

Change the `CACHE_DRIVER` into `array`. You need to do this to make the `zizaco/entrust` library to work (because he is using cache tag feature in laravel which is not supported by file based cache driver).

> If you are done with the `development` phase and entering the `production` phase, please change the `CACHE_DRIVER` into `memcache` or `redis` (if you are using Redis DB) to improve your application performance.

For now we are done with the initial configuration, next we will run the laravel's `migration` and `seed` command to install the initial database schema and data. Please run this command in your terminal inside your project directory:

```
php artisan migrate
php artisan db:seed
```

Now your starterkit is ready to use. please run `php artisan serve` in your terminal and then navigate to `http://localhost:8000` in your web browser and then login with `admin@example.com` as email and `password123` as the password.

### Data Table Integration

This starterkit is using `yajra/laravel-datatables-oracle` to provide server side processing for Jquery [DataTable](https://www.datatables.net/) which is used by AdminLTE theme. To make the integration between Jquery DataTable library and `yajra/laravel-datatables-oracle` simple, this starterkit provide a php trait called `WithDatatables`. This trait was built to automate the integration process between your `Controller`, `Model` and `View` using some convention in your `Controller` of DataTable.

#### Basic Usage

For example, we want to show a list of `User` using DataTable and to do that we have `UserController`, `User` model and `list.blade.php`. The first thing we need to setup is our `UserController`. Below is the code we need to provide in our `UserController`:

```
use App\Trait\WithDatatables;

class UserController extends Controller
{
    //using WithDataTables trait
    use WithDatatables;

    function __construct(User $user)
    {
        //let the DataTable know our table model
        $this->tableModel = $user;
    }

    public function index(Request $request)
    {
        return response()->view('list');
    }
}
```

Using the basic setup above, our `UserController` now have additional method called `ajaxData()` which will provide table data for your Jquery DataTable. Now, we need to register this method in our `app/Http/routes.php` like below:

```
Route::get('data', ['as' => 'user.data', 'uses' => 'UserController@ajaxData']);
```

After adding the routes configuration, you can try to navigate to the url (for example: `http://localhost:8000/data`) to check whether to integration process is success or not. If the integration process is success, you can see the output like below:

```
{"draw":0,"recordsTotal":1,"recordsFiltered":1,"data":[{"id":1,"uuid":"bf75fdbb-0bb3-47eb-a48e-c77c2e069de6","name":"Administrator","phone":"0123-4567xxx","email":"admin@example.com","last_login":"2016-04-28 09:14:08","activation_token":"","is_active":"0","created_at":"01 Feb 2016","updated_at":"42 minutes ago","input":[]}
```

Next, what we need to do is initialize the Jquery DataTable in our `list.blade.php` file. Write the javascript code like below to fetch the data from server using Jquery DataTable:

```
@section('scripts')
<script type="text/javascript">
$('#userTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route('user.data')}}',
    columns: [
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'created_at', name: 'created_at'},
        {data: 'updated_at', name: 'updated_at'},
    ]
});
</script>
@endsection
```

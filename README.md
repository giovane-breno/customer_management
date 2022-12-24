<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h3 align="center"><p align="center">Customer Management API</p></h3>
<p align="center">An API to manage customers.</p>

  <p align="center">
    <a href="https://github.com/giovane-breno/customer_management/">View Demo</a>
    ┬À
    <a href="https://github.com/giovane-breno/customer_management/issues">Report Bug</a>
    ┬À
    <a href="https://github.com/giovane-breno/customer_management/issues">Request Feature</a>
  </p>
</div>

<p align="center"><a href="https://github.com/giovane-breno/customer_management/graphs/contributors" alt="Contributors">
        <img src="https://img.shields.io/github/contributors/giovane-breno/customer_management" /></a> <a href="https://github.com/giovane-breno/Dynamic-Form-Fields-in-Laravel/blob/main/LICENSE"><img src="https://camo.githubusercontent.com/710a6522ecfcecef911b46d1fd71998a6d4be992d0a23d559faee1b5c68cb27a/68747470733a2f2f696d672e736869656c64732e696f2f6769746875622f6c6963656e73652f4e61657265656e2f5374726170446f776e2e6a732e737667" alt="GitHub license" data-canonical-src="https://img.shields.io/github/license/giovane-breno/Dynamic-Form-Fields-in-Laravel" style="max-width: 100%;"></a><a href="https://github.com/giovane-breno/customer_management/graphs/stars" alt="stars">
        <img src="https://img.shields.io/github/stars/giovane-breno/customer_management" /></a><br><img src="https://camo.githubusercontent.com/7d1b3c7e8885ac55b920379c555c2399398f13524e30fe14d5fca83749d0a091/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f2d4c61726176656c2d3333333333333f7374796c653d666c6174266c6f676f3d6c61726176656c" alt="Laravel" data-canonical-src="https://img.shields.io/badge/-Laravel-333333?style=flat&amp;logo=laravel" style="max-width: 100%;"> <img src="https://camo.githubusercontent.com/bd329f61f047c80b2a1f5483a6a7a0d59e0fdf28527b594ab05149f3d69f0b85/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f2d426f6f7473747261702d3333333333333f7374796c653d666c6174266c6f676f3d626f6f747374726170" alt="BootStrap" data-canonical-src="https://img.shields.io/badge/-Bootstrap-333333?style=flat&amp;logo=bootstrap" style="max-width: 100%;"> 
</p>
<br>


## ­ƒøá´©Å About The Project

This is an API to do all the 4 CRUD operations. (CREATE - READ - UPDATE - DELETE).<br>
The user can register a customer using a form. 
Then, if He wants, it is possible to edit the customer data or just delete it.

To make this project I used Laravel framework, in the API, and Bootstrap, in the front-end.
If you liked this project or have suggestions, feel free to contact me and... please leave a star. ­ƒÖé

## ­ƒÆ╗ Project Working

![image](https://user-images.githubusercontent.com/57039322/206027890-bee4c00d-62ba-4555-a2da-16aaf425be0d.png)
![image](https://user-images.githubusercontent.com/57039322/206027943-48a2522c-c2fe-42f7-a9a0-a1a5847ca00a.png)

![image](https://user-images.githubusercontent.com/57039322/206028197-5f3802e4-a5a9-4a7d-b4d5-100adeb636ae.png)
![image](https://user-images.githubusercontent.com/57039322/206027979-659380e5-c5a7-46d4-91db-fac367299d87.png)



## ­ƒÆá Set-up the project

Before running the project, you need to set-up the database and table.<br>You can just copy and paste the SQL code below, if you want.

```sql 
CREATE DATABASE `api-customer`;

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `adress` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
)

```

After setting up the database, you have to clone this repo.<br>
<pre>git clone https://github.com/giovane-breno/customer_management</pre>
Then run Laravel serve command.
<pre>php artisan serve</pre>

## ­ƒÆíHow the code works

In `index.html` we have a mix of HTML and JavaScript to the project work properly.

```js 
// Submit button function.
$('#btnSubmitModal').click(function (e) {
        e.preventDefault;
        var name = $("#inputName").val();
        var age = $("#inputAge").val();
        var phone_number = $("#inputPhoneNumber").val();
        var email = $("#inputEmail").val();
        var adress = $("#inputAdress").val();
        var state = $("#selectState").val();

        $.ajax({
            method: "POST",
            url: "http://127.0.0.1:8000/api/customers/",
            data: {
                name: name,
                age: age,
                phone_number: phone_number,
                email: email,
                adress: adress,
                state: state
            },
            dataType: "json",
            success: function (response) {
                $('#AddModal').modal('hide');
                location.reload();
            }
        });
    });
```

```js 
// Edit Button Function
$(document).on("click", "#btnEdit", function () {
    $('#AddModalTitle').text("Editar Cliente");
    $('#btnEditModal').show();
    $('#btnSubmitModal').hide();

    customerID = $(this).data("id");
    var $row = $(this).closest("tr");

    $name = $row.find("td:nth-child(1)").text();
    $age = $row.find("td:nth-child(2)").text();
    $adress = $row.find("td:nth-child(3)").text();
    $state = $row.find("td:nth-child(4)").text();
    $mail = $row.find("td:nth-child(5)").text();
    $phone = $row.find("td:nth-child(6)").text();

    $('#inputName').val($name);
    $('#inputAge').val($age);
    $('#inputAdress').val($adress);
    $('#selectState').val($state);
    $('#inputEmail').val($mail);
    $('#inputPhoneNumber').val($phone);

});
```
```js 
//Delete Button Function
$('#btnDeleteModal').click(function (e) {
    e.preventDefault();
    var url = 'http://127.0.0.1:8000/api/customers/' + customerID;
    $.ajax({
        type: "DELETE",
        url: url,
        success: function (response) {
            $('#DeleteModal').modal('hide');
            location.reload();
        }
    });
});
```
## ­ƒîÇ Laravel Controller
Controller functions in this project, localized in `CustomerControler.php`
```php
// Retrieve all data from DB to table.
public function index()
    {
        $controller = new ControllersCustomerController();
        return $controller->showCustomersTable();
    }
```
```php
// Store data in database, via request.
public function store(Request $request)
    {
        $controller = new ControllersCustomerController();
        return $controller->addCustomer($request);
    }
```

```php
// Show customer data with his ID as parameter.
public function show($id)
    {
        $controller = new ControllersCustomerController();
        return $controller->selectCustomer($id);
    }
```

```php
// Update a single customer with his ID and form data.
public function update(Request $request, $id)
    {
        $controller = new ControllersCustomerController();
        return $controller->updateCustomer($request, $id);
    }
```

```php
// Delete customer with his ID as parameter.
public function destroy($id)
    {
        $service = new DeleteCustomerService();
        return $service->destroyCustomer($id);
    }
```

API functions in this project, localized in `api.php`
```php
public function showCustomersTable()
    {
        try {
            $customer = Customer::where('active', true)->orderby('id', 'desc')->get();
            return response()->json(['customers' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Empty table, register one customer at least!'], 404);
        }
    }
```
```php
public function addCustomer($request)
    {
        try {
            $customer = Customer::create([
                'name' => $request->name,
                'age' => $request->age,
                'adress' => $request->adress,
                'state' => $request->state,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'active' => 1,
            ]);
            $customer->save();
            return response()->json(['message' => 'Customer sucessfully registered!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid Request'], 400);
        }
    }
```
```php
public function selectCustomer($id)
    {
        try {
            $customer = Customer::where('active', true)->findOrfail($id);
            return response()->json(['customer' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found!'], 404);
        }
    }
```
```php
public function updateCustomer($request, $id)
    {
        try {
            $customer = Customer::where('active', true)->findOrfail($id);
            $customer->fill([
                'name' => $request->name,
                'age' => $request->age,
                'adress' => $request->adress,
                'state' => $request->state,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);
            $customer->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Customer not found!'], 404);
        }
    }
```

## ­ƒîÉ Laravel Routes
Routes in `api.php`, used in this project.
```php
Route::apiResource('customers', 'App\Http\Controllers\Api\CustomerController');
```

##

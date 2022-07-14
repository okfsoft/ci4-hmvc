<br/>
<div align="center">
  <img src="https://raw.githubusercontent.com/okfsoft/art/master/logo/okf-logo.png" width="80" alt="mscodev"/>
  <h3>CODEIGNITER 4 HMVC STARTER</h3>
</div>

---

[![License](http://poser.pugx.org/okfsoft/ci4-hmvc/license)](https://packagist.org/packages/okfsoft/ci4-hmvc)
[![Latest Stable Version](http://poser.pugx.org/okfsoft/ci4-hmvc/v)](https://packagist.org/packages/okfsoft/ci4-hmvc)
[![Latest Unstable Version](http://poser.pugx.org/okfsoft/ci4-hmvc/v/unstable)](https://packagist.org/packages/okfsoft/ci4-hmvc)
[![Total Downloads](http://poser.pugx.org/okfsoft/ci4-hmvc/downloads)](https://packagist.org/packages/okfsoft/ci4-hmvc)

# ≡ About ci4-hmvc
This is a project archive that we use to make it easier for us to build web applications based on the CodeIgniter4 framework. Hopefully it can be useful.

CodeIgniter is a php based framework and works on the MVC (Model-View-Controller) pattern. Can also use Hierarchical Model View Controller (HMVC).
HMVC stands for Hierarchical Model View Controller. This is the latest version of the HMVC pattern used for web applications. Provide solutions to help you address application scalability such as easy module updates.

<br/>
<br/>

# ≡ Table of contents
* [Requirements](#-requirements)
* [Feature List](#-feature-list)
* [Installation Preparation](#-preparation--installation)
  * [Install via composer](#install-library-via-composer)
  * [Setup HMVC](#02-distribute-hmvc)
  * [Config File](#03-modify-autoloadphp)
* **How to use**
  * [Use of HMVC](#-use-of-hmvc)
  * [Router Settings](#01-router-settings)
  * [Helpers](#-helpers)
* [Credit](#credit)


<br/>
<br/>

# ≡ Requirements
* [Framework Codeigniter 4.2.1](https://github.com/codeigniter4/framework)
* [PHP 7.4 or higher](https://www.php.net/releases/8.1/en.php)

<br/>
<br/>

# ≡ Feature list
This is a list of some features or functionality that you can use.
- [x] HMVC Architecture
- [x] BaldeOne Templating Engine

<br/>
<br/>

# ≡ Preparation & Installation
To get ready to install packages, you have to install codeigniter 4 appstarter with composer, or you can follow the [**_user guide_**](https://codeigniter4.github.io/userguide/installation/installing_composer.html) to install using composer.

Now the next step is to add the rule in composer.json in your project root, and add the following rule to make it work after the installation is complete, or you can skip this preparation and add it manually in [step number 03](#03-modify-autoloadphp).

```diff

+    "autoload": {
+        "psr-4": {
+            "Modules\\Application\\": "modules/application",
+            "Modules\\Resources\\": "modules/resources"
+        }
+    }

```

<br/>

#### 01. Install library via composer:

```shell
composer require okfsoft/ci4-hmvc
```

<br/>

#### 02. Distribute HMVC
Now you can distribute the library can be done via spark:

```shell
php spark hmvc:publish
```
This will copy and distribute the sample hmvc structure folder in your project root parallel to the codeigniter4 `app` folder.

<br/>

#### 03. Modify Autoload.php
( _Ignore rule number 03 if you have added autoload in composer.json_ ).\
Next you need to modify psr-4 settings on Autoload.php file on `app/Config/Autoload.php` and add below rules

```diff

public $collectors = [
    public $psr4 = [
        APP_NAMESPACE         => APPPATH, // For custom app namespace
        'Config'              => APPPATH . 'Config',
+       'Modules\Application' => ROOTPATH . 'modules/application',
+       'Modules\Resources'   => ROOTPATH . 'modules/resources',
    ];
];

```

<br/>
<br/>

# ≡ Use of HMVC
You can try running `php spark serve` to run codeigniter development and visiting `http://localhost:8080/starter` it will load hmvc `modules/application/Starter` which will show if there are no problems during installation.

When you `http://localhost:8080/starter/blade` will load hmvc starter using BladeOne Template Engine

<br/>

#### 01. Router Settings
You can make `Routes.php` settings for each new module created in the `modules/application/{Module_name}/Config.php` directory, using this code sample:
```php

<?php
$routes->group('home', ['namespace' => $hmvcNamespace], function ($routes) {
	$routes->get('/', 'Home::index');
	$routes->match(['get', 'post'], "(:any)", "home::$1");
});

```
You can use BladeOne Rendering which comes in the package. or use with the help of [**Class Helper**](#-helpers)

<br/>

## ≡ Helpers
| **Parameter**                        | **Information**                       |
|:-------------------------------------|:--------------------------------------|
| `return renderView('home', $data);`  | HMVC Display Rendering using Default  |
| `return renderBlade('home', $data);` | HMVC Display Rendering using BladeOne |


<br>
<br>

----

### More info useful link
- [CodeIgniter 4](https://codeigniter4.github.io/userguide/index.html)
- [BladeOne Blade Template Engine](https://github.com/EFTEC/BladeOne)


### Credit
- [CodeIgniter](https://github.com/codeigniter4)
- [BladeOne](https://github.com/EFTEC/BladeOne)
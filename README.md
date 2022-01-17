A php package to get you the server information

## Install

Via Composer

``` bash
$ composer require ameetroy/server
```

## Usage

``` php
use BubbleGum\Sweety;

$getTotalSpace = Sweety::setDiskPath('/var/www/html/')
               // ->setRaw(true)
                ->getTotalSpace();

$getFreeSpace = Sweety::setDiskPath('/var/www/html/')
               // ->setRaw(true)
                ->getFreeSpace();
```
## License

The MIT License (MIT). Please see [License File](https://github.com/ameetroy/server/LICENSE) for more information.
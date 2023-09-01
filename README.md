# laravel-jd-sdk
京东联盟API

```shell
composer require youer/laravel-jd-sdk "3.0.0"
php artisan vendor:publish --provider="Youer\LaravelJdSdk\ServiceProvider"
```

```php

use JDong\Request\JdUnionGoodsJingfenQueryRequest;
use Youer\LaravelJdSdk\Factory;

$jd = Factory::jingdong();
$req = new JdUnionGoodsJingfenQueryRequest();
$req->setEliteId(2);
$req->setPageIndex(1);
$req->setPageSize(5);
$rr = $jd->execute($req)['jd_union_open_goods_jingfen_query_response']['result'];
return json_decode($rr, true);

```


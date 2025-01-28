# religous Times
Web Service For get **religous Times** from [Bahesab](https://www.bahesab.ir/time/)

# اوقات شرعی
یک وبسرویس برای دریافت اوقات شرعی از  وبسایت [باحساب](https://www.bahesab.ir/time/isfahan/)

# How Can I Get It ?
```terminal
composer require m.s/religous_times;
``` 
then open index.php and put this code 
```php
<?php

require 'vendor/autoload.php';

$religiousTimes = new MS\ReligousTimes\ReligiousTimes();
print_r( $religiousTimes->get_data("tehran"));
```

# Created By 
Mohammad Mohammad Soltani 

# Lisence
this project have **MIT LISENCE**.
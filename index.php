<?php

// بارگذاری autoload برای Composer
require 'vendor/autoload.php';

// استفاده از کلاس MS\ReligousTimes\ReligousTimes

$religiousTimes = new MS\ReligousTimes\ReligiousTimes();
echo $religiousTimes->get_data("tehran");

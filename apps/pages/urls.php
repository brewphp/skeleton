<?php

declare(strict_types=1);

use function Apps\Pages\home;

return [
    path('', home(...), name: 'home'),
];

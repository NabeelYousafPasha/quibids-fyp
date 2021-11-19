<?php

return [

    'default_bids' => env('DEFAULT_BIDS', 10),

    'messenger' => [
        'realtime' => env('REALTIME_CHAT'),
    ],

    'notification' => [
        'realtime' => env('REALTIME_NAVBAR_NOTIFICATION'),
    ],

];

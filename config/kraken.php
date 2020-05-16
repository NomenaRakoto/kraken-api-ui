<?php
/**
 * kraken config
 */
return [
    'powers' => ['blast', 'plague', 'mind control', 'ink fog', 'force shield', 'regeneration'],
    /**
     * 1 power all 4 tentacle
     */
    "nb_tentacle_power" => 4,
    /**
     * number maximum tentacle
     */
    "nb_max_tentacle" => 8,
    "api_user" => "kraken@gmail.com",
    "api_user_pswd" => "kraken",
    "kraken_host" => env("KRAKEN_HOST")
];
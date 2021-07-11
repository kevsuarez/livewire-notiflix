<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Defines the Naming Convention used by the Notiflix Library Methods
     |--------------------------------------------------------------------------
     | If you are using Notiflix v2.7.0 or before, you must change the value
     | to 'PascalCase'.
     | 
     | Posible values: 'PascalCase', 'camelCase'
     */

    "naming_convention" => "camelCase",

    /*
     |--------------------------------------------------------------------------
     | Defines all available options for the Notiflix Notify
     |--------------------------------------------------------------------------
     */

    "notify" => [
        "width"                => "280px",
        "position"             => "right-top",
        "distance"             => "10px",
        "opacity"              => 1,
        "borderRadius"         => "5px",
        "rtl"                  => false,
        "timeout"              => 3000,
        "messageMaxLength"     => 110,
        "backOverlay"          => false,
        "backOverlayColor"     => "rgba(0,0,0,0.5)",
        "plainText"            => true,
        "showOnlyTheLastOne"   => false,
        "clickToClose"         => false,
        "pauseOnHover"         => true,
        "ID"                   => "NotiflixNotify",
        "className"            => "notiflix-notify",
        "zindex"               => 4001,
        "useGoogleFont"        => false,
        "fontFamily"           => "Quicksand",
        "fontSize"             => "13px",
        "cssAnimation"         => true,
        "cssAnimationDuration" => 400,
        "cssAnimationStyle"    => "fade",
        "closeButton"          => false,
        "useIcon"              => true,
        "useFontAwesome"       => false,
        "fontAwesomeIconStyle" => "basic",
        "fontAwesomeIconSize"  => "34px",
        "success" => [
            "background"           => "#32c682",
            "textColor"            => "#fff",
            "childClassName"       => "success",
            "notiflixIconColor"    => "#fff",
            "fontAwesomeClassName" => "fas fa-check-circle",
            "fontAwesomeIconColor" => "#fff",
            "backOverlayColor"     => "rgba(50,198,130,0.2)",
        ],
        "failure" => [
            "background"           => "#ff5549",
            "textColor"            => "#fff",
            "childClassName"       => "failure",
            "notiflixIconColor"    => "#fff",
            "fontAwesomeClassName" => "fas fa-times-circle",
            "fontAwesomeIconColor" => "#fff",
            "backOverlayColor"     => "rgba(255,85,73,0.2)",
        ],
        "warning" => [
            "background"           => "#eebf31",
            "textColor"            => "#fff",
            "childClassName"       => "warning",
            "notiflixIconColor"    => "#fff",
            "fontAwesomeClassName" => "fas fa-exclamation-circle",
            "fontAwesomeIconColor" => "#fff",
            "backOverlayColor"     => "rgba(238,191,49,0.2)",
        ],
        "info" => [
            "background"           => "#26c0d3",
            "textColor"            => "#fff",
            "childClassName"       => "info",
            "notiflixIconColor"    => "#fff",
            "fontAwesomeClassName" => "fas fa-info-circle",
            "fontAwesomeIconColor" => "#fff",
            "backOverlayColor"     => "rgba(38,192,211,0.2)",
        ],
        "onNotifyClick"        => "onNotifyClick",
    ],

    /*
     |--------------------------------------------------------------------------
     | Defines all available options for the Notiflix Report
     |--------------------------------------------------------------------------
     */

    "alert" => [
        "className"            => "notiflix-report",
        "width"                => "280px",
        "backgroundColor"      => "#f8f8f8",
        "borderRadius"         => "25px",
        "rtl"                  => false,
        "zindex"               => 10000,
        "backOverlay"          => true,
        "backOverlayColor"     => "rgba(0,0,0,0.4)",
        "useGoogleFont"        => false,
        "fontFamily"           => "Quicksand",
        "svgSize"              => "110px",
        "plainText"            => true,
        "titleFontSize"        => "16px",
        "titleMaxLength"       => 34,
        "messageFontSize"      => "13px",
        "messageMaxLength"     => 400,
        "buttonFontSize"       => "14px",
        "buttonMaxLength"      => 34,
        "cssAnimation"         => true,
        "cssAnimationDuration" => 360,
        "cssAnimationStyle"    => "fade",
        "success" => [
            "svgColor"         => "#32c682",
            "titleColor"       => "#1e1e1e",
            "messageColor"     => "#242424",
            "buttonBackground" => "#32c682",
            "buttonColor"      => "#fff",
            "backOverlayColor" => "rgba(50, 198, 130, 0.2)",
        ],
        "failure" => [
            "svgColor"         => "#ff5549",
            "titleColor"       => "#1e1e1e",
            "messageColor"     => "#242424",
            "buttonBackground" => "#ff5549",
            "buttonColor"      => "#fff",
            "backOverlayColor" => "rgba(255, 85, 73, 0.2)",
        ],
        "warning" => [
            "svgColor"         => "#eebf31",
            "titleColor"       => "#1e1e1e",
            "messageColor"     => "#242424",
            "buttonBackground" => "#eebf31",
            "buttonColor"      => "#fff",
            "backOverlayColor" => "rgba(238, 191, 49, 0.2)",
        ],
        "info" => [
            "svgColor"         => "#26c0d3",
            "titleColor"       => "#1e1e1e",
            "messageColor"     => "#242424",
            "buttonBackground" => "#26c0d3",
            "buttonColor"      => "#fff",
            "backOverlayColor" => "rgba(38, 192, 211, 0.2)",
        ],
        "onAlertClick"         => "onAlertClick",
    ],

    /*
     |--------------------------------------------------------------------------
     | Defines all available options for the Notiflix Confirm (show)
     |--------------------------------------------------------------------------
     */

    "confirm" => [
        "className"              => "notiflix-confirm",
        "width"                  => "300px",
        "zindex"                 => 4003,
        "position"               => "center",
        "distance"               => "10px",
        "backgroundColor"        => "#f8f8f8",
        "borderRadius"           => "25px",
        "backOverlay"            => true,
        "backOverlayColor"       => "rgba(0,0,0,0.5)",
        "rtl"                    => false,
        "useGoogleFont"          => false,
        "fontFamily"             => "Quicksand",
        "cssAnimation"           => true,
        "cssAnimationStyle"      => "fade",
        "cssAnimationDuration"   => 300,
        "plainText"              => true,
        "titleColor"             => "#111111",
        "titleFontSize"          => "16px",
        "titleMaxLength"         => 34,
        "messageColor"           => "#1e1e1e",
        "messageFontSize"        => "14px",
        "messageMaxLength"       => 110,
        "buttonsFontSize"        => "15px",
        "buttonsMaxLength"       => 34,
        "okButtonColor"          => "#ffffff",
        "okButtonBackground"     => "#3B82F6",
        "cancelButtonColor"      => "#ffffff",
        "cancelButtonBackground" => "#ff5549",
        "onConfirmed"            => "onConfirmed",
        "onCancelled"            => "onCancelled",
    ],

    /*
     |--------------------------------------------------------------------------
     | Defines all available options for the Notiflix Confirm (ask)
     |--------------------------------------------------------------------------
     */

    "ask" => [
        "className"              => "notiflix-ask",
        "width"                  => "300px",
        "zindex"                 => 4003,
        "position"               => "center",
        "distance"               => "10px",
        "backgroundColor"        => "#f8f8f8",
        "borderRadius"           => "25px",
        "backOverlay"            => true,
        "backOverlayColor"       => "rgba(0,0,0,0.5)",
        "rtl"                    => false,
        "useGoogleFont"          => false,
        "fontFamily"             => "Quicksand",
        "cssAnimation"           => true,
        "cssAnimationStyle"      => "fade",
        "cssAnimationDuration"   => 300,
        "plainText"              => true,
        "titleColor"             => "#111111",
        "titleFontSize"          => "16px",
        "titleMaxLength"         => 34,
        "messageColor"           => "#1e1e1e",
        "messageFontSize"        => "14px",
        "messageMaxLength"       => 110,
        "buttonsFontSize"        => "15px",
        "buttonsMaxLength"       => 34,
        "okButtonColor"          => "#ffffff",
        "okButtonBackground"     => "#3B82F6",
        "cancelButtonColor"      => "#ffffff",
        "cancelButtonBackground" => "#ff5549",
        "onAskConfirmed"         => "onAskConfirmed",
        "onAskCancelled"         => "onAskCancelled",
    ],
    
];
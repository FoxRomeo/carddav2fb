<?php

$config = [
    // phonebook
    'phonebook' => [
        'id'        => 0,                                              // only "0" can store quickdial and vanity numbers
        'name'      => 'Telefonbuch',
        'imagepath' => 'file:///var/InternerSpeicher/[YOURUSBSTICK]/FRITZ/fonpix/', // mandatory if you use the -i option
    ],

    // or server (is considered with the run and download command)
    'server' => [
        [
            'url' => 'https://...',
            'user' => '',
            'password' => '',
            'http' => [           // http client options are directly passed to Guzzle http client
                // 'verify' => false, // uncomment to disable certificate check
                // 'auth' => 'digest', // uncomment for digest auth
            ],
            // 'method' => 'PROPFIND';  // uncomment if 'REPORT' (default) causes an error (e.g. t-online)
        ],
/* add as many as you need
        [
            'url' => 'https://...',
            'user' => '',
            'password' => '',
        ],
*/
    ],

    // or fritzbox
    'fritzbox' => [
        'url' => 'http://fritz.box',
        'user' => '',
        'password' => '',
        'fonpix'   => '/[YOURUSBSTICK]/FRITZ/fonpix',   // the storage on your usb stick for uploading images
        'fritzfons' => [            // uncomment to upload quickdial image as background to designated FRITZ!Fon
            // '613',               // internal number must be in the range '610' to '615' (maximum of DECT devices)
        ],
        'quickdial_alias' => false, // if true, than vanity names ("JON") become quickdial aliases ("Jon") in the background image
        'http' => [                 // http client options are directly passed to Guzzle http client
            // 'verify' => false,   // uncomment to disable certificate check
        ],
        'ftp' => [
            'plain' => false,       // set true to use FTP instead of FTPS e.g. on Windows
            'disabled' => false,    // set true if your FRITZ!Box does not support ftp - e.g. 7412
        ],
    ],

    'filters' => [
        'include' => [                                          // if empty include all by default
            /*
            'categories' => [],
            'groups' => [],
            */
        ],

        'exclude' => [
            /*
            'categories' => [],
            'groups' => [],
            */
        ],
    ],

<<<<<<< HEAD
// Fullname parts
$config['prefix'] = false; // include prefix in fullname if existing
$config['suffix'] = false; // include suffix in fullname if existing
$config['addnames'] = false; // include additionalnames in fullname if existing
$config['orgname'] = false; // include organisation (company) in fullname if existing

// Quickdial starting keyword in notes
//$config['quickdial_keyword'] = 'Quickdial:'; // once activated you may add 'Quickdial:+49030123456:**709' to the contact note field and the number will set as quickdialnumber. You may add more quickdials for a single contact each in a new line

// Fallback type (default is 'other')
//$config[fallback_type] = 'home'; // Some Fritz!Boxes don't have type other like 6591, then use 'home', 'work', or 'mobile'

// optional: write output to file of sending it to the Fritz!Box
//$config['output_file'] = '/media/usbdisk/share/phonebook.xml';
// optional: once activated phonebook will also be upload to FRITZ!Box if changes are detectet (output_file must be set)
//$config['output_and_upload'] = false;

// optional: import only contacts of the given groups
//$config['group_filter'] = array('Arzt','Familie','Freunde','Friseur','Geschäftlich','Hotline','Notruf','Restaurant','Shops');

// group name of 'important' callers
$config['group_vip'] = 'VIP';

// base path of USB storage of Fritz!Box under which the path 'FRITZ\fonpix' could be found
// '' -> use internal fritzbox storage
//$config['usb_disk'] = 'Generic-FlashDisk-01';

// many version Fritz!Box use 'file:///var/media/ftp/' others 'file:///var/InternerSpeicher/' to check just export an your current phonebook and have a look at any imageURL tag `<imageURL>file:///var/media/ftp/(HERE_config_from:usb_disk)/FRITZ/fonpix/9.jpg</imageURL>`. 
//$config['fritzbox_path'] = 'file:///var/media/ftp/';

// multiple carddav adressbooks could be specified and will be merged together.

// first
$config['carddav'][0] = array(
  // URL of first CardDAV address book on cloud storage
  'url' => 'https://raspserver/owncloud/remote.php/carddav/addressbooks/fritzbox/fb_contacts',
  // user name/password for CardDAV access
  'user' => 'oc_username',
  'pw' => 'oc_password',
  // vcf extension
  'extension' => '.vcf'
);

// second
//$config['carddav'][1] = array(
//  'url' => 'https://raspserver/owncloud/remote.php/carddav/addressbooks/fritzbox/fb_contacts_second',
//  'user' => 'oc_username',
//  'pw' => 'oc_password',
//  'extension' => '.vcf'
//);
=======
    'conversions' => [
        'vip' => [
            'categories' => [
                'VIP'
            ],
            'groups' => [
                'PERS'
            ],
        ],
        /**
         * 'realName' conversions are processed consecutively. Order decides!
         */
        'realName' => [
            '{lastname}, {prefix} {nickname}',
            '{lastname}, {prefix} {firstname}',
            '{lastname}, {nickname}',
            '{lastname}, {firstname}',
            '{org}',
            '{fullname}'
        ],
        /**
         * 'phoneTypes':
         * The order of the target values (first occurrence) determines the sorting of the telephone numbers
         */
        'phoneTypes' => [
            'WORK' => 'work',
            'HOME' => 'home',
            'CELL' => 'mobile',
            'FAX' => 'fax_work' // NOTE: actual mapping is ignored but order counts, so fax is put last
        ],
        'emailTypes' => [
            'WORK' => 'work',
            'HOME' => 'home'
        ],
        /**
         * 'phoneReplaceCharacters' conversions are processed length descending!
         */
        'phoneReplaceCharacters' => [
            '+49' => '',  // router is usually operated in 'DE; '0049' could also be part of a phone number
            '('   => '',
            ')'   => '',
            '/'   => '',
            '-'   => ''
        ]
    ]
];
>>>>>>> 373167ed94eef8f525fa8c935e13e65ecec1ee37

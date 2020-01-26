<?php

use App\Category;
use App\Filter;
use App\FilterValue;
use App\Product;
use App\Site;
use App\User;
use App\UserAddress;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [ // ID 1
                'name' => 'Admin',
                'surname' => 'Testowy',
                'birth_date' => '2000-01-01',
                'register_ip' => '192.168.0.1',
                'email' => 'admin@admin.pl',
                'email_verified_at' => time(),
                'password' => bcrypt('admin'),
            ],
            [ // ID 2
                'name' => 'User',
                'surname' => 'Testowy',
                'birth_date' => '2000-01-01',
                'points' => 10000,
                'register_ip' => '192.168.0.1',
                'email' => 'user@user.pl',
                'email_contact' => 'test@test.pl',
                'email_verified_at' => time(),
                'password' => bcrypt('user'),
            ],
            [ // ID 3
                'name' => 'Offer',
                'surname' => 'Testowy',
                'birth_date' => '2000-01-01',
                'points' => 10000,
                'register_ip' => '192.168.0.1',
                'email' => 'offer@offer.pl',
                'email_verified_at' => time(),
                'password' => bcrypt('offer'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        ##############################################

        $userAddresses = [
            [
                'user_id' => 2,
                'street' => 'Testowa 1',
                'home_number' => 10,
                'apartment_number' => 5,
                'city' => 'Test',
                'zip_code' => '10-100',
                'phone' => '567756567',
                'latitude' => 52.7090761,
                'longitude' => 16.3593650,
            ]
        ];

        foreach ($userAddresses as $userAddress) {
            UserAddress::create($userAddress);
        }

        ##############################################

        $filters = [
            [ // ID 1
                'name' => 'Typ',
                'type' => 'text',
                'visible' => 1
            ],
            [ // ID 2
                'name' => 'Ilość silniczków',
                'type' => 'int',
                'visible' => 1
            ],
            [ // ID 3
                'name' => 'Kamera',
                'type' => 'text',
                'visible' => 1
            ],
            [ // ID 4
                'name' => 'Jakość nagrywania',
                'type' => 'text',
                'visible' => 1
            ],
            [ // ID 5
                'name' => 'Sterowanie',
                'type' => 'text',
                'visible' => 1
            ],
            [ // ID 6
                'name' => 'Kaucja',
                'type' => 'text',
                'visible' => 1
            ],
        ];

        foreach ($filters as $filter) {
            Filter::create($filter);
        }

        ##############################################

        $categories = [
            // MAIN
            [ // ID : 1
                'sub' => null,
                'name' => 'Drony',
                'desc' => '<p>Bezzałogowe statki powietrzne.</p>',
                'visible' => 1,
            ],
            [ // ID : 2
                'sub' => null,
                'name' => 'Akcesoria',
                'desc' => '<p>Różnego typu akcesoria i narzędzia dla dronów.</p>',
                'visible' => 1,
            ],

            // SUB 1
            [ // ID : 3
                'sub' => 1,
                'name' => 'RC',
                'desc' => '<p>Drony przystosowane do osiągania zawrotnych prędkości i wykonywania widowiskowych akrobacji. </p>',
                'visible' => 1,
            ],
            [ // ID : 4
                'sub' => 1,
                'name' => 'Profesjonalne',
                'desc' => '<p>Drony, których głównym przeznaczeniem jest kręcenie filmów i robienie zdjęć.</p>',
                'visible' => 1,
            ],
            [ // ID : 5
                'sub' => 1,
                'name' => 'Rekreacyjne',
                'desc' => '<p>Drony głównie służące do nauki i zabawy.</p>',
                'visible' => 1,
            ],

            // SUB 2
            [ // ID : 6
                'sub' => 2,
                'name' => 'Optyka',
                'desc' => '<p>Wszystko czym dron patrzy na świat.</p>',
                'visible' => 1,
            ],
            [ // ID : 7
                'sub' => 2,
                'name' => 'Aparatura',
                'desc' => '<p>Drążki i inne kontrolery.</p>',
                'visible' => 1,
            ],
            [ // ID : 8
                'sub' => 2,
                'name' => 'Torby',
                'desc' => '<p>Przenieś bezpiecznie swój sprzęt.</p>',
                'visible' => 1,
            ],
            [ // ID : 9
                'sub' => 2,
                'name' => 'Gogle FPV',
                'desc' => '<p>Poczuj się jak w kokpicie maszyny.</p>',
                'visible' => 1,
            ],
        ];

        $_filters = [
            [1, 2, 3, 4, 5, 6], // ID 1
            [1, 6],             // ID 2
            [1, 2, 3, 4, 5, 6], // ID 3
            [1, 2, 3, 4, 5, 6], // ID 4
            [1, 2, 3, 4, 5, 6], // ID 5
            [1, 6],             // ID 6
            [1, 6],             // ID 7
            [1, 6],             // ID 8
            [1, 6],             // ID 9
        ];

        foreach ($categories as $i => $category) {
            $category = Category::create($category);
            $category->filters()->sync($_filters[$i]);
        }

        ##############################################

        $filterValues = [
            // Typ
            [ // ID 1
                'filter_id' => 1,
                'value' => 'RC',
            ],
            [ // ID 2
                'filter_id' => 1,
                'value' => 'Profesjonalny',
            ],
            [ // ID 3
                'filter_id' => 1,
                'value' => 'Rekreacyjny',
            ],

            // Ilość silniczków
            [ // ID 4
                'filter_id' => 2,
                'value' => 1
            ],
            [ // ID 5
                'filter_id' => 2,
                'value' => 2
            ],
            [ // ID 6
                'filter_id' => 2,
                'value' => 3
            ],
            [ // ID 7
                'filter_id' => 2,
                'value' => 4
            ],

            // Kamera
            [ // ID 8
                'filter_id' => 3,
                'value' => 'tak'
            ],
            [ // ID 9
                'filter_id' => 3,
                'value' => 'nie'
            ],

            // Jakość nagrywania
            [ // ID 10
                'filter_id' => 4,
                'value' => 'HD Ready'
            ],
            [ // ID 11
                'filter_id' => 4,
                'value' => 'FullHD'
            ],
            [ // ID 12
                'filter_id' => 4,
                'value' => 'WQHD'
            ],
            [ // ID 13
                'filter_id' => 4,
                'value' => '4K'
            ],

            // Sterowanie
            [ // ID 14
                'filter_id' => 5,
                'value' => 'Telefon'
            ],
            [ // ID 15
                'filter_id' => 5,
                'value' => 'Pilot'
            ],

            // Kaucja
            [ // ID 16
                'filter_id' => 6,
                'value' => 'tak'
            ],
            [ // ID 17
                'filter_id' => 6,
                'value' => 'nie'
            ],
        ];

        foreach ($filterValues as $filterValue) {
            FilterValue::create($filterValue);
        }

        ##############################################

        $products = [
            [ // ID 1
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'DJI Mavic mini',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 150,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 2
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'DJI Tello',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 50,
                'premium' => 1,
                'visible' => 1,
            ],
            [ // ID 3
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Xiaomi FIMI',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 100,
                'premium' => 1,
                'visible' => 1,
            ],
            [ // ID 4
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'SYMA',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 200,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 5
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Eachine',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 80,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 6
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Overmax xbee',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 180,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 7
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'DJI Spark',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 210,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 8
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'DJI s1000',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 70,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 9
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Visou',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 180,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 10
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'JJRC H51',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 100,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 11
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'SG106',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 90,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 12
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Xiaomi mitu',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 300,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 13
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Mavic Pro 2',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 400,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 14
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'MJX Bugs',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 45,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 15
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Mavic air pro',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 60,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 16
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'SGs900',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 65,
                'premium' => 0,
                'visible' => 1,
            ],
            [ // ID 17
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Aosenna',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 75,
                'premium' => 0,
                'visible' => 1,
            ],
        ];

        $_categories = [
            [1, 4], // ID 1
            [1, 5], // ID 2
            [1, 4], // ID 3
            [1, 5], // ID 4
            [1, 5], // ID 5
            [1, 5], // ID 6
            [1, 5], // ID 7
            [1, 4], // ID 8
            [1, 3], // ID 9
            [1, 3], // ID 10
            [1, 3], // ID 11
            [1, 3], // ID 12
            [1, 4], // ID 13
            [1, 5], // ID 14
            [1, 4], // ID 15
            [1, 5], // ID 16
            [1 ,3], // ID 17
        ];

        $_filters = [
            [2, 8, 15],     // ID 1
            [3, 8, 11],     // ID 2
            [2, 15],        // ID 3
            [3, 9, 16],     // ID 4
            [3, 16],        // ID 5
            [3, 9, 14],     // ID 6
            [3, 8, 13],     // ID 7
            [2, 7],         // ID 8
            [1, 7, 8],      // ID 9
            [1, 8, 15, 16], // ID 10
            [1, 8, 11],     // ID 11
            [1, 8, 15],     // ID 12
            [2, 15, 16],    // ID 13
            [3, 6, 16],     // ID 14
            [2, 7, 15, 16], // ID 15
            [3, 14],        // ID 16
            [1, 8, 10],     // ID 17
        ];

        foreach ($products as $i => $product) {
            $product = Product::create($product);
            $product->categories()->sync($_categories[$i]);
            $product->filterValues()->sync($_filters[$i]);
        }

        ##############################################

        $sites = [
            [
                'name' => 'FAQ',
                'group' => 'Informacje',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Regulamin',
                'group' => 'Informacje',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Polityka prywatności',
                'group' => 'Informacje',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Facebook',
                'group' => 'Social Media',
                'content' => '',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Instagram',
                'group' => 'Social Media',
                'content' => '',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Twitter',
                'group' => 'Social Media',
                'content' => '',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Jak działamy?',
                'group' => 'Wynajmnik.pl',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'O nas',
                'group' => 'Wynajmnik.pl',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Kontakt',
                'group' => 'Wynajmnik.pl',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
        ];

        foreach ($sites as $site) {
            Site::create($site);
        }

    }
}

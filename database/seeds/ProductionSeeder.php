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
            [
                'name' => 'Admin',
                'surname' => 'Testowy',
                'birth_date' => '2000-01-01',
                'register_ip' => '192.168.0.1',
                'email' => 'admin@admin.pl',
                'email_verified_at' => time(),
                'password' => bcrypt('admin'),
            ],
            [
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
            [
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
            ]
        ];

        foreach ($userAddresses as $userAddress) {
            UserAddress::create($userAddress);
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
                'name' => 'Gogle FVP',
                'desc' => '<p>Poczuj się jak w kokpicie maszyny.</p>',
                'visible' => 1,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
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
            [
                'user_id' => 2,
                'user_address_id' => 1,
                'name' => 'Testowy produkt',
                'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate sem non accumsan pretium. Nunc eros tortor, vulputate vel ex eget, maximus placerat ante. Pellentesque vestibulum iaculis consequat. Duis commodo lectus in justo consectetur porttitor. Nulla ac varius metus. Morbi a ligula vitae nulla laoreet commodo. Vivamus efficitur mattis turpis vel euismod. Nullam aliquam lacus sed consectetur molestie. Nunc eu odio et nisi placerat tincidunt. Vestibulum ultricies vestibulum ipsum tempor venenatis. Nullam porta ultricies nibh, id feugiat dui semper vel. Maecenas eget consectetur nisl. Nulla id magna laoreet, convallis ex sit amet, mattis dui. </p>',
                'price' => 100,
                'premium' => 1,
                'visible' => 1,
            ]
        ];

        foreach ($products as $product) {
            $product = Product::create($product);
            $product->categories()->sync([1, 3]);
            $product->filterValues()->sync([1, 7, 8, 13, 15, 16]);
        }

        ##############################################

        $sites = [
            [
                'name' => 'Polityka cookies',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Regulamin',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'O nas',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'Jak zacząć',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mauris metus, fermentum at scelerisque quis, condimentum ac tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at magna consequat, porttitor nulla quis, maximus turpis. Maecenas gravida libero at condimentum scelerisque. Phasellus feugiat, urna sit amet sagittis consequat, tortor mi euismod massa, varius auctor lacus justo id ex. Phasellus condimentum augue sit amet metus aliquet, sit amet egestas velit lobortis. Integer lobortis in diam et faucibus. Aenean interdum scelerisque pretium. Maecenas vehicula arcu ac luctus luctus.</p>'
                            .'<p>Nulla sollicitudin ut justo a blandit. Aenean ut ornare sem. Integer semper arcu ac auctor pellentesque. Donec blandit, felis eget luctus facilisis, orci odio tincidunt purus, ut viverra metus diam sed ex. Donec tellus nulla, malesuada et nulla id, tincidunt mollis elit. In elementum sem ac lectus venenatis vestibulum in vitae tortor. In sagittis, lorem id vulputate vehicula, libero mi dignissim risus, id euismod velit felis quis dolor. Donec eu pharetra nunc. Morbi vestibulum, enim sit amet gravida varius, neque augue porttitor sapien, id vestibulum ipsum purus ac felis. Sed pharetra non nibh in consequat. Pellentesque finibus lacus lorem, ac aliquet diam convallis quis. Donec eros dui, pulvinar quis nulla ut, aliquet luctus arcu. Cras pretium velit a pellentesque euismod. Curabitur nunc diam, venenatis sed fringilla eu, vestibulum vitae odio. Phasellus iaculis diam turpis.</p>'
                            .'<p>Suspendisse sed augue lobortis, egestas turpis nec, elementum metus. Donec ultrices turpis id nunc volutpat luctus. Proin vitae lorem varius, commodo velit interdum, imperdiet tellus. In hac habitasse platea dictumst. Sed a sollicitudin justo. Aliquam eu placerat eros. Aliquam iaculis lacinia erat ut scelerisque. </p>',
                'author' => 'Admin',
                'visible' => 1
            ],
            [
                'name' => 'FAQ',
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

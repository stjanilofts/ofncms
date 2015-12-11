<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        function get_http_response_code($url) {
            $headers = get_headers($url);
            return substr($headers[0], 9, 3);
        }

        // Notendur
        \App\User::create([
            'name' => 'Netvistun',
            'email' => 'vinna@netvistun.is',
            'password' => bcrypt(env('NETVISTUN')),
            'remember_token' => str_random(10),
        ]);












        $merki = factory(\App\Page::class)->create([
                'title' => 'Vörumerki',
                'slug' => '_merki',
                'content' => '',
                'images' => [],
                'files' => [],
            ]);
            factory(\App\Page::class)->create([
                    'title' => 'Master Spas',
                    'slug' => '_master-spas',
                    'parent_id' => $merki->id,
                    'content' => '',
                    'images' => [
                        [
                            'name' => 'logo-master-spas.png',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'MHS Radiators',
                    'slug' => '_mhs',
                    'parent_id' => $merki->id,
                    'content' => '',
                    'images' => [
                        [
                            'name' => 'logo-mhs.png',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Thor',
                    'slug' => '_thor',
                    'parent_id' => $merki->id,
                    'content' => '',
                    'images' => [
                        [
                            'name' => 'logo-thor.png',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'H2X',
                    'slug' => '_h2x',
                    'parent_id' => $merki->id,
                    'content' => '',
                    'images' => [
                        [
                            'name' => 'logo-h2x.png',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Danfoss',
                    'slug' => '_danfoss',
                    'parent_id' => $merki->id,
                    'content' => '',
                    'images' => [
                        [
                            'name' => 'logo-danfoss.png',
                        ]
                    ],
                    'files' => [],
                ]);


        $stadsetning = factory(\App\Page::class)->create([
                'title' => 'Staðsetning',
                'slug' => '_stadsetning',
                'content' => '<iframe width="100%" height="100%" frameborder="0" src="http://ja.is/kort/embedded/?zoom=8&x=362806&y=405751&layer=map&q=Ofnasmi%C3%B0ja+Reykjav%C3%ADkur+ehf%2C+Vagnh%C3%B6f%C3%B0a+11"></iframe>',
                'images' => [],
                'files' => [],
            ]);


        $opnunartimi = factory(\App\Page::class)->create([
                'title' => 'Opnunartímar',
                'slug' => '_opnunartimi',
                'content' => '
<p><strong>Mán - Fim</strong><br />
09:00 - 17:00</p>

<p><strong>Fös</strong><br />
09:00 - 16:00</p>
                ',
                'images' => [],
                'files' => [],
            ]);


        $simi = factory(\App\Page::class)->create([
                'title' => 'Símanúmer',
                'slug' => '_simi',
                'content' => '<p><strong>Sími</strong><br>
(+354) 577 5177</p>

<p><strong>Fax</strong><br>
(+354) 577 5178</p>',
                'images' => [],
                'files' => [],
            ]);






        $forsidukubbar = factory(\App\Page::class)->create([
                'title' => 'Forsíðukubbar',
                'slug' => '_forsidukubbar',
                'content' => '',
                'images' => [],
                'files' => [],
            ]);
            factory(\App\Page::class)->create([
                    'title' => 'Ofnar',
                    'slug' => '_kubbur-ofnar',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'ofnar.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Handklæðaofnar',
                    'slug' => '_kubbur-handklaeda-ofnar',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'handklaeda-ofnar.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Hitalausnir',
                    'slug' => '_kubbur-hitalausnir',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'hitalausnir.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Ofnlokar og hitanemar',
                    'slug' => '_kubbur-ofnlokar-og-hitanemar',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'ofnlokar-og-hitanemar.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Master Spas nuddpottar',
                    'slug' => '_kubbur-master-spas-nuddpottar',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'master-spas.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Design ofnar',
                    'slug' => '_kubbur-design-ofnar',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'design-ofnar.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Dustless blaster',
                    'slug' => '_kubbur-dustless-blaster',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'dustless-blaster.jpg',
                        ]
                    ]
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Önnur þjónusta',
                    'slug' => '_kubbur-onnur-thjonusta',
                    'url' => '#',
                    'parent_id' => $forsidukubbar->id,
                    'images' => [
                        [
                            'name' => 'onnur-thjonusta.jpg',
                        ]
                    ]
                ]);







        $forsidumyndir = factory(\App\Page::class)->create([
                'title' => 'Forsíðumyndir',
                'slug' => '_forsidumyndir',
                'content' => '',
                'images' => [],
                'files' => [],
            ]);

            factory(\App\Page::class)->create([
                    'title' => 'Vertu stjórnandi í þínu umhverfi í nuddpotti frá Master Spa',
                    'slug' => '_mynd1',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Vertu stjórnandi í þínu umhverfi í nuddpotti frá Master Spa</p>',
                    'images' => [
                        [
                            'name' => '5.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Vertu stjórnandi í þínu umhverfi í nuddpotti frá Master Spa',
                    'slug' => '_mynd2',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Vertu stjórnandi í þínu umhverfi í nuddpotti frá Master Spa</p>',
                    'images' => [
                        [
                            'name' => '6.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Vertu stjórnandi í þínu umhverfi í nuddpotti frá Master Spa',
                    'slug' => '_mynd3',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Vertu stjórnandi í þínu umhverfi í nuddpotti frá Master Spa</p>',
                    'images' => [
                        [
                            'name' => '4.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Sundtak snillings og fjölskylduskemmtun í H2X sundpotti',
                    'slug' => '_mynd5',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Sundtak snillings og fjölskylduskemmtun í H2X sundpotti</p>',
                    'images' => [
                        [
                            'name' => '3.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Ofnar í gæðaflokki',
                    'slug' => '_mynd6',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Ofnar í gæðaflokki</p>',
                    'images' => [
                        [
                            'name' => '1.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Ofnar í gæðaflokki',
                    'slug' => '_mynd7',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Ofnar í gæðaflokki</p>',
                    'images' => [
                        [
                            'name' => '2.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Handklæðaofnar í miklu úrvali',
                    'slug' => '_mynd8',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Handklæðaofnar í miklu úrvali</p>',
                    'images' => [
                        [
                            'name' => '7.jpg',
                        ]
                    ],
                    'files' => [],
                ]);
            factory(\App\Page::class)->create([
                    'title' => 'Handklæðaofnar í miklu úrvali',
                    'slug' => '_mynd9',
                    'parent_id' => $forsidumyndir->id,
                    'content' => '<p>Handklæðaofnar í miklu úrvali</p>',
                    'images' => [
                        [
                            'name' => '8.jpg',
                        ]
                    ],
                    'files' => [],
                ]);


        $fyrirtaekid = factory(\App\Page::class)->create([
                'title' => 'Fyrirtækið',
                'slug' => 'fyrirtaekid',
                'content' => '
<p>Ofnasmiðja Reykjavíkur er smásölufyrirtæki með starfsemi á Íslandi.</p>
<p>Hlutverk Ofnasmiðju Reykjavíkur er að bjóða viðskiptavinum góða vöru á hagstæðu verði og breytt úrval.  Um er að ræða miðstöðvarofna í öllum stærðum og gerðum, handklæðaofna, ofnloka, rafhitaða nuddpotta og fleira.</p>
<p>Ofnasmiðja Reykjavíkur var stofnað fyrst í kringum 1980 þá undir nafninu Ofnasmiðja Björns Oddssonar. Það var um haustið 1998 sem fyrirtækið flutti frá Egilsstöðum til Reykjavíkur og var þá nafnið Ofnasmiðja Reykjavíkur tekið upp og starfar undir því nafni í dag.</p>
<p>Fyrirtækið hefur flutt inn Thor ofnana frá Danmörku um árabil.  Árum áður var eingöngu um samsetningu að ræða og lökkun að ósk viðskiptavina.  Með tímanum var farið að framleiða helstu stærðir og allir ofnar skilaðir full lakkaðir með hvítu lakki.</p>
<p>Um 1990 - 1991 var farið að hefja innflutningi á tilbúnum ofnum, og enn í dag hefur þetta skilað sér  vel til viðskiptavina.  Allar helstu stærðir eru til á lager og viðskipatavinurinn getur fengið alla ofna afgreidda strax.</p>
                ',
                'images' => [],
                'files' => [],
            ]);

        factory(\App\Page::class)->create([
                'title' => 'Hafa samband',
                'slug' => 'hafa-samband',
                'content' => '',
                'images' => [],
                'files' => [],
            ]);


        factory(\App\Page::class)->create([
                'title' => 'Vörur',
                'slug' => 'vorur',
                'content' => '',
                'images' => [],
                'files' => [],
            ]);
















































        $url = 'http://ofnasmidja.is';


        /* import */
        $conn = new mysqli('157.157.17.4', 'ofnasmid_usr', 'QSxHwNQ3^rA#', 'ofnasmid_mambo3');
        $conn->set_charset("utf8");

        $result = $conn->query("SELECT * FROM mos_as_flokkar;");
        while($row = $result->fetch_assoc()) {
            $slug = str_slug($row['title']);

            $newPath = public_path().'/uploads/flokkur'.$row['id'].'.jpg';
            $oldPath = $url.'/images/com_ahsshop/images/flokkur'.$row['id'].'.jpg';

            $images = false;

            //if(!file_exists($newPath)) {
                if(get_http_response_code($oldPath) == "200"){
                    $img = file_get_contents($oldPath);
                    file_put_contents($newPath, $img);
                    $images = [
                        [
                            'name' => 'flokkur'.$row['id'].'.jpg',
                        ],
                        [
                            'name' => 'a1.jpg',
                        ],
                        [
                            'name' => 'a2.jpg',
                        ],
                        [
                            'name' => 'a3.jpg',
                        ],
                        [
                            'name' => 'a4.jpg',
                        ],
                        [
                            'name' => 'a5.jpg',
                        ],
                        [
                            'name' => 'a6.jpg',
                        ],
                    ];
                }
            //}

            $cat = false;

            $cat = factory(App\Category::class)->create([
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'slug' => $slug.'-'.$row['id'],
                    'status' => ($row['active'] ? 1 : 0),
                    'order' => $row['ordering'],
                    'content' => $row['descr'],
                    'images' => $images,
                ]);
        }
        

        $result = $conn->query("SELECT * FROM mos_as_vorur;");
        while($row = $result->fetch_assoc()) {
            $slug = str_slug($row['title']);

            $product = false;

            $files = false;
            $shell = false;
            $skirt = false;
            $tech = false;
            $sizes = false;

            if($row['id']==108) {
                $files = [
                    [
                        'title' => 'Kenwood-SIR-KEN1_Installation_Manual.pdf',
                        'name' => 'Kenwood-SIR-KEN1_Installation_Manual.pdf',
                    ],
                    [
                        'title' => 'Kenwood_European_Tuning_Conversions.pdf',
                        'name' => 'Kenwood_European_Tuning_Conversions.pdf',
                    ],
                ];

                $shell = [
                    [
                        'title' => 'shell1.jpg',
                        'name' => 'shell1.jpg',
                    ],
                    [
                        'title' => 'shell2.jpg',
                        'name' => 'shell2.jpg',
                    ],
                    [
                        'title' => 'shell3.jpg',
                        'name' => 'shell3.jpg',
                    ],
                    [
                        'title' => 'shell4.jpg',
                        'name' => 'shell4.jpg',
                    ],
                    [
                        'title' => 'shell5.jpg',
                        'name' => 'shell5.jpg',
                    ],
                    [
                        'title' => 'shell1.jpg',
                        'name' => 'shell1.jpg',
                    ],
                    [
                        'title' => 'shell2.jpg',
                        'name' => 'shell2.jpg',
                    ],
                    [
                        'title' => 'shell3.jpg',
                        'name' => 'shell3.jpg',
                    ],
                    [
                        'title' => 'shell4.jpg',
                        'name' => 'shell4.jpg',
                    ],
                    [
                        'title' => 'shell5.jpg',
                        'name' => 'shell5.jpg',
                    ],
                    [
                        'title' => 'shell1.jpg',
                        'name' => 'shell1.jpg',
                    ],
                    [
                        'title' => 'shell2.jpg',
                        'name' => 'shell2.jpg',
                    ],
                    [
                        'title' => 'shell3.jpg',
                        'name' => 'shell3.jpg',
                    ],
                    [
                        'title' => 'shell4.jpg',
                        'name' => 'shell4.jpg',
                    ],
                    [
                        'title' => 'shell5.jpg',
                        'name' => 'shell5.jpg',
                    ],
                ];

                $skirt = [
                    [
                        'title' => 'skirt1.jpg',
                        'name' => 'skirt1.jpg',
                    ],
                    [
                        'title' => 'skirt2.jpg',
                        'name' => 'skirt2.jpg',
                    ],
                    [
                        'title' => 'skirt3.jpg',
                        'name' => 'skirt3.jpg',
                    ],
                    [
                        'title' => 'skirt4.jpg',
                        'name' => 'skirt4.jpg',
                    ],
                    [
                        'title' => 'skirt5.jpg',
                        'name' => 'skirt5.jpg',
                    ],
                    [
                        'title' => 'skirt1.jpg',
                        'name' => 'skirt1.jpg',
                    ],
                    [
                        'title' => 'skirt2.jpg',
                        'name' => 'skirt2.jpg',
                    ],
                    [
                        'title' => 'skirt3.jpg',
                        'name' => 'skirt3.jpg',
                    ],
                    [
                        'title' => 'skirt4.jpg',
                        'name' => 'skirt4.jpg',
                    ],
                    [
                        'title' => 'skirt5.jpg',
                        'name' => 'skirt5.jpg',
                    ],
                    [
                        'title' => 'skirt1.jpg',
                        'name' => 'skirt1.jpg',
                    ],
                    [
                        'title' => 'skirt2.jpg',
                        'name' => 'skirt2.jpg',
                    ],
                    [
                        'title' => 'skirt3.jpg',
                        'name' => 'skirt3.jpg',
                    ],
                    [
                        'title' => 'skirt4.jpg',
                        'name' => 'skirt4.jpg',
                    ],
                    [
                        'title' => 'skirt5.jpg',
                        'name' => 'skirt5.jpg',
                    ],
                    [
                        'title' => 'skirt1.jpg',
                        'name' => 'skirt1.jpg',
                    ],
                    [
                        'title' => 'skirt2.jpg',
                        'name' => 'skirt2.jpg',
                    ],
                    [
                        'title' => 'skirt3.jpg',
                        'name' => 'skirt3.jpg',
                    ],
                    [
                        'title' => 'skirt4.jpg',
                        'name' => 'skirt4.jpg',
                    ],
                    [
                        'title' => 'skirt5.jpg',
                        'name' => 'skirt5.jpg',
                    ],
                ];

                $tech = "Hæð;1
Þyngd;2
Litur;3
Breidd;4
O.s.frv.;O.s.frv.";

                $sizes = "Stærð 1;80.000,- kr.
Eitthvað meira;1
Eitthvað meira;2
Eitthvað meira;3
###
Stærð 2;82.000,- kr.
Eitthvað meira;1
Eitthvað meira;2
Eitthvað meira;3
###
Stærð 3;84.000,- kr.
###
Stærð 4;85.000,- kr.";
            }

            $newPath = public_path().'/uploads/vara'.$row['id'].'.jpg';
            $oldPath = $url.'/images/com_ahsshop/images/vara'.$row['id'].'.jpg';

            $images = false;

            //if(!file_exists($newPath)) {
                if(get_http_response_code($oldPath) == "200") {
                    $img = file_get_contents($oldPath);
                    file_put_contents($newPath, $img);
                    $images = [
                        [
                            'name' => 'vara'.$row['id'].'.jpg',
                        ],
                        [
                            'name' => 'a1.jpg',
                        ],
                        [
                            'name' => 'a2.jpg',
                        ],
                        [
                            'name' => 'a3.jpg',
                        ],
                        [
                            'name' => 'a4.jpg',
                        ],
                        [
                            'name' => 'a5.jpg',
                        ],
                        [
                            'name' => 'a6.jpg',
                        ],
                    ];
                }
            //}

            $product = factory(App\Product::class)->create([
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'price' => $row['price'],
                    'category_id' => (int)$row['flokkur'],
                    'vnr' => $row['vnr'],
                    'slug' => $slug.'-'.$row['id'],
                    'status' => ($row['published'] > 0 ? 1 : 0),
                    'order' => $row['ordering'],
                    'content' => $row['descr'],
                    'images' => $images,
                    'shell' => ($shell ? $shell : []),
                    'tech' => ($tech ? $tech : ''),
                    'sizes' => ($sizes ? $sizes : ''),
                    'skirt' => ($skirt ? $skirt : []),
                    'files' => ($files ? $files : []),
                ]);
        }
        




















        Model::reguard();
    }
}
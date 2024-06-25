<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Avanza 2020',
                'price' => 125000000,
                'description' => 'Kondisi prima dan irit bensin,
            normal,
            baik',
                'image' => 'Avanza/toyota_avanza_g_15_at_2023_1718364155_20322412_progressive.jpg',
                'image2' => 'Avanza/toyota_avanza_g_15_at_2023_1718364155_74473cbb_progressive.jpg',
                'image3' => 'Avanza/toyota_avanza_g_15_at_2023_1718364155_8c24ecf4_progressive.jpg',
                'image4' => 'Avanza/toyota_avanza_g_15_at_2023_1718364155_8cd18496_progressive.jpg',
            ],

            [
                'name' => 'Mitsubishi L300 2023',
                'price' => 110000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Mitsubishi l300/mitsubishi_l300_2023_1718462895_98aa0433_progressive.jpg',

                'image2' => 'Mitsubishi l300/mitsubishi_l300_2023_1718462895_510226b0_progressive.jpg',

                'image3' => 'Mitsubishi l300/mitsubishi_l300_2023_1718462895_bdf243a6_progressive.jpg',

                'image4' => 'Mitsubishi l300/mitsubishi_l300_2023_1718462895_e4754918_progressive.jpg',
            ],

            [
                'name' => 'Toyota Corolla Altis AT 2008',
                'price' => 47000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Corolla/toyota_corolla_altis_at_2008_1718023998_b05e444b_progressive.jpg',

                'image2' => 'Corolla/toyota_corolla_altis_at_2008_1718023998_9e8bf680_progressive.jpg',

                'image3' => 'Corolla/toyota_corolla_altis_at_2008_1718023998_7bb9d93f_progressive.jpg',

                'image4' => 'Corolla/toyota_corolla_altis_at_2008_1718023998_6cccfd5e_progressive.jpg',
            ],

            [
                'name' => 'Isuzu traga box 25 2021',
                'price' => 54000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Isuzu traga box 25 2021/isuzu_traga_box_25_2021_1718017754_1c6d2a28_progressive.jpg',

                'image2' => 'Isuzu traga box 25 2021/isuzu_traga_box_25_2021_1718017754_16e68040_progressive.jpg',

                'image3' => 'Isuzu traga box 25 2021/isuzu_traga_box_25_2021_1718017754_726f19fb_progressive.jpg',

                'image4' => 'Isuzu traga box 25 2021/isuzu_traga_box_25_2021_1718017754_1672440c_progressive.jpg',
            ],

            [
                'name' => 'M l3000 2020',
                'price' => 83000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'M I3000 2020/m_l3000_2020_1718019642_89fd2240_progressive.jpg',

                'image2' => 'M I3000 2020/m_l3000_2020_1718019642_f19514e5_progressive.jpg',

                'image3' => 'M I3000 2020/m_l3000_2020_1718019642_004d232d_progressive.jpg',

                'image4' => 'M I3000 2020/m_l3000_2020_1718019642_00aa3af1_progressive.jpg',
            ],

            [
                'name' => 'Suzuki ignix GX 2017',
                'price' => 102000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Suzuki ignis GX 2017/suzuki_ignis_gx_2017_1718021781_171b2021_progressive.jpg',

                'image2' => 'Suzuki ignis GX 2017/suzuki_ignis_gx_2017_1718021781_04795ce2_progressive.jpg',

                'image3' => 'Suzuki ignis GX 2017/suzuki_ignis_gx_2017_1718021781_cf6254f8_progressive.jpg',

                'image4' => 'Suzuki ignis GX 2017/suzuki_ignis_gx_2017_1718021781_e5242bdc_progressive.jpg',
            ],

            [
                'name' => 'Suzuki X-OVER AT 2008',
                'price' => 66000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Suzuki X-OVER AT 2008/suzuki_xover_at_2008_1718147668_22382a18_progressive.jpg',

                'image2' => 'Suzuki X-OVER AT 2008/suzuki_xover_at_2008_1718147668_0288bc42_progressive.jpg',

                'image3' => 'Suzuki X-OVER AT 2008/suzuki_xover_at_2008_1718147668_b7ded3af_progressive.jpg',

                'image4' => 'Suzuki X-OVER AT 2008/suzuki_xover_at_2008_1718147668_ea7fc62e_progressive.jpg',
            ],

            [
                'name' => 'Toyota Kijang Innova G 2,4 2019',
                'price' => 129000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Toyota kijang Innova G 2,4 2019/toyota_kijang_innova_g_24_2019_1718074570_cb1840b0_progressive.jpg',

                'image2' => 'Toyota kijang Innova G 2,4 2019/toyota_kijang_innova_g_24_2019_1718074570_98b82dd4_progressive.jpg',

                'image3' => 'Toyota kijang Innova G 2,4 2019/toyota_kijang_innova_g_24_2019_1718074570_4b7437f5_progressive.jpg',

                'image4' => 'Toyota kijang Innova G 2,4 2019/toyota_kijang_innova_g_24_2019_1718074570_1a766259_progressive.jpg',
            ],

            [
                'name' => 'Wuling air EV',
                'price' => 89000000,
                'description' => 'Kondisi 99% Mulus, BEBAS banjir dan BEBAS tabrak, Body/Exterior Mulus, Klistrikan Normal, Kondisi Mesin Kering',

                'image' => 'Wuling air EV/wuling_air_ev_loang_2023_1718147890_4e7e14f8_progressive.jpg',

                'image2' => 'Wuling air EV/wuling_air_ev_loang_2023_1718147890_7a623fce_progressive.jpg',

                'image3' => 'Wuling air EV/wuling_air_ev_loang_2023_1718147890_0389816a_progressive.jpg',

                'image4' => 'Wuling air EV/wuling_air_ev_loang_2023_1718147890_f5bbf4bf_progressive.jpg',
            ],

        ]);
    }
}

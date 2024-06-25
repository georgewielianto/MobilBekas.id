<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sparepart;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sparepart::create([
            'name' => 'Busi Mobil',
            'image' => 'busi.jpeg',
            'price' => 117000,
            'description' => "Busi Mobil BRISK Premium Iridium P32 GRATIS MERCHANDISE setiap pembelian Busi Motor atau Mobil hanya di BRISK OFFICIAL STORE Dimensi: Thread M12x1.25, panjang ulir 26,5mm, kunci busi 14mm Referensi Busi : LZKAR6C , LZKAR7A, REA12MC4, SC20HR11 i️ Busi Brisk Premium + Iridium merupakan salah satu varian unggulan dari Brisk yang memiliki DAYA TAHAN BUSI TERTINGGI.",
        ]);

        Sparepart::create([
            'name' => 'AKI MOBIL GS ASTRA N50 (50AH) PREMIUM BASAH',
            'image' => 'akki mobil.jpeg',
            'price' => 788000000,
            'description' => "GS PREMIUM N50/48D26R Kapasitas : 50 Ah (Ampere Hour) Tegangan : 12 V (Volt) DIMENSI: 260X173X204 MM POSISI KEPALA AKI: (+) DI KANAN (KEPALA BESAR) (-) DI KIRI (KEPALA BESAR) cocok untuk mobil: Nissan Terrano, SERENA Toyota Kijang (1997 - 2003) PROTON GEN2 (A/T)",
        ]);

        Sparepart::create([
            'name' => 'Aki mobil INCOE MF NS60 untuk mobil Avanza, Rush, Xenia, Terios, dll',
            'image' => 'aki mobil avanza.jpeg',
            'price' => 910000000,
            'description' => "Aki bebas perawatan yang sudah memiliki sertifikasi SNI (Standar Nasional Indonesia) dan sudah lolos standar JIS (Japan Industrial Standard) cocok untuk kendaraan anda Keunggulan INCOE Maintenance Free: - Tidak memerlukan Pemeliharan - Tahan lama - Energi Tinggi - Siap Pakai - Bebas Korosi Kapasitas : 45 Ah (Ampere Hour) Tegangan : 12 V (Volt) Length : 236 mm Width : 127 mm Height : 201 mm Total Height (with Terminal) : 225 mm Aplikasi mobil untuk: TOYOTA Avanza (E/G/S) (2003-2009) Avanza (E/G/S) (2010-2014) Avanza Veloz (2011-2014) Hilux (PU, DC) Rush (G/S) (2006 - 2018) Rush (G/S) (2011 - 2018) Starlet Series (1996 - 1999) DAIHATSU Feroza Neo Zebra Taruna Terios (TS/TX) (2006 - 2009) Terios (TS/TX) (2010 - 2018) Xenia (Mi/Li/Xi) (2003-2009) Xenia (Mi/Li/Xi) (2010-2014) SUZUKI APV (GE/GL/GX/SGX/Luxury) Escudo Esteem Futura Katana Sidekick Swift (ST/GT) SX-4 Cross Over Vitara (1992 - 1995) L-300 Series Bensin (1981 - 2004) MITSUBISHI Maven T-120SS OLD (1972 - 1980) MAZDA MR-90 MAZDA ",
        ]);
    }
}

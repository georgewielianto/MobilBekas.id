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
            'price' => 788000,
            'description' => "GS PREMIUM N50/48D26R Kapasitas : 50 Ah (Ampere Hour) Tegangan : 12 V (Volt) DIMENSI: 260X173X204 MM POSISI KEPALA AKI: (+) DI KANAN (KEPALA BESAR) (-) DI KIRI (KEPALA BESAR) cocok untuk mobil: Nissan Terrano, SERENA Toyota Kijang (1997 - 2003) PROTON GEN2 (A/T)",
        ]);

        Sparepart::create([
            'name' => 'Aki mobil INCOE MF NS60 untuk mobil Avanza, Rush, Xenia, Terios, dll',
            'image' => 'aki mobil avanza.jpeg',
            'price' => 910000,
            'description' => "Aki bebas perawatan yang sudah memiliki sertifikasi SNI (Standar Nasional Indonesia) dan sudah lolos standar JIS (Japan Industrial Standard) cocok untuk kendaraan anda Keunggulan INCOE Maintenance Free: - Tidak memerlukan Pemeliharan - Tahan lama - Energi Tinggi - Siap Pakai - Bebas Korosi Kapasitas : 45 Ah (Ampere Hour) Tegangan : 12 V (Volt)  ",
        ]);
    }
}

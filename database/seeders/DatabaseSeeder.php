<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('senarai_elemen2027')->truncate();

        DB::table('senarai_elemen2027')->insert([
            ['id' => 1, 'nama' => 'Pembersihan & Pengindahan'],
            ['id' => 2, 'nama' => 'Kemudahan Awam & Taman'],
            ['id' => 3, 'nama' => 'Kemudahan Infrastruktur'],
            ['id' => 4, 'nama' => 'Bangunan & Hartanah'],
            ['id' => 5, 'nama' => 'Bandar Rendah Karbon'],
            ['id' => 6, 'nama' => 'Bandar Pintar'],
        ]);

        DB::table('senarai_zon2027')->truncate();

        DB::table('senarai_zon2027')->insert([
            ['id' => 1, 'zon' => 'Hulu Kinta', 'details' => 'KHANTAN / KUANG / KAMPONG CHIK ZAINAL / KAMPUNG ULU CHEMOR / TANAH HITAM / CHANGKAT KINDING / HOSPITAL BAHAGIA / BANDAR BARU PUTRA'],
            ['id' => 2, 'zon' => 'Tambun', 'details' => 'TANJONG RAMBUTAN UTARA / TANJONG RAMBUTAN BARAT / KAMPUNG TERSUSUN BATU 8 / PAKATAN JAYA / TAMAN PERPADUAN / KAMPUNG TERSUSUN BATU 5 / JALAN TAMBUN / TAMBUN / BANDAR SUNWAY / KAWASAN POLIS HUTAN / TANJONG RAMBUTAN'],
            ['id' => 3, 'zon' => 'Chemor', 'details' => 'KAMPONG ULU CHEPOR / KUALA KUANG / CHEMOR INDAH / PEKAN CHEMOR'],
            ['id' => 4, 'zon' => 'Manjoi', 'details' => 'KAMPONG SUNGAI KATI / KAMPONG DATUK AHMAD SAID TAMBAHAN 2 SELATAN / TUN TERANG / KAMPUNG SUNGAI TAPAH / TAMAN KELEDANG JAYA / KAMPONG TENGKU HUSSEIN / KAMPONG SEBERANG MANJOI / GERMUDA'],
            ['id' => 5, 'zon' => 'Meru', 'details' => 'MERU / MERU RAYA / TAMAN JATI / KELABANG/ KAMPONG CHEPOR DALAM'],
            ['id' => 6, 'zon' => 'Buntong', 'details' => 'KAMPONG BARU BUNTONG / JALAN KLIAN INTAN / JALAN SILIBIN / JALAN TUN ABDUL RAZAK / TAMAN LIM'],
            ['id' => 7, 'zon' => 'Falim', 'details' => 'KAMPONG KACANG PUTEH / DESA RISHAH / FALIM / JALAN SUNGAI PARI'],

            ['id' => 8, 'zon' => 'Fair Park', 'details' => 'STAR PARK / FAIR PARK / WALLER COURT / JALAN DATUK ONN JAAFAR / JALAN BIJIH TIMAH / JALAN CM. YUSOF / JALAN RAJA EKRAM / GREENTOWN'],
            ['id' => 9, 'zon' => 'Kepayang', 'details' => 'KAMPONG PISANG / KEPAYANG MESJID / GUNONG LANG / GURAP / TAMAN CHE WAN'],
            ['id' => 10, 'zon' => 'Tawas', 'details' => 'KAMPONG TAWAS / KAMPUNG TAWAS UTARA / TASEK / TASEK DERMAWAN'],
            ['id' => 11, 'zon' => 'Bercham', 'details' => 'BERCHAM SELATAN / DERMAWAN UTARA / KAMPONG BERCHAM / BERCHAM TIMOR'],
            ['id' => 12, 'zon' => 'Canning', 'details' => 'CANNING GARDEN BARAT / CANNING GARDEN TIMOR / TAMAN IPOH BARAT / TAMAN IPOH / SIMEE BARAT / SIMEE TIMOR / TAMAN WAH KEONG/ TAMAN IPOH TIMOR'],
            ['id' => 13, 'zon' => 'Taman Cempaka', 'details' => 'LUMBA KUDA / TAMAN CEMPAKA / DESA CEMPAKA / TAMAN IPOH SELATAN'],
            ['id' => 14, 'zon' => 'Pasir Panji', 'details' => 'PINJI LANE SELATAN / PINJI LANE UTARA / PASIR PINJI UTARA / PASIR PINJI SELATAN / KAMPAR ROAD / HOUSING TRUST'],
            ['id' => 15, 'zon' => 'Pasir Puteh', 'details' => 'TAMAN PENGKALAN JAYA / PASIR PUTEH SELATAN / PASIR PUTEH BARU / PASIR PUTEH UTARA / JALAN BENDAHARA'],

            ['id' => 16, 'zon' => 'Tebing Tinggi', 'details' => 'KAMPONG SERI KINTA / KUALA PARI HILIR / TEBING TINGGI / SUNGAI KINTA / KAMPONG PALOH / JALAN TUN PERAK / JALAN SULTAN YUSOF / JALAN DATO MAHARAJA LELA / TEBING SUNGAI KINTA'],
            ['id' => 17, 'zon' => 'Pengkalan', 'details' => 'PENGKALAN BARAT / PENGKALAN GATE / PENGKALAN PEGOH'],
            ['id' => 18, 'zon' => 'Silibin', 'details' => 'JELAPANG TENGAH / BUKIT KLEDANG / TAMAN PERTAMA / TAMAN RISHAH'],
            ['id' => 19, 'zon' => 'Jelapang', 'details' => 'SILIBIN / JELAPANG / JELAPANG SELATAN / JELAPANG BARAT / JELAPANG UTARA / JELAPANG TIMOR'],
            ['id' => 20, 'zon' => 'Menglembu', 'details' => 'LAHAT / BUKIT MERAH SELATAN / BUKIT MERAH BARAT DAYA / BUKIT MERAH TENGAH / BUKIT MERAH BARAT / BUKIT MERAH TIMOR / MENGLEMBU SELATAN / MENGLEMBU BARAT / MENGLEMBU LAMA / BANDAR BARU MENGLEMBU / AWANA'],
            ['id' => 21, 'zon' => 'Sungai Rapat', 'details' => 'SUNGAI RAPAT / RAPAT JAYA / DESA PAKATAN'],
            ['id' => 22, 'zon' => 'Rapat Setia', 'details' => 'RAPAT SETIA BARU / RAPAT SETIA / GUNUNG RAPAT SELATAN / GUNUNG RAPAT UTARA'],
            ['id' => 23, 'zon' => 'Ampang', 'details' => 'SUNGAI ROKAM / TAMAN IPOH JAYA / PEKAN RAZAKI / KAMPONG SERI AMPANG / AMPANG BAHARU / TAMAN AMPANG'],
            ['id' => 24, 'zon' => 'Simpang Pulai', 'details' => 'BOTANI / TAMAN TAUFIK / TAMAN BERSATU / SIMPANG PULAI / KAMPONG SENGAT'],
        ]);
    }
}

// database/seeders/PagerCounterSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagerCounterSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan hanya ada satu record dengan ID 1 dan nilai awal 0
        DB::table('pagercounter')->insertOrIgnore([
            'id' => 1,
            'jumlah' => 0,
        ]);
    }
}

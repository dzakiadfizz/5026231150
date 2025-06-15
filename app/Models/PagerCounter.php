app/Models/PagerCounter.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagerCounter extends Model
{
    use HasFactory;

    protected $table = 'pagercounter'; // Menunjuk ke nama tabel 'pagercounter'
    public $timestamps = false; // Karena tabel tidak punya created_at dan updated_at

    // Kita perlu mengizinkan 'id' dan 'jumlah' diisi
    protected $fillable = ['id', 'jumlah'];

    // Karena ID sudah diset spesifik (ID 1) dan bukan auto-increment murni oleh Laravel
    public $incrementing = false;
    protected $keyType = 'int';
}

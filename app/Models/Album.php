<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($album) {
            $album->slug = $album->generateSlug($album->title);
            $album->save();
        });
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);

        if (static::where("slug", $slug)->exists()) {
            $max = static::where("title", $title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const SOURCE_WEBSITE = 0;
    public const SOURCE_FACEBOOK = 1;
    public const SOURCE_LINKEDIN = 2;
    public const SOURCE_SNAPCHAT = 3;
    public const SOURCE_TIKTOK = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'dob',
        'gender',
        'address_line',
        'city',
        'state',
        'country',
        'postal_code',
        'is_enrolled',
        'password',
        'image',
        'role',
        'status',
        'source',
        'is_dashboard'
      
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function results()
    {
        return $this->hasMany(Result::class, 'user_id');
    }
    public function users(){
        return $this->hasMany(ModuleData::class,'first_name');
    }
    // User Model
public function Chats()
{
    return $this->hasMany(Chat::class);
}

    public static function getSourceLabel($source): string
    {
        return match ((int) $source) {
            self::SOURCE_FACEBOOK => 'Facebook',
            self::SOURCE_LINKEDIN => 'LinkedIn',
            self::SOURCE_SNAPCHAT => 'Snapchat',
            self::SOURCE_TIKTOK => 'TikTok',
            default => 'Web Site',
        };
    }

    public static function socialSourceOptions(): array
    {
        return [
            self::SOURCE_FACEBOOK => 'Facebook',
            self::SOURCE_LINKEDIN => 'LinkedIn',
            self::SOURCE_SNAPCHAT => 'Snapchat',
        ];
    }

}

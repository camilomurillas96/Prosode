<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sexo', 'fecha_nacimiento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * getZodiacSignAttribute
     *
     * @return void
     */
    public function getZodiacSignAttribute()
    {
        $zodiacSigns = ['Aquarius', 'Aries', 'Cancer', 'Capricorn', 'Gemini', 'Leo', 'Libra', 'Pisces', 'Sagittarius', 'Scorpio', 'Taurus', 'Virgo'];

        foreach($zodiacSigns as $zodiacSign){
            $zodiacClass = app('App\\Classs\\ZodiacSign\\'.$zodiacSign);
            if($zodiacClass->is($this->fecha_nacimiento))
                $signo = $zodiacClass->is($this->fecha_nacimiento);
        }

        return $signo;
    }

    /**
     * getSexoAttribute
     *
     * @return void
     */
    public function getSexoDescripcionAttribute()
    {
        return $this->sexo === 1 ? 'Masculino' : 'Femenino';
    }

    /**
     * getEdadAttribute
     *
     * @return void
     */
     public function getEdadAttribute()
     {
        return Carbon::parse($this->fecha_nacimiento)->age;
     }

     public function getMilenialAttribute()
     {
         return Carbon::parse($this->fecha_nacimiento)->format('Y') >= 2000 ? true : false;
     }

}

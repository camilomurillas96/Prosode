<?php

namespace App\Classs\ZodiacSign;

use Illuminate\Support\Carbon;

class ZodiacSign
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * dateStart
     *
     * @var Carbon
     */
    protected $dateStart = '';

    /**
     * dateEnd
     *
     * @var Carbon
     */
    protected $dateEnd = '';

    /**
     * is
     *
     * @param  mixed $date
     * @return void
     */
    public function is($date)
    {
        $dateCompare = Carbon::parse($date)->format('md');
        $dateStart = Carbon::parse($this->dateStart)->format('md');
        $dateEnd = Carbon::parse($this->dateEnd)->format('md');

        return $dateCompare >= $dateStart && $dateCompare <= $dateEnd ? $this->name: false;
    }
}

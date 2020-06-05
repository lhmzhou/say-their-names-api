<?php

namespace App\Models\Statics;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class DonationLinkTypes extends Model
{
    use Sushi;
    use Filterable;

    const VICTIMS = 1;
    const PROTESTERS = 2;
    const MOVEMENT = 3;

    protected $rows = [
        [
            'id' => self::VICTIMS,
            'type' => 'Victims',
        ],
        [
            'id' => self::PROTESTERS,
            'type' => 'Protesters',
        ],
        [
            'id' => self::MOVEMENT,
            'type' => 'Movement',
        ],
    ];

    public static function fromName($name)
    {
        $linkType = null;

        switch (strtoupper($name)) {
            case "VICTIMS":
                $linkType = DonationLinkTypes::VICTIMS;
                break;
            case "PROTESTERS":
                $linkType = DonationLinkTypes::PROTESTERS;
                break;
            case "MOVEMENT":
                $linkType = DonationLinkTypes::MOVEMENT;
                break;
            default:
                $linkType = "";
        }

        return $linkType;
    }
}
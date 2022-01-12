<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Task extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [
        'photos',
        'user_id',
        'name',
        'user_email',
        'user_name',
        "category_id",
        "address",
        "start_date",
        'date_type',
        'budget',
        'description',
        'phone',
        'need_movers',
        'show_only_to_performers',
        'car_model',
        'car_service',
        'pobeg',
        'no_texpassport',
        'delivery_weight',
        'delivery_height',
        'delivery_width',
        'delivery_length',
        'delivery_budget',
        'delivery_car',
        'service_delivery',
        'buy_delivery_weight',
        'buy_delivery_height',
        'buy_delivery_width',
        'buy_delivery_length',
        'construction_service',
        'services',
        'etaj_po',
        'lift_po',
        'etaj_za',
        'lift_za',
        'PeopleCount',
        'weight',
        'length',
        'width',
        'height',
        'glassSht',
        'service1',
        'where',
        'how_many',
        'smm_service',
        'computer_service',
        'design_service',
        'it_service',
        'photo_service',
        'remont_ustanovka_service',
        'remont_tex',
        'krosata_service',
        'bugalter_service',
        'learning_service',
        'age',
        'time',
        'training',
        'coordinates'
];
    protected $translatable = [
        'name',
        'address',
        'descrtions',
        'description_private',
    ];
}

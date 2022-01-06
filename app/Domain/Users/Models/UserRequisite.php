<?php
/**
 * Created by PhpStorm.
 * User: irock
 * Date: 15.04.2019
 * Time: 14:05
 */

namespace App\Domain\Users\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Users\Models\UserRequisite
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $company_name
 * @property string|null $company_city
 * @property string|null $company_address
 * @property string|null $post_index
 * @property string|null $bank
 * @property string|null $bank_account
 * @property string|null $oked
 * @property string|null $mfo
 * @property string|null $inn
 * @property string|null $okonh
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereBankAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereCompanyCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereMfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereOked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereOkonh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite wherePostIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\UserRequisite whereUserId($value)
 * @mixin \Eloquent
 */
class UserRequisite extends Model
{
    protected $guarded = ['id'];
}

<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserGroup.
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property int $user_id
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $description
 * @property string|null $image_path
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserGroup whereZip($value)
 */
class UserGroup extends Model
{
    use Searchable;
}

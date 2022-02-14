<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

/**
 * App\Models\KycType
 *
 * @property int $id
 * @property string $name Nombre tipo de documento que se puede cargar en el kyc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|KycType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KycType newQuery()
 * @method static \Illuminate\Database\Query\Builder|KycType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|KycType query()
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|KycType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|KycType withoutTrashed()
 * @mixin \Eloquent
 */
class KycType extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'name'
    ];

    protected static $logAttributes = [
        'name'
    ];

    public function hasDocument()
    {
        $document = KycDocument::where('users_id', Auth::id())
            ->where('kyc_types_id', $this->id)
            ->orderBy('created_at','desc')
            ->first();
        if ($document) {
            return $document;
        }
        return [];
    }
}

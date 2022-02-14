<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @mixin \Eloquent
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KycDocument
 *
 * @property int $id
 * @property int $users_id Id del usuario que es dueño del documento
 * @property int $kyc_types_id Tipo de documento que sube el usuario
 * @property int|null $approved_id Id del usuario administrador que aprueba o rechaza el documento
 * @property string|null $comment Comentarios asociados al documento
 * @property string $file Nombre del documento dentro del sistema
 * @property string $status Estado de la subida del documento 0=esperando, 1=aprobacion, 2=cancelado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereApprovedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereKycTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycDocument whereUsersId($value)
 * @mixin \Eloquent
 * @property-read \App\User|null $approved
 * @property-read mixed $status_name
 * @property-read \App\Models\KycType|null $kyc_type
 * @property-read \App\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|KycDocument onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|KycDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|KycDocument withoutTrashed()
 */
	class KycDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KycType
 *
 * @property int $id
 * @property string $name Nombre tipo de documento que se puede cargar en el kyc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|KycType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KycType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KycType query()
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KycType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|KycType onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|KycType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|KycType withoutTrashed()
 */
	class KycType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Menu
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name texto que se muestra
 * @property string|null $url Dirección al que debe apuntar el link
 * @property string|null $route Ruta a la que debe apuntar el link
 * @property string|null $icon Clase del fontawesome que se muestra junto al link
 * @property string|null $class Clase css que se debe aplicar al campo
 * @property int $roles_id Id del role que puede ver la opcion
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRolesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUrl($value)
 * @property string|null $menus_id Menu padre
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Query\Builder|Menu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenusId($value)
 * @method static \Illuminate\Database\Query\Builder|Menu withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Menu withoutTrashed()
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $description Descripcion del paquete
 * @property int $commission Comision por clicks realizados
 * @property int $commission_referred Comision por referidos a la plataforma
 * @property string|null $image Imagen asociada al paquete
 * @property int $expiration_days Dias por el cual se encuentra habilitado el paquete
 * @property int $clicks Cantidad de cliks habilitados
 * @property int $price Precio
 * @property string|null $pair_price
 * @property int $created_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereClicks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCommissionReferred($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExpirationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePairPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $created_user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedUser($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\System
 *
 * @method static \Illuminate\Database\Eloquent\Builder|System newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|System newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|System query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|System onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|System withTrashed()
 * @method static \Illuminate\Database\Query\Builder|System withoutTrashed()
 */
	class System extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TaskConfig
 *
 * @property int $id
 * @property string $periodicity Indicador de fecha con la que se va a repetir la tarea 0=dia, 1=semana, 2=mes
 * @property string $date Fecha de configuración con la cual se va a repetir la tarea
 * @property int $created_users_id Id del usuario que crea la configuración
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereCreatedUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig wherePeriodicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property-read mixed $periodicity_name
 * @method static \Illuminate\Database\Query\Builder|TaskConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereName($value)
 * @method static \Illuminate\Database\Query\Builder|TaskConfig withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaskConfig withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property int|null $value Valor que corresponde a la misma peridicidad
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereValue($value)
 */
	class TaskConfig extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TaskDetail
 *
 * @property-read \App\Models\TaskConfig|null $task_config
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $task_config_id Id de la configuración asignada a la tarea
 * @property string $description Descripcion de la tarea que se crea
 * @property string $link Url que pertenece de la tarea creada
 * @property int $created_users_id Id del usuario que crea la tarea
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereCreatedUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereTaskConfigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TaskDetail onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaskDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaskDetail withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property int $created_user Id del usuario que crea la tarea
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereCreatedUser($value)
 */
	class TaskDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserBalance
 *
 * @property int $id
 * @property int $users_id Id del usuario al que se le cargo el registro
 * @property float $amount Monto abonado
 * @property string $type Tipo de registro
 * @property string $status Indica si es un pago valido
 * @property int|null $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereUsersId($value)
 * @mixin \Eloquent
 */
	class UserBalance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserProduct
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $users_id Id del usuario
 * @property int $products_id Id del producto
 * @property int $created_user
 * @property string $expiration_date Fecha en el que vence el producto para el usuario
 * @property int $price Monto por el que pago el usuario al momento de la compra
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Query\Builder|UserProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereProductsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProduct whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|UserProduct withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserProduct withoutTrashed()
 */
	class UserProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserTask
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|UserTask onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserTask withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserTask withoutTrashed()
 * @property int $id
 * @property int $task_details_id Id de la tarea realizada
 * @property int $users_id Id del usuario
 * @property int $duration Tiempo que dura el usuario en la tarea asignada
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereTaskDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereUsersId($value)
 * @property-read \App\Models\TaskDetail|null $task
 */
	class UserTask extends \Eloquent {}
}

namespace App{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $users_roles_id Id del role asociado al usuario
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $updated_user Id del usuario que actualizo el registro
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsersRolesId($value)
 * @mixin \Eloquent
 * @property int $roles_id Id del role asociado al usuario
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRolesId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @property-read \App\Models\Role|null $role
 * @property int|null $sponsor_id Id del usuario que lo refirio
 * @property int|null $countries_id Id del pais
 * @property string|null $token_login
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenLogin($value)
 * @property string|null $lastname Apellido de la persona
 * @property string|null $username Usuario
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @property-read mixed $full_name
 */
	class User extends \Eloquent {}
}


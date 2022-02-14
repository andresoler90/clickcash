<?php

namespace App\Http\Controllers\Libs;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\UserBalance;
use App\Models\UserMembership;
use App\User;
use Illuminate\Http\Request;

class Multilevel extends Controller
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Obtiene el todos los referidos directos e indirectos en un array
     * @param int $deep
     * @return mixed
     */
    public function under($deep = 1)
    {
        for ($i = 1; $i <= $deep; $i++) {
            if ($i == 1) {
                $nodes[$i] = User::where('sponsor_id', $this->user->id)->get()->pluck('id');
            } else {
                $nodes[$i] = User::whereIn('sponsor_id', $nodes[$i - 1])->get()->pluck('id');
            }
        }
        return $nodes;
    }

    public function upper($deep = 1)
    {
        for ($i = 1; $i <= $deep; $i++) {
            if ($i == 1) {
                $nodes[$i] = User::find($this->user->sponsor_id)->first();
                if (!$nodes[$i]) {
                    break;
                }
            } else {
                $sponsor_id = $nodes[$i - 1]->sponsor_id;
                $nodes[$i] = User::where('id', $sponsor_id)->first();
                if (!$nodes[$i]) {
                    break;
                }
            }
        }
        return $nodes;
    }

    public function toJson($deep = 10)
    {
        $json = [];
        $arr = [
            "id"     => $this->user->id,
            "Nombre" => $this->user->name,
            "title"  => "",
            "email"  => $this->user->email,
            "status" => 1,
            "img"    => asset("storage/profiles/users_id_1_842398.jpg"),
        ];
        $json[] = $arr;
        for ($i = 1; $i <= $deep; $i++) {
            $users = "";
            $arr = "";
            if ($i == 1) {
                $users = User::where('sponsor_id', $this->user->id)->where('id', '!=', $this->user->id)->get();
                $nodes[$i] = $users->pluck('id');
            } else {
                $users = User::whereIn('sponsor_id', $nodes[$i - 1])->where('id', '!=', $this->user->id)->get();
                $nodes[$i] = $users->pluck('id');
            }
            foreach ($users as $user) {
                $UserMembership = UserMembership::where("users_id", $user->id)->first();
                if ($user->contactInformation) {
                    $img = $user->contactInformation->url_image ? asset($user->contactInformation->url_image) : asset("assets/images/user/11.png");
                } else {
                    $img = asset("assets/images/user/11.png");
                }

                $arr = [
                    "id"        => $user->id,
                    "pid"       => $user->sponsor_id,
                    "Nombre"    => $user->name,
                    "Membresia" => $UserMembership ? $UserMembership->membership->name : "Pendiente",
                    "Email"     => $user->email,
                    "img"       => $img,
                ];
                $json[] = $arr;
            }

        }
        return json_encode($json, JSON_UNESCAPED_SLASHES);
    }

    /**
     * Aplica el bonus
     * @param $amount integer Monto del cual se aplicara el bono
     */
    public function startBonus($amount)
    {
        $users = $this->upper(3);
        foreach ($users as $key => $user) {
            switch ($key) {
                case 1:
                    $commision = 10;
                    break;
                case 2:
                    $commision = 7.5;
                    break;
                case 3:
                    $commision = 5;
                    break;
            }
            $balance = new UserBalance();
            $balance->users_id = $user->id;
            $balance->amount = ($amount * $commision) / 100;
            $balance->type = "start_bonus";
            $balance->created_user = $this->user->id;
            $balance->save();
        }
    }

    public function cuadraBonus()
    {
        //Consultamos a la persona que obtendra el bono
        $sponsor = User::find($this->user->sponsor_id);
        $multilevel = new Multilevel($sponsor);
        //Consultamos todos los referidos de esta persona
        $referrals = $multilevel->under()[1];
        //Verificamos todos los referidos para obtener solo los que cuenten con una membresia
        $memberships = User::join("user_memberships", "user_memberships.users_id", "users.id")
            ->whereIn("users.id", $referrals)
            ->where("status", "A")
            ->orderByDesc("user_memberships.created_at")
            ->get();
        if (count($memberships)) {
            //para verificar si es el cuarto referido, verificamos si la cantidad de membresias es dividendo de 4
            $flag = count($memberships) % 4;
            if ($flag == 0) {
                $total = 0;
                //Obtenemos los ultimos 4 referidos para calcular el monto del bonus
                foreach ($memberships->take(4) as $item) {
                    $total += $item->price * 0.10;
                }
                $balance = new UserBalance();
                $balance->users_id = $sponsor->id;
                $balance->amount = $total;
                $balance->type = "cuadra_bonus";
                $balance->created_user = $this->user->id;
                $balance->save();
            }
        }
    }

    public function rank()
    {

    }
}

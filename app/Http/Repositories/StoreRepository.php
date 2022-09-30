<?php
namespace App\Http\Repositories;
use g4t\Pattern\Repositories\BaseRepository;
use App\Models\Store;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Builder;
class StoreRepository extends BaseRepository {

    public function storesInInterest(){

        $user = auth('api')->user();
        $data = Store::
        WhereHas('User.CourseCategory', function (Builder $query) use ($user) {
            $query->whereIn('course_topic_id',$user->interests()->pluck('course_topic_id'));
        })
        ->where('is_deleted', '=', 0)
        ->with('User')
        ->get();

        return [
            'total' => $data->count(),
            'storesItems' => $data->count() > 0 ? $data->random() : $data
        ];

    }
}
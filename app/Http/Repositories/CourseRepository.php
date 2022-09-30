<?php
namespace App\Http\Repositories;
use g4t\Pattern\Repositories\BaseRepository;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Builder;

class CourseRepository extends BaseRepository {

    public function coursesInInterest(){
        
        $user = auth('api')->user();
        $data = Course::
        WhereHas('CourseCategory', function (Builder $query) use ($user) {
            $query->whereIn('course_topic_id',$user->interests()->pluck('course_topic_id'));
        })
        ->where('is_deleted', '=', 0)
        ->get()
        ->random();

        return [
            'total' => $data->count(),
            'courseItems' => $data->count() > 0 ? $data->random() : $data
        ];

    }
}
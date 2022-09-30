<?php
namespace App\Http\Repositories;
use App\Models\User;
use g4t\Pattern\Repositories\BaseRepository;

class UserRepository extends BaseRepository {

    public function interest( $ids)
    {
        return 'ss';

        $user = auth('api')->user();
        $interests = $user->interests()->sync($ids);
        return [
            'interests' => 'Done'
        ];

    }

    public function interestIndex()
    {
        $user = auth('api')->user();
        return [
            'total'=>$user->interests->count(),
            'interests' => $user->interests
        ];

    }

    public function follow($follow){
        $user = auth('api')->user();
        $user->following()->attach($follow);

        return [
            'follow' => 'Done'
        ];
    }
    public function unfollow($follow){
        $user = auth('api')->user();
        $user->following()->detach($follow);

        return [
            'follow' => 'Done'
        ];
    }
    public function followers($user){
        $user = User::findOrFail($user);
        $followers=$user->followers()->get();
        if(auth('api')->user()){
            $followers['follow'] = 'any';
        }
        return [
            'total'=>$followers->count(),
            'followers' => $followers
        ];

    }
    public function following($user){
        $user = User::findOrFail($user);
        $following=$user->following()->get();
        return [
            'total'=>$following->count(),
            'following' => $following
        ];
    }

}
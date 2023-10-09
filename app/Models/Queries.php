<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Queries extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'query',
        'is_deleted'
    ];

    public static function showPost($id)
    {
        // $rootQueries = Queries::get();
        // $allComments = Comments::get();

        // foreach($rootQueries as $rootQuery){
        //     $rootQuery->children = $allComments->where('query_id',$rootQuery->query_id)->values();
        // }
        // return $rootQueries;
        // $combined = compact('rootQueries', 'allComments');

        $queries = DB::table('queries')
            ->join('users', 'users.id', '=', 'queries.users_id')
            ->join('comments', 'comments.queries_id', '=', 'queries.id')
            ->select(
                'users.name',
                'users.image',
                'queries.id as qry_id',
                'queries.query',
                'comments.id as cm_id',
                'comments.comment'
            )
            ->where('queries.id', '=', $id)
            ->get(100);
        return $queries;
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}

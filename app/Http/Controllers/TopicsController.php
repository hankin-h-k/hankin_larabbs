<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
class TopicsController extends Controller
{

	public function index(Request $request, Topic $topic, User $user)
	{
		//话题列表
		$topics = $topic->withOrder($request->order)->paginate(20);
		//活跃用户
		$active_users = $user->getActiveUsers();
		return view('topics.index');
	}
}

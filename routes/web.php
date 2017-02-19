<?php

Route::get('/', function () 
{
	if (session()->has('user')) {
		$user = \Cache::get(session()->get('user'));

		$client = new GuzzleHttp\Client();

		$repos = $client->request('GET', $user->user['repos_url']);
		$repo = collect(
			json_decode($repos->getBody()->getContents())
		)->random();

		$all_commits = $client->request('GET', str_replace('{/sha}', '', $repo->commits_url));
		$commits = collect(
			json_decode($all_commits->getBody()->getContents())
		)->take(3);

		return view('index', compact('repo', 'commits'));
	}
    return view('index');
});

Route::get('auth/github', 'Auth\LoginController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\LoginController@handleProviderCallback');
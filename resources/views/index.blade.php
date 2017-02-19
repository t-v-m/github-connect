<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Github Connect</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h3 class="text-muted">Github Connect</h3>
            </div>
            <div class="jumbotron">
            @if(isset($repo))
                <h1>{{ $repo->name }}</h1>
                <h2>{{ $repo->description }}</h2>

                <a href="{{ $repo->html_url }}" target="_blank"><span class="badge">{{ $repo->html_url }}</span></a>

                <h3>Last 3 Commits</h3>

                <div class="list-group">
                @foreach($commits as $commit)
                    <a href="{{ $commit->html_url }}" class="list-group-item" target="_blank">{{ $commit->commit->message }}</a>
                @endforeach
                </div>
            @else
                <p><a class="btn btn-lg btn-success" href="/auth/github" role="button">Sign in with Github</a></p>
            @endif
            </div>
        </div>
    </body>
</html>

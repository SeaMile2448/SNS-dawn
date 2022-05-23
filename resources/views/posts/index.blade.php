@extends('layouts.login')

@section('content')
<form action="/post" method="post">
    @csrf
    <input type="text" name="tweet" required placeholder="何をつぶやこうかな・・・">
    <input type="image" src="{{asset('/images/post.png')}}">
</form>

<table>
    @foreach($tweets as $tweet)
    <tr>
        <td><img src="{{asset('/images/'.$tweet->images)}}" alt=""></td>
        <td>{{ $tweet->username }}</td>
        <td>{{$tweet->posts}}</td>
        <td>{{ $tweet->created_at }}</td>
        <td><a class="js-modal-open" data-target="modalUpdate{{$tweet->id}}" href=""><img src="images/edit.png"></a></td>
         <td><a href="/post/{{$tweet->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash_h.png"></a></td>
    </tr>

    <div id="modalUpdate{{$tweet->id}}" class="modal">
        <form action="/post/{$tweet->id}/update" method="post">
            @csrf
            <input type="text" value={{$tweet->posts ?? old('posts')}}>
            <input type="image" src="{{asset('/images/edit.png')}}">
        </form>
    </div>
    @endforeach
</table>


@endsection

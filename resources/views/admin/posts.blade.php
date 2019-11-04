@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Posts
                        <a href="/admin/posts/create" class="btn btn-default pull-right">Create New</a>
                    </h2>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->author}}</td>
                                <td></td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                    {{$tag->name}}
                                    @endforeach
                                </td>
                                <td>No</td>
                                <td>
                                    <a href="/posts/1/publish" data-method="PUT"
                                        data-token="32Mxrb2s2QPyv3C1h4iYcbfZBT7PmU7Tfm9koxkk"
                                        data-confirm="Are you sure?" class="btn btn-xs btn-warning">Publish</a>
                                    <a href="/admin/posts/{{$post->id}}" class="btn btn-xs btn-success">Show</a>
                                    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-xs btn-info">Edit</a>
                                    <form action="/admin/posts/{{$post->id}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$posts->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
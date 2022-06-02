@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Konten</th>
            </tr>
        </thead>
        <body>
            <p><a href="{{route('article.create')}}">Tambah Artikel</a></p>
                @forelse ($articles as $index=> $item)
                    <tr>
                        <td scope="row">{{$index+1}}</td>
                        <td><a href="{{route('article.show', $item->id)}}"></a>{{$item->title}}</td>
                        <td>{{Str::limit($item->content, 191)}}</td>
                        <td><a href="{{route('article.edit', $item->id)}}">Ubah Data</a> | 
                            <form action="{{route('article.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link p-0 m-0 d-inline align-baseline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                 @empty
                    <p>Belum ada data artikel</p>    
                @endforelse
        </body>
    </table>
    {{$articles->render()}}
@endsection
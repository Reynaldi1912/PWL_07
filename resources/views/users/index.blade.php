@extends('users.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left mt-2">
 <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
 </div>
 <div>
 <div class="float-right my-2">
 <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
 </div>
 	<div>
        <div class="mx-auto pull-right">
            <div class="float-left">
                <form action="{{ route('mahasiswa.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Mahasiswa">
                                <span class="fas fa-search">Search</span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search Nama Mahasiswa" id="term">
                        <a href="{{ route('mahasiswa.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt">Refresh</span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>

 </div>
 </div>
 
 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 @endif
 
 <table class="table table-bordered">
 <tr>
 <th>Nim</th>
 <th>Nama</th>
 <th>Kelas</th>
 <th>Jurusan</th>
 <th>Email</th>
 <th>No Handphone</th>
 <th>Tanggal Lahir</th>
 <th width="280px">Action</th>
 </tr>
 @foreach ($mahasiswa as $Mahasiswa)
 <tr>
 
 <td>{{ $Mahasiswa->nim }}</td>
 <td>{{ $Mahasiswa->nama }}</td>
 <td>{{ $Mahasiswa->kelas }}</td>
 <td>{{ $Mahasiswa->jurusan }}</td>
 <td>{{ $Mahasiswa->email}}</td>
 <td>{{ $Mahasiswa->no_handphone }}</td>
 <td>{{ $Mahasiswa->tanggal_lahir}}</td>

 <td>
 <form action="{{ route('mahasiswa.destroy',$Mahasiswa->nim) }}" method="POST">
 
 <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->nim) }}">Show</a>
 <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </table>
 {{ $mahasiswa->links() }}


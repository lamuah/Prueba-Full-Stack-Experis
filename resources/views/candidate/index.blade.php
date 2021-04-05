@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('Mensaje'))

    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje') }}
    </div>


    @endif
    <a href="{{ url('candidate/create') }}" class="btn btn-success">Add New Candidate</a>
    <br><br>

    <table class="table table-light table-hover">

        <thead class="thead-light">

            <tr>
                <!-- secoloca td*6 para que cree 6 <th> automaticamente -->
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Date of Interview</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @foreach($candidate as $candidates)
            <tr>
                <td>{{ $candidates->id }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$candidates->photo }}" class="img-thumbnail img-fluid" alt="" width="100">
                </td>

                <td>{{ $candidates->name }}</td>
                <td>{{ $candidates->surname }}</td>
                <td>{{ $candidates->email }}</td>
                <td>{{ $candidates->rating }}</td>
                <td>{{ $candidates->date }}</td>

                <td>

                    <a class="btn btn-warning" href="{{ url('/candidate/'.$candidates->id.'/edit') }}">
                        Edit
                    </a>
                    |

                    <form method="post" action="{{ url('/candidate/'.$candidates->id) }}" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?');">Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
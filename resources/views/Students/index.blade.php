<x-app-layout class="" >
   <div style="margin: 20px 100px;">
    <div class="row mb-1">
        <div class="col-lg-12 " style="display: flex">
            <div>
                <h2 style="font-size: 28px;"><strong>Student List</strong></h2>
            </div>
            <div class="pull-right" style="margin-left: auto ">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Add Student</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Created</th>
            <th>Updated</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->class }}</td>
            <td>{{ $student->created_at }}</td>
            <td>{{ $student->updated_at }}</td>
            <td>
                <form action="{{ route('students.destroy',$student) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('students.show',$student) }}">Show</a>
                    @if ($student->user->is(auth()->user()))
                        <a class="btn btn-primary" href="{{ route('students.edit',$student) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" :href="route('students.destroy', $student)" 
                            onclick="event.preventDefault(); this.closest('form').submit();">Delete</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $students->links() }}
   </div>
   
</x-app-layout>

    
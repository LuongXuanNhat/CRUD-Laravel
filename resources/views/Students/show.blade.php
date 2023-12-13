<x-app-layout>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('students.index') }}"> Back list</a>
    </div>
    <div style="display: flex; justify-content: center">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('build/assets/account.png') }}" class="card-img-top" style="height: 230px;object-fit: contain;object-position: top;" alt="...">
            <div class="card-body" style="text-align: center">
              <h5 class="card-title">{{ $student->name }}</h5>
              <p class="card-text">{{ $student->class }}</p>
              @if ($student->user->is(auth()->user()))
                <a class="btn btn-warning mt-1" href="{{ route('students.edit',$student) }}">Edit</a>
              @endif
            </div>
          </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('События') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <br>

  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
  <div class="pull-right">
                              <a class="btn btn-primary" href="{{ route('users.create') }}"> Добавить пользователя</a>
                          </div>
  <table class="table table-bordered">
      <tr>
          <th>No</th>
          <th>ФИО</th>
          <th>Должность</th>
          <th>Отдел</th>
          <th width="280px">Action</th>
      </tr>
      @foreach ($data as $user)
      <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->fio }}</td>
          <td>{{ $user->user_positions->position_name->name }}</td>
          <td>
          <?php
          $dep = [];
          foreach ($user->user_departments as $department) {
            array_push($dep,$department->department_name->name);
          }
          echo implode(',',$dep);
        ?>
          </td>
          <td><form action="{{ route('users.destroy',$user->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form></td>
          <td>

          </td>
      </tr>
      @endforeach
  </table>
  {!! $data->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>

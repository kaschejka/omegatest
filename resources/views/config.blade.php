<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Выдача доступа') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="form-group">
<?php $users = DB::table('users')->get();
?>
<table class="table">
<thead class="thead-dark">
  <tr>
    <th scope="col">E-mail</th>
    <th scope="col">Текущая роль</th>
    <th scope="col">Какую роль выдать</th>
    <th scope="col"></th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
@foreach ($users as $user)
<form action="/config/submit" method="post" enctype="multipart/form-data">
<tr>
@csrf
<td>{{ $user->email }} <input type="hidden" name="email" id="email" value = "{{$user->email}}" > </td>
<td>{{ $user->role }}</td>
<td> <select name="role" id="role" class='form-control'>
<option value="" selected disabled hidden>Выберите роль</option>
<option value=admin>Администратор</option>
<option value=user>Пользователь</option>
<option value=manager>Менеджер</option>
</select> </td>
<td><button type="submit" class="btn btn-success">Предоставить доступ</button> </td>
<td><button type="button" class="btn btn-success" id="{{$user->id}}" onclick="deluser(this)">Удалить</button> </td>
</tr>
</form>
<script>
function deluser(obj) {
var id = obj.id;
axios({
method: 'post',
url: 'api/delUser',
data: {
id: id,
}
})
document.location.reload();
return false;
}
</script>

@endforeach
</tbody>
</table>
</div>
            </div>
        </div>
    </div>
</x-app-layout>

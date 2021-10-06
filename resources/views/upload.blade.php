<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif
              <form action="/subupload" method="post" enctype="multipart/form-data">
                @csrf
              <label for="file">Выберите фото</label>
                <input type="file" class="form-control" name="file" id="file" accept=".jpg, .jpeg, .png">
                <div class="form-group">
                <button type="submit" id="submit" class="btn btn-success">Загрузить</button>
              </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>

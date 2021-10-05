<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('События') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">



                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>


                        @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="{{ route('users.store') }}" method="POST">
              @csrf


                      <div class="form-group">
                          <lable for="name">ФИО:</lable>
                          <input type="text" name="name" class="form-control" placeholder="Введите ФИО сотрудника" required>
                      </div>
<div class="form-group">
  <lable for="character">Выберите должность:</lable>
                  <?php $rpodp = DB::table('positions')->get();
                  echo "<input list='character' id='position' class='form-control' name='position' autocomplete='off' required>";
                  echo "<datalist id='character' name='position'>";
                  foreach ($rpodp as $rpodp) {
                  echo "<option id = '".$rpodp->id."' value='".$rpodp->name."'</option>";
                  }
                  echo "</datalist>";
                  ?>
</div>
<div class="form-group">
  <lable for="selectdepartment">Выберите Департаменты:</lable>
<select name='selectdepartment' id='selectdepartment' class='form-control'>
<option selected disabled>Выберите отделы</option>
<?php $rpodp = DB::table('departments')->get();

foreach ($rpodp as $dep) {
echo "<option value='d".$dep->id."'>".$dep->name."</option>";
}
echo "</select>";
?>

<?php
foreach ($rpodp as $dep) {

  echo "<div hidden id='vpd".$dep->id."'>";
                        echo "<div class='input-group mb-3'>";
                        echo "<div class='input-group-text'>";
                        echo "<input class='form-check-input' type='checkbox' name='department[]' id='d".$dep->id."' value='".$dep->id."'>";
                        echo "<label for='d".$dep->id."'>".$dep->name."</label>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                            }
?>

</div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

          </form>


            </div>
        </div>
    </div>
</x-app-layout>

<script>
document.getElementById('selectdepartment').addEventListener('change', function() {
var selectElemDep = document.getElementById('selectdepartment');

  var selindDep = selectElemDep.options.selectedIndex
     var valDep= selectElemDep.options[selindDep].value
     var pElemDep = document.getElementById(valDep)
document.getElementById('vp'+pElemDep.id).hidden = false;



})
</script>

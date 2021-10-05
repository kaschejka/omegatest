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

          <form action="{{ route('users.update',$data->id) }}" method="POST">
                         @csrf
                         @method('PUT')

                          <div class="row">
                             <div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="form-group">
                                     <label for="name">ФИО пользователя</label>
                                     <input type="text" id="name" name="name" value="{{$data->fio}}" class="form-control">
                                 </div>
                             </div>

                             <div class="form-group">
                               <lable for="character">Выберите должность:</lable>
                                               <?php $rpodp = DB::table('positions')->get();?>
                                              <select class='form-control' name='userpos'>

                                               @foreach ($rpodp as $rpodp)
                                                 @if ($rpodp == $data->user_positions->position_name->name)
                                                   <option  selected id ={{$rpodp->id}} value={{$rpodp->name}}>{{$rpodp->name}}</option>"
                                              @else
                                                  <option id ={{$rpodp->id}} value={{$rpodp->name}}>{{$rpodp->name}}</option>"
                                                 @endif
                                               @endforeach
                                              </select>

                             </div>

                             <div class="form-group">
                               <lable for="character">Выберите отдел:</lable>
                                               <?php $rpodp = DB::table('departments')->get();

                                              foreach ($rpodp as $depall) {
                                                $tf = false;
                                              foreach ($data->user_departments as $dep) {
                                                if ($depall->id == $dep->id) {
                                                  echo "<div class='input-group mb-3'>";
                                                 echo "<div class='input-group-text'>";
                                                  echo "<input class='form-check-input' type='checkbox' name='department[]' id='d".$dep->id."' value='".$dep->id."' checked>";
                                                  echo "<label for='d".$dep->id."'>".$dep->department_name->name."</label>";
                                                  echo "</div>";
                                                  echo "</div>";
                                                  $tf = true;
                                                }

                                              }
                                              if ($tf == false) {
                                                echo "<div class='input-group mb-3'>";
                                               echo "<div class='input-group-text'>";
                                                echo "<input class='form-check-input' type='checkbox' name='department[]' id='d".$depall->id."' value='".$depall->id."'>";
                                                echo "<label for='d".$depall->id."'>".$depall->name."</label>";
                                                echo "</div>";
                                                echo "</div>";
                                              }
                                                    }
                                             ?>
                             </div>

                             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                               <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
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

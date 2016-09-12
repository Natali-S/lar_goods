@extends('layouts.app')

@section('content')

 

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="/save/{{ $task->id }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

        <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Название товара</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
        </div>
      </div>
           <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Стоимость товара</label> 

        <div class="col-sm-6">
          <input type="text" name="price" id="task-price" class="form-control"value="{{ $task->price }}">
        </div>
      </div>
           <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Описание товара</label>

        <div class="col-sm-6">
            <textarea name="description" id="task-description" cols="30" rows="6" class="form-control">
   {{ $task->description }}
  </textarea>
         
        </div>
      </div>

           <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Категория товара</label>

        <div class="col-sm-3">
             <input type="radio" name="categories" value="high"> High<Br>
             <input type="radio" name="categories" value="middle"> Middle<Br>
             <input type="radio" name="categories" value="low"> Low<Br>
<!--            <p><select size="1" name="categ">
                    <option disabled >Выберите категорию</option>
                    <option >{{ $task->categories }}</option>
                    <option value="High">High</option>
                    <option value="Middle">Middle</option>
                    <option value="Low">Low</option>
                </select></p>-->
        </div>
      </div>     
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
         <button type="submit" class="btn btn-info" name="save">
            Сохранить 
          </button>
        </div>
      </div>
    </form>
  </div>


            
      
     


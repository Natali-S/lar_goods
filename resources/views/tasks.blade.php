@extends('layouts.app')

@section('content')

 

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="/task" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Введите название товара</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control">
        </div>
      </div>
           <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Введите стоимость товара</label>

        <div class="col-sm-6">
          <input type="text" name="price" id="task-price" class="form-control">
        </div>
      </div>
           <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Введите описание товара</label>

        <div class="col-sm-6">
            <textarea name="description" id="task-description" cols="40" rows="6" class="form-control"></textarea>
         
        </div>
      </div>
           <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Выберите категорию товара</label>

        <div class="col-sm-3">
            <input type="radio" name="categories" value="high"> High<Br>
            <input type="radio" name="categories" value="middle"> Middle<Br>
            <input type="radio" name="categories" value="low"> Low<Br>
          
        </div>
      </div>

      <!-- Кнопка добавления задачи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить товар
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- Текущие задачи -->
  @if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Товары
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Категория</th>
            
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($tasks as $task)
              <tr>
  <!-- Имя задачи -->
   <td class="table-text">
    <div>{{ $task->name }}</div>
  </td> 
  <td class="table-text">
    <div>{{ $task->price }}</div>
  </td>
  <td class="table-text">
    <div>{{ $task->description }}</div>
  </td>
  <td class="table-text">
    <div>{{ $task->categories }}</div>
  </td>

  <!-- Кнопка Удалить -->
  <td>
    <form action="/task/{{ $task->id }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button>Удалить задачу</button>
    </form>
  </td>
</tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection
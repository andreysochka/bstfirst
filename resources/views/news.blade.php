@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
<!--    <-- Форма новой задачи -->
    <form action="{{ url('news') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	 
	<div class="form-group">
	    <label for="news" class="col-sm-3 control-label">Новость</label>

	    <div class="col-sm-6">
		<input type="text" name="description" id="news" class="form-control">
	    </div>
	</div>

<!--	 Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default">
		    <i class="fa fa-plus"></i> Добавить новость
		</button>
	    </div>
	</div>
    </form>
</div>

@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
<!--        Cписок новостей-->
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

<!--	     Заголовок таблицы -->
	    <thead>
            <th>ID</th>    
            <th>News</th>
            <th>Create</th>
            <th>Update</th>
            <th colspan="2">action</th>
	    </thead>

<!--	     Тело таблицы -->
	    <tbody>
		@foreach ($news as $new)
		<tr>
<!--		     Имя новости -->
                    <td class="table-text">
			<div>{{ $new->id }}</div>
		    </td>
		    <td class="table-text">
			<div>{{ $new->description }}</div>
		    </td>
                    <td class="table-text">
			<div>{{ $new->created_at }}</div>
		    </td>
                    <td class="table-text">
			<div>{{ $new->updated_at }}</div>
		    </td>
		    <td>
			<form action="{{ url('news/'.$new->id) }}" method="post">
			    {{method_field('DELETE')}}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-default">
				<i class="fa fa-trash"></i>
			    </button>
			    <a href="{{ url('news/'.$new->id.'/edit') }}"  class="btn btn-default"><i class="fa fa-edit"></i></a>
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
@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ url('/news/'.$new->id.'/edit') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
        {{method_field('PUT')}}
	<!-- Имя задачи -->
	<div class="form-group">
            <label for="news" class="col-sm-3 control-label">Новость</label>
	    <div class="col-sm-6">
		<input type="text" name="description" id="news" class="form-control" value="{{$new->description}}">
	    </div>
	</div>

	<!-- Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default">
		    <i class="fa fa-save"></i> Изменить новость
		</button>
	    </div>
	</div>
    </form>
</div>

@endsection
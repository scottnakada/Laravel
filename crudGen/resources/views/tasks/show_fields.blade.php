<!-- Task Id Field -->
<div class="form-group">
    {!! Form::label('task_id', 'Task Id:') !!}
    <p>{!! $tasks->task_id !!}</p>
</div>

<!-- Task Field -->
<div class="form-group">
    {!! Form::label('task', 'Task:') !!}
    <p>{!! $tasks->task !!}</p>
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{!! $tasks->priority !!}</p>
</div>

<!-- Due Field -->
<div class="form-group">
    {!! Form::label('due', 'Due:') !!}
    <p>{!! $tasks->due !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tasks->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tasks->updated_at !!}</p>
</div>


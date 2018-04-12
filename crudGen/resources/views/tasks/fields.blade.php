<!-- Task Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task', 'Task:') !!}
    {!! Form::text('task', null, ['class' => 'form-control']) !!}
</div>

<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', 'Priority:') !!}
    {!! Form::number('priority', null, ['class' => 'form-control']) !!}
</div>

<!-- Due Field -->
<div class="form-group col-sm-6">
    {!! Form::label('due', 'Due:') !!}
    {!! Form::date('due', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>

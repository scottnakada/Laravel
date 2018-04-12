@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tasks
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tasks, ['route' => ['tasks.update', $tasks->task_id], 'method' => 'patch']) !!}

                        @include('tasks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
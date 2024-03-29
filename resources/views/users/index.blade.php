@section('title')
    المستخدمين
@endsection
@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>أدراة المستخدمين</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">اضافة مستخدم</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>#</th>
   <th>الاسم</th>
   <th>البريد الالكتروني</th>
   <th>نوع المستخدم</th>
   <th width="280px">العمليات</th>
 </tr>
 <?php $i=0; ?>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">عرض</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
        <a class="btn btn-success" href="{{ route('users.destroy',$user->id) }}"> حذف</a>
    </td>
  </tr>
 @endforeach
</table>
@endsection 
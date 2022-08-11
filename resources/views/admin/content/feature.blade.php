@extends('admin.newlayout.layout',['breadcom'=>['Venu','Features']])
@section('title')
    Venu Features
@endsection
@section('page')
    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#list" data-toggle="tab"> Course Features </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#newitem" data-toggle="tab">New Feature</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane active">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Feature</th>
                                <th class="text-center">Is Show</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center"> created At</th>
                                <th class="text-center">{{ trans('admin.th_controls') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td class="text-center">
                                        @if($list->is_show == 1)
                                            Yes
                                        @else
                                            No
                                        @endif   
                                    </td>
                                    <td class="text-center">
                                        @if($list->payment_status == 1)
                                            Paid
                                        @else
                                            Free
                                        @endif   
                                    </td>
                                    <td class="text-center">{{ $list->created_at }}</td>
                                    <td class="text-center">
                                        <a href="/admin/content/feature-edit/{{ $list->id }}" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/feature-delete/{{ $list->id }}" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/feature-store" class="form-horizontal form-bordered">
                            {{ csrf_field() }}
                
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Feature</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" required class="form-control" placeholder="Enter Feature Name">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control" required>
                                        <option value=""> Select an option</option>
                                        <option value="1"> Show </option>
                                        <option value="0"> Hide </option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Payment Status</label>
                                <div class="col-md-6">
                                    <select name="payment_status" class="form-control" required>
                                        <option value=""> Select an option</option>
                                        <option value="1"> Paid </option>
                                        <option value="0"> Free </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">{{ trans('admin.save_changes') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.newlayout.layout',['breadcom'=>['Courses','Facility','Edit']])
@section('title')
    Venu Feature
@endsection
@section('page')

    <div class="tabs">
        <div id="edititem" class="tab-pane active">
                <form method="post" action="/admin/content/feature-update/{{ $feature->id }}" class="form-horizontal form-bordered">
                    {{ csrf_field() }}
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault"> Facility </label>
                        <div class="col-md-6">
                            <input type="text" name="name" value="{{ $feature->name }}" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                        <div class="col-md-6">
                            <select name="status" class="form-control">
                                <option value=""> Select an option</option>
                                <option value="1"  @if($feature->is_show == 1) selected @endif> Show </option>
                                <option value="0" @if($feature->is_show == 0) selected @endif> Hide </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Payment Status</label>
                        <div class="col-md-6">
                            <select name="payment_status" class="form-control" required>
                                <option value=""> Select an option</option>
                                <option value="1" @if($feature->payment_status == 1) selected @endif> Paid </option>
                                <option value="0" @if($feature->payment_status == 1) selected @endif> Free </option>
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
@endsection


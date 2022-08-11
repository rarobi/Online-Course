@extends(getTemplate().'.user.layout.articlelayout')

@section('tab2','active')
@section('tab')
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header back-red"> Instructor Info</div>
                    <div class="body">
                        <form method="post" action="/user/instructor/new/store">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label" for="inputDefault"> Name</label>
                                <select class="form-select form-control" name="name" required>
                                    <option value="">Select an instructor</option>
                                    @if(count($instructors) > 0)
                                     @foreach($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                     @endforeach   
                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="inputDefault">Status</label>
                                <select class="form-select form-control" name="status" required>
                                    <option value="">Select an option</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option> 
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom pull-left" value="Save Changes">{{ trans('main.save_changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 tab-con">
                @if(count($lists) == 0)
                    <div class="text-center">
                        <img src="/assets/default/images/empty/channel.png">
                        <div class="h-20"></div>
                        <span class="empty-first-line"> No Instructor Found</span>
                        <div class="h-10"></div>
                        <span class="empty-second-line">
                        <span>{{ trans('main.channel_desc') }}</span>
                        </span>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table ucp-table" id="chanel-table">
                            <thead class="back-blue">
                            <th class="text-center"> Name</th>
                            <th class="text-center">{{ trans('main.status') }}</th>
                            <th class="text-center">{{ trans('main.controls') }}</th>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        $instructor = DB::table('instructor_info')->where('id', $list->instructor_id)->first();
                                        ?>
                                        {{  isset($instructor->name) ? \Illuminate\Support\Str::limit($instructor->name, 30, $end='...') : 'N/A' }}
                                        </td>
                                    <td class="text-center">
                                        @if($list->is_show == 1)
                                            <b class="blue-s"> Active </b>
                                        @else
                                            <b class="green-s"> In-active</b>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-href="/user/instructor/delete/{{ $list->id }}" data-toggle="modal" data-target="#confirm-delete" title="Delete instructor"><span class="crticon mdi mdi-delete-forever"></span></a>
                                        <!--<a href="/user/channel/edit/{{ $list->id }}"><span class="crticon mdi mdi-lead-pencil"></span></a>-->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

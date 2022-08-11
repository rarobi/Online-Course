
@extends($user['vendor'] == 1 ? getTemplate() . '.user.layout.videolayout' : getTemplate() . '.user.layout.videolayout')
@section('tab1','active')
@section('tab')
    <div class="h-20"></div>
   <div class="container-fluid">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header back-red"> Upload Photo</div>
                    <div class="body">
                        <form method="post" action="/user/gallery/new/store" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label" for="inputDefault">{{ trans('main.title') }}</label>
                                <input type="text" name="title" class="form-control" id="inputDefault" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label"> Add Photo</label>
                                <!--<div class="input-group" style="display: flex">-->
                                <!--    <button type="button" data-input="avatar" data-preview="holder" class="lfm_load btn btn-primary">-->
                                <!--        Choose-->
                                <!--    </button>-->
                                <!--    <input id="avatar" class="form-control" value="{{ $edit->avatar ?? '' }}" type="text" name="avatar" dir="ltr">-->
                                <!--    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="avatar">-->
                                <!--        <span class="input-group-text">-->
                                <!--            <i class="fa fa-eye" aria-hidden="true"></i>-->
                                <!--        </span>-->
                                <!--    </div>-->
                                <!--</div>-->
                                 <div class="input-group">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="200" style="height:100px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                       
                                    </div>
                                    <br>
                                    <label class="btn btn-primary btn-sm">
                                        <input onchange="changePhotoForThumbnail(this)" type="file" name="thumbnail_photo" style="display: none">
                                        <i class="fa fa-image"></i> Upload photo
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom pull-left" value="Save Changes">{{ trans('main.save_changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 tab-con">
                @if(count($galleries) == 0)
                    <div class="text-center">
                        <img src="/assets/default/images/empty/channel.png">
                        <div class="h-20"></div>
                        <span class="empty-first-line"> No Gallery Found</span>
                        <div class="h-10"></div>
                        <span class="empty-second-line">
                        <span>By creating gallery you will be able to show your item.</span>
                        </span>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table ucp-table" id="chanel-table">
                            <thead class="back-blue">
                            <th class="text-center">{{ trans('main.title') }}</th>
                            <th class="text-center"> Photo </th>
                            <th class="text-center">{{ trans('main.status') }}</th>
                            <th class="text-center">{{ trans('main.controls') }}</th>
                            </thead>
                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td class="text-center">{{ \Illuminate\Support\Str::limit($gallery->title, 30, $end='...') }}</td>
                                    <td class="text-center">
                                        @if($gallery->photo)
                                        <img src="/uploads/gallery/{{ $gallery->photo }}" id="profilePhotoViewer1" width="80" style="height:80px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="80" style="height:80px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($gallery->is_show == 1)
                                            <b class="blue-s"> Active </b>
                                        @else
                                            <b class="green-s"> In-active</b>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-href="/user/gallery/delete/{{ $gallery->id }}" data-toggle="modal" data-target="#confirm-delete" title="Delete channel"><span class="crticon mdi mdi-delete-forever"></span></a>
                                        <!--<a href="/user/channel/edit/{{ $gallery->id }}"><span class="crticon mdi mdi-lead-pencil"></span></a>-->
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
@section('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('.lfm_load').filemanager('file', {prefix: '/user/laravel-filemanager'});
        $('#gallery-hover').addClass('item-box-active');
        
         function changePhotoForThumbnail(input) {
            if (input.files && input.files[0]) {
                $("#photo_err1").html('');
                var mime_type = input.files[0].type;
                if(!(mime_type=='image/jpeg' || mime_type=='image/jpg' || mime_type=='image/png')){
                    $("#photo_err1").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
                    return false;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profilePhotoViewer1').attr('src', e.target.result);
  
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

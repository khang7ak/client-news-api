@extends ('templates.master')

@section ('title', 'Trang tin')

@section ('content')
    
    @if($sessionView != null)
    <div id="myModal"  class="modal fade hide" tabindex="-1" role="dialog" data-target="#myModal" data-toggle="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body text-center">
                    <p>Chào mừng bạn đến với trang chi tiết bài viết</p>
                    <p>Popup</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif

    <div class="container" id="item-3">
        <div class="row">
            <div class="col text-left"><h3>{{ $content['post']['post_category'] }}</h3></div>
            <div class="col text-right"><p><i>Thứ .. , ngày .. tháng 8 năm 2020</i></p></div>
        </div>
    </div>
    <div class="container" id="item-4">
        <div class="row">
            <div class="col-md-8 col-xs-8">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{ $content['post']['post_title'] }}</h4>
                            <p><i>{{ $content['post']['updated_at'] }}</i></p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-xs-12"></div>
                        <div class="col-md-10 col-xs-12">
                            <h6>{{ $content['post']['post_sub'] }}</h6>
                            <p>{{ $content['post']['post_content'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 col-xs-12" style="background: #6d7a86"></div> --}}
        </div>
    </div>
@endsection

@section("js")
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
@stop

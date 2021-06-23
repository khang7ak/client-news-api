@extends('templates.master')

@section('title','Tin tức')

@section('content')

    <div class="container" id="item-1">
        <div class="row">
            <div class="col-2">
                <h4>{{$category ?? "Tên danh mục"}} </h4>
            </div>
            <div class="col-6">
                <ul>
                    <li>Bút Bi</li>
                    <li>Phóng Sự</li>
                    <li>Bình Luận</li>
                </ul>
            </div>
            <div class="col-4 text-right">
                Thứ .., ngày .. tháng .. năm 2020
            </div>
        </div>
    </div>

    <div class="container" id="item-2">
        <div class="row">
            <div class="col-9">
                <div class="container" id="item-category">
                    <div class="row">
                        <div class="col-6" >
                            <a href=""
                               title=""><img style="height: 202px;" src="{{ $content['postMain']['post_image'] }}"
                                             class="img-fluid"></a>
                        </div>
                        <div class="col-6">
                            <a href="" title="">
                                <h4>{{ $content['postMain']['post_title'] }}</h4>
                            </a>
                            <p>{{ $content['postMain']['post_sub'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">

                        @foreach($content['postCategory'] as $postCat)
                            <div class="col-md col-xs-4">
                                <a href=""
                                   title=""><img src="{{ $postCat['post_image']}}" style="height: 96.75px; width: 129px;"
                                                 class="img-fluid"></a>
                                <a href="" title="">
                                    <h5>{{ $postCat['post_title'] }}</h5>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-3" style="background: #6d7a86">

            </div>
        </div>
    </div>




@endsection

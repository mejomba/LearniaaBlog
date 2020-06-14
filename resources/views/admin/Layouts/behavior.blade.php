<!-- Comment -->
    <div class="row" style="padding-bottom:45px;padding-top:60px">
        <div class="col-md-12">
            @php $user =  Auth::user();  @endphp
            @if($user['pk_users'] != null)
                <h3 class="title">نظرات و پیشنهادات</h3>
            @endif
            <div class="row">
                <div class="col-md-6">
                    @if($user['pk_users'] != null)
                        <form action="{{ route('behavior.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pk_product" value="{{$product->pk_product}}">
                            <input type="hidden" name="type" value="comment">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" name="content" class="form-control"
                                               placeholder="نظر خود را بنویسید">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <button type="submit" style="width:100px;font-size:12px;"
                                                class="btn btn-primary btn-title btnblogPost">ثبت
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                    <p></p>
                    <ul class="timeline">
                        @foreach($behavior_product as $one_behavior)
                            @php  $json = json_decode($one_behavior['extras'],false) @endphp
                            <li>
                            <span class="text-muted float-right" style="display:contents">
                            <i class="fas fa-user"></i>
                            {{$one_behavior->user->name }}
                            </span>
                            <p>{{ $one_behavior['content'] }} </p>
                            @if(isset($json->reply))
                                <!-- Reply box -->
                                    <div class="col-md-12">
                                        <div class=" card-login" style="margin-top:5px">
                                            <div class="card-body card-header-primary"
                                                 style="border-radius:15px; background: rgba(30, 183, 173, 0.7);">
                                                <div class="row">
                                                    <div class="col-md-3" style="padding-right:1.0rem">
                                                        <div>
                                                            <h5>پاسخ مدیر سایت:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div style="padding-right:9px;padding-left:9px;">
                                                            <p style="color:#FFF;padding-top:0.2rem; text-align: justify;"> {{$json->reply}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Reply box -->
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- end media-post -->
<@extends('admin.Layouts.layout_main')

@section('Head')
<title> نمایش پست | لرنیا </title>
  <meta  name="description" content=" نمایش پست | لرنیا">
@endsection

@section('content')
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h1 class="card-title text-center">جدول پست ها</h1>
                  <p class="card-category text-center">
                    
                  <a href="{{route('admin.post.create')}}" class="btn btn-primary btn-round" 
                  style="font-size:1.0rem;"> ایجاد پست
                  </a>                

                    </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                     
                    <thead class=" text-primary">
                        <tr>
                            @foreach($names as $name)
                          <th>
                         {{ $name }} 
                        </th>
                        @endforeach
                        <th>
                    عملیات
                        </th>
                      </tr>

                    </thead>

                      <tbody>
                      @foreach($posts as $post)
                        <tr>
                          <td>
                          {{ $post['pk_post'] }} 
                          </td>
                          <td>
                          {{ $post['pk_categories'] }} 
                          </td>
                          <td>
                          {{ $post['pk_tags'] }} 
                          </td>

                          <td>
                          {{ $post['title'] }} 
                          </td>

                          <td>
                          {{ $post['pk_writers'] }} 
                          </td>
                          
                          <td>

                            <img src="{{  Storage::url('post/'.$post['pic_content'])  }}" width="100px" height="60px" alt="Thumbnail Image" class="">
                      
                          </td>

                          <td>

                            @if($post['status'] == 'انتشار')
                            <span style="font-size: 1.3rem;color:gray">
                            <a target="_blank" href="{{route('post.detail', $post['pk_post'] )}}"> 
                            <img src="{{ asset('images/Template/world.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                            </a>
                            </span>
                            

                            @else

                            <span style="font-size: 1.3rem;color:gray">
                            <img src="{{ asset('images/Template/draft.svg') }}" alt="Thumbnail Image" height="40px" width="40px">

                            </span>

                            @endif

                          </td>

                       <td>

                        <span style="font-size: 1.3rem;color:black">
                      <a style="color:#00bcd4" href="{{ route('admin.post.edit', $post['pk_post']) }}"> 
                      <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" height="30px" width="30px">
                       </a>
                        </span>

                        <span style="font-size: 1.3rem;color:black;padding-right:25px">
                      <a style="color:#e91e63" href="{{ route('admin.post.delete', $post['pk_post']) }}">
                      <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                        </a>
                      
                        </span>

                        </td>

                          
                        </tr>
                        @endforeach
                        
                        
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
@endsection
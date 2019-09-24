@extends('admin.Layouts.layout_main')


@section('content')


<div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">وظایف:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="#profile" data-toggle="tab">
                          <img src="{{ asset('images/Template/user.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                          &nbsp; کاربران
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                          <img src="{{ asset('images/Template/notification.svg') }}" alt="Thumbnail Image" height="40px" width="40px">
                          &nbsp; پیام ها
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                    
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane" id="profile">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن؟</td>
                            <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="ویرایش وظیفه">
                              <span style="font-size: 1.5em; color: black;">
                               <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" width="30px" height="30px">
                              </span>
                              </button>
                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="حذف">
                              <span style="font-size: 1.5em; color: black;">
                                <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" width="40px" height="40px">
                              </span>
                              </button>
                            </td>
                          </tr>
                          
                         
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane active show" id="messages">
                      <table class="table">
                        <tbody>
                        <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن؟</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="ویرایش وظیفه">
                              <span style="font-size: 1.5em; color: black;">
                               <img src="{{ asset('images/Template/edit.svg') }}" alt="Thumbnail Image" width="30px" height="30px">
                              </span>
                              </button>
                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="حذف">
                              <span style="font-size: 1.5em; color: black;">
                               <img src="{{ asset('images/Template/delete.svg') }}" alt="Thumbnail Image" width="40px" height="40px">
                              </span>
                              </button>
                            </td>
                          </tr>
                          
                         
                        </tbody>
                      </table>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            
          </div>




@endsection
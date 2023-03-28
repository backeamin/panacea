@extends('layouts.admin_layout')
@section('page_title')
    Options
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Update Site Options</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('options.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_title">Site Title</label>
                                        <input type="text" value="{{getValueByTitle('site_title')}}" class="form-control" name="site_title" id="site_title">
                                </div>
                                    <div class="form-group">
                                        <label for="slogan">Slogan</label>
                                        <input type="text" value="{{getValueByTitle('slogan')}}" class="form-control" name="slogan" id="slogan">
                                </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" value="{{getValueByTitle('address')}}" class="form-control" name="address" id="address">
                                </div>
                                    <div class="form-group">
                                        <label for="logo">Logo</label> <br>
                                        <img src="{{asset('storage')}}/{{getValueByTitle('logo')}}" style="height: 50px; margin: 5px 0;" alt="">
                                        <input type="file" class="form-control" name="logo" id="logo">
                                </div>
                                    <div class="form-group">
                                        <label for="favicon">Favicon</label> <br>
                                        <img src="{{asset('storage')}}/{{getValueByTitle('favicon')}}" style="height: 50px; margin: 5px 0;" alt="">
                                        <input type="file" class="form-control" name="favicon" id="favicon">
                                </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" value="{{getValueByTitle('phone_number')}}" class="form-control" name="phone_number" id="phone_number">
                                </div>
                                    <div class="form-group">
                                        <label for="phone_number_2">Second Phone Number</label>
                                        <input type="text" value="{{getValueByTitle('phone_number_2')}}" class="form-control" name="phone_number_2" id="phone_number_2">
                                </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" value="{{getValueByTitle('email')}}" class="form-control" name="email" id="email">
                                </div>
                            </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_2">Second Email</label>
                                        <input type="text" value="{{getValueByTitle('email_2')}}" class="form-control" name="email_2" id="email_2">
                                </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" value="{{getValueByTitle('facebook')}}" class="form-control" name="facebook" id="facebook">
                                </div>
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" value="{{getValueByTitle('youtube')}}" class="form-control" name="youtube" id="youtube">
                                </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" value="{{getValueByTitle('twitter')}}" class="form-control" name="twitter" id="twitter">
                                </div>
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" value="{{getValueByTitle('linkedin')}}" class="form-control" name="linkedin" id="linkedin">
                                </div>
                                    <div class="form-group">
                                        <label for="telegram">Telegram</label>
                                        <input type="text" value="{{getValueByTitle('telegram')}}" class="form-control" name="telegram" id="telegram">
                                </div>
                                    <div class="form-group">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="text" value="{{getValueByTitle('whatsapp')}}" class="form-control" name="whatsapp" id="whatsapp">
                                </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" value="{{getValueByTitle('instagram')}}" class="form-control" name="instagram" id="instagram">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Update Options</button>
                        </div>
                    </form>
                </div>
        </div><!-- end col -->
    </div>
@endsection

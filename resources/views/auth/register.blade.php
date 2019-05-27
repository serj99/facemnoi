@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       
         <div class="col-md-6">
           <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
               <div class="panel-heading">In need user Register</div>
               <div class="panel-body">
                 <form class="form-horizontal" method="POST" action="{{ route('register_in_need_user') }}">
                     {{ csrf_field() }}

                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         <label for="name" class="col-md-4 control-label">Name</label>

                         <div class="col-md-6">
                             <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                             @if ($errors->has('name'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('name') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                         <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                         <div class="col-md-6">
                             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                             @if ($errors->has('email'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         <label for="password" class="col-md-4 control-label">Password</label>

                         <div class="col-md-6">
                             <input id="password" type="password" class="form-control" name="password" required>

                             @if ($errors->has('passwordtd'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                         <div class="col-md-6">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                         </div>
                     </div>

                       <div class="form-group row">
                           <label for="mobile_phone" class="col-md-4 control-label" 
                             >Mobile Phone</label>
                           <div class="col-md-6">
                             <input id="mobile_phone" type="mobile_phone" class="form-control" name="mobile_phone" 
                               value="{{ old('mobile_phone') }}">
                           </div> 
                       </div>   

                     <div class="form-group">
                         <div class="col-md-6 col-md-offset-4">
                             <button type="submit" class="btn btn-primary">
                                 Register
                             </button>
                         </div>
                     </div>
                 </form>
               </div>
             </div>
           </div>
         </div>

         <div class="col-md-6">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">To do user Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register_to_do_user') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nametd') ? ' has-error' : '' }}">
                            <label for="nametd" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="nametd" type="text" class="form-control" name="nametd" value="{{ old('nametd') }}" required autofocus>

                                @if ($errors->has('nametd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nametd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emailtd') ? ' has-error' : '' }}">
                            <label for="emailtd" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="emailtd" type="emaild" class="form-control" name="emailtd" value="{{ old('emailtd') }}" required>

                                @if ($errors->has('emailtd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emailtd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="passwordtd" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="passwordtd" type="password" class="form-control" name="passwordtd" required>

                                @if ($errors->has('passwordtd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passwordtd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirmtd" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirmtd" type="password" class="form-control" name="password_confirmationtd" required>
                            </div>
                        </div>

                          <div class="form-group row">
                              <label for="mobile_phonetd" class="col-md-4 control-label" 
                                >Mobile Phone</label>
                              <div class="col-md-6">
                                <input id="mobile_phonetd" type="mobile_phone" class="form-control" name="mobile_phonetd" 
                                  value="{{ old('mobile_phonetd') }}">
                              </div> 
                          </div>   

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    
    </div>
</div>
@endsection

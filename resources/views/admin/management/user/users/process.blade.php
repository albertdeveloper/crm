<x-app-layout>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{($userInfo) ? 'Update' : 'Create'}} User</h3>
        </div>
        <form method="POST">
            @csrf
            <div class="card-body">


                <div class="form-group">
                    <label for="title">Name</label>
                    @if($errors->has('name')) <div class="float-right">{{$errors->first('name')}}</div> @endif
                    <x-input type="text" name="name" id="name" class="form-control" value="{!! ($userInfo) ? $userInfo->name : old('name') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Email</label>
                    @if($errors->has('email')) <div class="float-right">{{$errors->first('email')}}</div> @endif
                    <x-input type="email" name="email" id="email" class="form-control" value="{!! ($userInfo) ? $userInfo->email : old('email') !!}"/>
                </div>


                <div class="form-group">
                    <label for="title">Password</label>
                    @if($errors->has('password')) <div class="float-right">{{$errors->first('password')}}</div> @endif
                    <x-input type="password" name="password" id="password" class="form-control" value="{!! ($userInfo) ? $userInfo->title : old('password') !!}"/>
                </div>


                <div class="form-group">
                    <label for="title">Role</label>
                    @if($errors->has('role')) <div class="float-right">{{$errors->first('role')}}</div> @endif

                    <select  class="form-control" name="role">
                        <option value=""></option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if($userInfo && in_array($role->id,$userInfo->roles->pluck('id')->toArray())) selected="true" @endif> {{$role->title}}</option>
                        @endforeach

                    </select>


                </div>



            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{($userInfo) ? 'Update' : 'Create'}} user</button>
            </div>
        </form>
    </div>

</x-app-layout>

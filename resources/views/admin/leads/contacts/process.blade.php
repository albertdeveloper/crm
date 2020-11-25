<x-app-layout>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{($contactInfo) ? 'Update' : 'Create'}} Contact - {{$leadInfo->company}}</h3>
        </div>

        <form method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Name</label>
                    @if($errors->has('name')) <div class="float-right">{{$errors->first('name')}}</div> @endif
                    <x-input type="text" name="name" id="name" class="form-control" value="{!! ($contactInfo) ? $contactInfo->name : old('name') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Phone</label>
                    @if($errors->has('phone')) <div class="float-right">{{$errors->first('phone')}}</div> @endif
                    <x-input type="text" name="phone" id="phone" class="form-control" value="{!! ($contactInfo) ? $contactInfo->phone : old('phone') !!}"/>
                </div>


                <div class="form-group">
                    <label for="title">Email</label>
                    @if($errors->has('email')) <div class="float-right">{{$errors->first('email')}}</div> @endif
                    <x-input type="text" name="email" id="email" class="form-control" value="{!! ($contactInfo) ? $contactInfo->email : old('email') !!}"/>
                </div>


                <div class="form-group">
                    <label for="title">Designation</label>
                    @if($errors->has('designation')) <div class="float-right">{{$errors->first('designation')}}</div> @endif
                    <x-input type="text" name="designation" id="designation" class="form-control" value="{!! ($contactInfo) ? $contactInfo->designation : old('designation') !!}"/>
                </div>



            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{($contactInfo) ? 'Update' : 'Create'}} Contact</button>
            </div>
        </form>
    </div>
</x-app-layout>

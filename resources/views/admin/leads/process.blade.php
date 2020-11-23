<x-app-layout>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{($leadInfo) ? 'Update' : 'Create'}} Lead</h3>
        </div>

        <form method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Company</label>
                    @if($errors->has('company')) <div class="float-right">{{$errors->first('company')}}</div> @endif
                    <x-input type="text" name="company" id="company" class="form-control" value="{!! ($leadInfo) ? $leadInfo->company : old('company') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Phone</label>
                    @if($errors->has('phone')) <div class="float-right">{{$errors->first('phone')}}</div> @endif
                    <x-input type="text" name="phone" id="phone" class="form-control" value="{!! ($leadInfo) ? $leadInfo->phone : old('phone') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Email</label>
                    @if($errors->has('email')) <div class="float-right">{{$errors->first('email')}}</div> @endif
                    <x-input type="email" name="email" id="email" class="form-control" value="{!! ($leadInfo) ? $leadInfo->email : old('email') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Street</label>
                    @if($errors->has('street')) <div class="float-right">{{$errors->first('street')}}</div> @endif
                    <textarea class="form-control" name="street" id="street">{!! ($leadInfo) ? $leadInfo->street : old('street')   !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="title">City</label>
                    @if($errors->has('city')) <div class="float-right">{{$errors->first('city')}}</div> @endif
                    <x-input type="text" name="city" id="city" class="form-control" value="{!! ($leadInfo) ? $leadInfo->city : old('city') !!}"/>
                </div>


                <div class="form-group">
                    <label for="title">State</label>
                    @if($errors->has('state')) <div class="float-right">{{$errors->first('state')}}</div> @endif
                    <x-input type="text" name="state" id="state" class="form-control" value="{!! ($leadInfo) ? $leadInfo->state : old('state') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Zip Code</label>
                    @if($errors->has('zipcode')) <div class="float-right">{{$errors->first('zipcode')}}</div> @endif
                    <x-input type="text" name="zipcode" id="zipcode" class="form-control" value="{!! ($leadInfo) ? $leadInfo->zipcode : old('zipcode') !!}"/>
                </div>

                <div class="form-group">
                    <label for="title">Website</label>
                    @if($errors->has('website')) <div class="float-right">{{$errors->first('website')}}</div> @endif
                    <x-input type="text" name="website" id="website" class="form-control" value="{!! ($leadInfo) ? $leadInfo->website : old('website') !!}"/>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    @if($errors->has('country')) <div class="float-right">{{$errors->first('country')}}</div> @endif
                    <x-input type="text" name="country" id="country" class="form-control" value="{!! ($leadInfo) ? $leadInfo->country : old('country') !!}"/>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{($leadInfo) ? 'Update' : 'Create'}} lead</button>
            </div>
        </form>
    </div>
</x-app-layout>

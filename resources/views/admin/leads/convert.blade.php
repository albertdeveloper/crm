<x-app-layout>
    <div class="col-md-6">
    <div class="card ">
        <div class="card-header bg-success">
            <h1 class="card-title">Convert Lead (<small>{{$lead_data->first_name}} {{$lead_data->last_name}} - {{$lead_data->company}}</small>)</h1>
        </div>
        <div class="card-body">

            <div class="row mt-3">
                <div class="col-md-6"> Create New Account:</div>
                <div class="col-md-6"><b>{{$lead_data->company}}</b></div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6"> Create New Contact:</div>
                <div class="col-md-6"><b>{{$lead_data->first_name}} {{$lead_data->last_name}}</b></div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">Owner of the New Records:</div>
                <div class="col-md-6">
                    <b>{{$lead_data->owner}}</b>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <form method="POST">
                     @csrf
                    <button href="" class="btn btn-sm btn-primary">Convert</button>

                    <a href="{{ route('admin.leads.show',['id' => $lead_data->id]) }}" class="btn btn-sm btn-default ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<x-app-layout>
  <div class="row">


      <div class="col-md-6">
      <div class="card">
          <div class="card-header border-transparent">
              <h3 class="card-title">Today's Lead</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                  </button>

              </div>
          </div>
          <div class="card-body p-0">
              @if(sizeof($leads) > 0)
              <div class="table-responsive">
                  <table class="table m-0">
                      <thead>
                      <tr>
                          <th>Company</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Lead Source</th>
                          <th>Lead Owner</th>
                      </tr>
                      </thead>
                      <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td>{{$lead->company}}</td>
                                    <td>{{$lead->email}}</td>
                                    <td>{{$lead->phone}}</td>
                                    <td>{{$lead->leadSource->title}}</td>
                                    <td>{{$lead->owner}}</td>
                                </tr>
                            @endforeach

                      </tbody>
                  </table>
              </div>
              @else
                  <div  style="height: 200px">
                      <div class="row align-items-center h-100">
                          <div class="mx-auto">
                                 No leads found
                          </div>
                      </div>
                  </div>
                  @endif
          </div>

      </div>
  </div>
  </div>

</x-app-layout>

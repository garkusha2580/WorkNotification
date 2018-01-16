@extends("layouts.admin")

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-xs-12 col-md-5">
                        <form action="{{route("notification.store")}}" id="notif-app" method="post">
                            <input-comp
                                    v-for="input in inputs"
                                    :input="input"
                                    :key="input.id"
                            ></input-comp>
                            <div class="form-group">
                                <label for="sites_select">Select the site to append</label>
                                <select placeholder="Select data" multiple="multiple" class="form-control"
                                        name="sites[]"
                                        id="sites_select">
                                    @foreach($sitesItems as $sitesItem)
                                        <option value="{{$sitesItem->home_url}}">{{$sitesItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <button class="btn btn-primary">Save</button>

                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <table class="table table-response">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>sites</th>
                            </tr>
                            @if($appendItems->isNotEmpty())
                                @foreach($appendItems as $key=>$appendItem)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="mailto:{{$appendItem->email}}">{{$appendItem->email}}</a></td>
                                        <td>{{$appendItem->sites}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        not any data
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section("js")
    @parent
    <script>
        let vm = new Vue({
            el: "#notif-app",
            data: {
                inputs: [
                    {
                        id: "email",
                        label: "Append email",
                        err: '{{$errors->first('email')!=null?$errors->first('email'):""}}',
                        holder: "Enter text"
                    }
                ]
            }
        })
    </script>
@stop

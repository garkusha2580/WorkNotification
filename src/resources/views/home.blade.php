@extends('layouts.admin')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body" id="home-form">
                    <div class="col-xs-12 col-md-5">
                        <form method="post" action="{{route("addSite")}}">
                            <input-comp
                                    v-for="input in inputs"
                                    :input="input"
                                    :key="input.id"
                            ></input-comp>
                            {{ csrf_field() }}
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <h4>Current sites</h4>
                        <table class="table table-responsive">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th class="text-center">Edit</th>

                                <th class="text-center">Remove</th>
                            </tr>
                            @foreach($sitesItems as $key=>$sitesItem)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$sitesItem->name}}</td>
                                    <td><a href="{{$sitesItem->home_url}}">{{$sitesItem->home_url}}</a></td>
                                    <td class="text-center site-edit"><i class="fa fa-2x fa-pencil"></i></td>
                                    <td class="text-center site-remove"><i class="fa fa-2x fa-times"></i></td>
                                </tr>
                            @endforeach
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
        let add = new Vue({
            el: '#home-form',
            data: {
                inputs: [
                    {
                        id: "name",
                        label: "Site name",
                        err: '{{$errors->first('name')!=null?$errors->first('name'):""}}',
                        holder: "Enter text"
                    },
                    {
                        id: "home_url",
                        label: "Site url",
                        err: '{{$errors->first('home_url')!=null?$errors->first('home_url'):""}}',
                        holder: "Enter text",
                    }
                ]
            }
        });
    </script>
@stop

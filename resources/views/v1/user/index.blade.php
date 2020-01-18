@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">帳號管理</div>
                <div class="card-body">
                    <a class="btn btn-success" href="/v1/user/create">新增帳號</a>
                    <hr>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>Account 帳號:email</th>
                                <th>功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$item->name}}</td>

                                <td>{{$item->Account}}</td>
                                <td>
                                    <div class="card-body">
                                        <a class="btn btn-success" href="/v1/user/pwd/change/{{$item->id}}">編輯</a>
                                        <a class="btn btn-danger" href="" data-itemid="{{$item->id}}">
                                            刪除
                                        </a>

                                        <form class="destroy-form" data-itemid="{{$item->id}}" action="/v1/user/destroy/{{$item->id}}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection


    @section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
     $(document).ready(function() {
            $('#example').DataTable({
                "order": [1,"desc"]
            });

            $('#example').on('click','.btn-danger',function(){
                event.preventDefault();
                var r = confirm("你確定要刪除此項目嗎?");
                if (r == true) {
                    var itemid = $(this).data("itemid");
                    $(`.destroy-form[data-itemid="${itemid}"]`).submit();
                }
            });
        });
    </script>

    @endsection

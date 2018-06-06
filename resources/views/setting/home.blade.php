@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @include('shared.topnavbarhome')
    <div class="container-fluid rasxod-page">
        <div class="">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 rasxod-menu menu-project">
                <div class="list-group">
                    <a href="#" class="list-group-item" id="showaddprojectmodel" toggle='modal'> <i class="fa fa-bank fa-1"></i>  <span class="text-uppercase">Добавит Проект</span></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 rasxod-menu-spisokall">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-12">
                        @if (Session::has('message'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p class="alert-link">{!! Session::get('message') !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 table-responsive" style="margin: 0px;">
                    <table class="table table-striped">
                        <colgroup>
                            <col width="5%"/>
                            <col width="85%"/>
                            <col width="5%"/>
                            <col width="5%"/>
                        </colgroup>
                        <tbody>
                            @foreach($projects as $project)
                                <tr id="project_id{{$project->id}}">
                                    <td class="text-center">
                                        <i class="fa fa-bank"></i>
                                    </td>
                                    <td id="person_name"> {{ $project->projects_name }}</td>
                                    <td class="text-center" > <button class="editzarplata" type="button" value="{{ $project->id }}" data-toggle="modal" data-target="#{{{$project->id}}}"> <i class="fa fa-pencil-square-o"></i></button></td>

                                    <td class="text-center">
                                        <button value="{{$project->id}}" class="deletezarplata" type="button" data-toggle="modal" data-target="#{{{$project->id}}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Add project Modal -->
    <div class="modal fade" id="addproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <form class="form-horizontal" action="{{ route('setting.addproject') }}"  method="POST" id="multiple" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil-square-o"></i> Создать запись</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group has-project">
                            <label for="inputEmail3" class="col-sm-3  text-right control-label">Имя:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder="Имя" required name="name" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                        <button class="btn btn-warning" type="submit">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End add project Modal -->

    <!-- Delete Project Modal -->
    <div class="modal fade" id="deletezarplatamodal" tabindex="-1" role="dialog">
        <div class='modal-dialog'>
            <!-- Modal content-->
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Удалить</h4>
                </div>
                <div class='modal-body'>
                    <div class="">
                        <h4 class="text-center text-danger"> Данные будут удалены <b> <i>безвозвратно!</i></b></h4>
                        <h4 class="text-center text-danger">Вы действительно  хотите удалить их?</h4>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-danger deletebtn' value=''>Удалить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Project Modal -->

    <!-- Modal for Edit Zaplata -->
    <div class="modal fade" id="editzarplatamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <form class="form-horizontal" action="{{ route('setting.editProject') }}"  method="POST" id="multiple" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="project_id" value="" class="project_id">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil-square-o"></i> Редактировать запись</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group has-project">
                            <label for="inputEmail3" class="col-sm-3  text-right control-label">Имя:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control edit_name"  placeholder="Имя" required name="edit_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                        <button class="btn btn-warning" type="submit">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Edn Modal for Edit Zaplata -->


@endsection

@section('js')
<script type="text/javascript">
    $('#showaddprojectmodel').click(function() {
       $('#addproject').modal('show');
    });
</script>
<script type="text/javascript">
// Delete task and remove it from list
    // $(".deletebtn").fadeTo(100, 1);
    $('.deletezarplata').click(function(){
        $('#deletezarplatamodal').modal('show');

        $('.deletebtn').val($(this).val());  
        
        var task_id = $('.deletebtn').val();

        $('.deletebtn').click(function(){
            $.ajax({
                type: "get",
                url:"/setting/delete/" + task_id,
                success: function (data) {
                    $('#deletezarplatamodal').modal('hide');

                    $("#project_id" + data[1]).fadeOut(800, function () {
                        $(this).remove();
                    });
                },
                error: function (data) {
                }
            });
        });
    });
// End delete task and remove it from list
</script>
<script type="text/javascript">
    // Edit options
    $('.editzarplata').on('click', function() {
        $('#editzarplatamodal').modal('show');
        var a = $(this).val();
        $('.project_id').attr('value', a);
        $('.edit_name').attr('value', $('#rasxod_id'+a).find('#person_name').text());
    });
// End Edit options
</script>
@endsection

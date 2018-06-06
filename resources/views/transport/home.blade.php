@extends('layouts.app')


@section('content')
@include('shared.topnavigation')
@include('shared.mainmenu')

<!-- Modal for Add Zaplata -->
<div class="modal fade" id="addzarplata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <form class="form-horizontal" action="{{  URL::to($project_id.'/rasxodi/transport/addtransport') }}"  method="POST" id="multiple" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil-square-o"></i> Создать запись</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-3  text-right control-label">Имя:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  placeholder="Имя" required name="name">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputPassword3" class="col-sm-3  text-right control-label">Дата:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="Дата" value="<?php echo date("Y-m-d");?>" name="data">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputPassword3" class="col-sm-3  text-right control-label">Рейс:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Рейс" required name="reys">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputPassword3" class="col-sm-3  text-right control-label">Цена:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Цена" required name="sena">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputPassword3" class="col-sm-3  text-right control-label">Комментария:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="comments"></textarea>
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputPassword3" class="col-sm-3  text-right control-label">Фото:</label>
                            <div class="col-sm-9">
                                    <label for="files" class="btn btn-danger btn-block btn-outlined"><i class="fa fa-plus"> Select files</i></label>
                                    <input type="file" id="files" multiple name="photos[]" class="form-control" placeholder="Фото" style="display: none;">
                            </div>
                            <hr>
                            <div class="col-sm-9 col-md-push-3" id="selectedFiles">
                                
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                    <button class="btn btn-danger" type="submit">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End Modal for Add Zaplata -->

<!-- Modal for Delete Zarplata -->
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
                <!-- <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button> -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal for Delete Zarplata -->

<!-- Modal for image preview -->
<div class="modal modal-custom fade" id="showfoto" tabindex="-1" role="dialog">
    <div class=''>
        <!-- Modal content-->
        <div class='modal-content modal-content-custom'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Фото</h4>
            </div>
            <div class='modal-body'>
                <!-- <a class="prev prevnextfoto">&#10094;</a> -->
                <!-- <a class="next prevbackfoto">&#10095;</a> -->
                <div class="thumbnail imageplace">
                    <img src="" class="imageslides img img-responsive">
                </div>
            </div>
            <div class='modal-footer'>
                <button class="prevnextfoto"> <i class="fa fa-arrow-left"></i> Prev</button>
                <button class="prevbackfoto">Next <i class="fa fa-arrow-right"></i> </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal for image preview -->

<!-- Modal for Comment text preview -->
<div class="modal fade" id="textpreview" tabindex="-1" role="dialog">
    <div class='modal-dialog'>
        <!-- Modal content-->
        <div class='modal-content modal-content-custom'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Комментария</h4>
            </div>
            <div class='modal-body'>
                <p class="text-muted textpreviewmodel text-justify text-capitalize"></p>
            </div>
        </div>
    </div>
</div>
<!-- End Modal for Comment text preview -->


<!-- Modal for Edit Zaplata -->
<div class="modal fade" id="editzarplatamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <form class="form-horizontal" action="{{ route('transports.edittransports') }}"  method="POST" id="multiple" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="zarplata_id" value="" class="zarplatas_id">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil-square-o"></i> Редактировать запись</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group has-error">
                        <label for="inputEmail3" class="col-sm-3  text-right control-label">Имя:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control edit_name"  placeholder="Имя" required name="edit_name">
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="inputPassword3" class="col-sm-3  text-right control-label">Дата:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control edit_data" placeholder="Дата" value="" name="edit_data">
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="inputPassword3" class="col-sm-3  text-right control-label">Сумма:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control edit_summa" placeholder="Сумма" required name="edit_summa">
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="inputPassword3" class="col-sm-3  text-right control-label">Комментария:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control edit_comment" rows="3" name="edit_comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                    <button class="btn btn-danger" type="submit">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Edn Modal for Edit Zaplata -->

@endsection

@section('js')
<script>
// Image preview before upload
    var selDiv = "";
    var storedFiles = [];
    
    $(document).ready(function() {
        $("#files").on("change", handleFileSelect);
        
        selDiv = $("#selectedFiles"); 
        // $("#myForm").on("submit", handleForm);
        
        $("body").on("click", ".selFile", removeFile);
    });
        
    function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {          

            if(!f.type.match("image.*")) {
                return;
            }
            storedFiles.push(f);
            
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = "<div class='thumbnail col-md-12'>"+
                                "<button type='button' class='fa fa-close selFile pull-right'></button>"+
                                "<img src=\"" + e.target.result + "\" data-file='"+f.name+"' class='' title='Click to remove'>"
                            "</div>";
                selDiv.append(html);
                
            }
            reader.readAsDataURL(f); 
        });
    }

    function removeFile(e) {
        var file = $(this).data("file");
        for(var i=0;i<storedFiles.length;i++) {
            if(storedFiles[i].name === file) {
                storedFiles.splice(i,1);
                break;
            }
        }
        $(this).parent().remove();
    }
// End Image preview before upload
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
                url:"/rasxodi/transport/delete/" + task_id,
                success: function (data) {
                    $('#deletezarplatamodal').modal('hide');

                    $("#rasxod_id" + data[1]).fadeOut(800, function () {
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
    $('.shofotosmodal').on('click', function () {
        $('#showfoto').modal('show');

        var imgs        = $(this).find('img');
        var imgslength  = imgs.length;
        var imgslide = [];
        for(var i = 0; i<imgslength; i++) {
            imgslide.push(imgs[i].src);
        }

        $(".imageslides").attr('src', imgslide[0])

        var i = 0;
        $('.prevnextfoto').on('click', function() {
            i++;
            if (i == imgslide.length) { i = 0;}
            $(".imageslides").attr('src', imgslide[i]);
        });

        i = imgslide.length-1;
        $('.prevbackfoto').on('click', function() {
            i--;
            if (i < 0 ) { i = imgslide.length-1;}
            $(".imageslides").attr('src', imgslide[i]);
        });

        $('#showfoto').on('hide.bs.modal', function () {
            imgslide = [];
            i = 0;
            $(".imageslides").attr('src', '');
        });
    });
</script>
<script type="text/javascript">
    $('.textpreviewbutton').on('click', function () {
        $('#textpreview').modal('show');
        var  comm = $(this).find('p');
        $('.textpreviewmodel').html(comm.text());
    });
</script>
<script type="text/javascript">
    // Edit options
    $('.editzarplata').on('click', function() {
        $('#editzarplatamodal').modal('show');
        var a = $(this).val();

        $('.zarplatas_id').attr('value', a);
        $('.edit_name').attr('value', $('#rasxod_id'+a).find('#person_name').text());
        $('.edit_data').attr('value', $('#rasxod_id'+a).find('#data').text());
        $('.edit_summa').attr('value', $('#rasxod_id'+a).find('#person_summa').text());
        $('.edit_comment').val($.trim($('#rasxod_id'+a).find('#comment_text').text()));      
    });
// End Edit options
</script>
@endsection
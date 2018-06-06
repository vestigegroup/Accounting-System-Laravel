<!-- All Rasxod  Body -->
    <div class="container-fluid rasxod-page">
        <div class="">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 rasxod-menu">
                <div class="list-group">
                    <a href="{{ URL::to( $project_id.'/rasxodi/zarplata') }}" class="list-group-item"> <i class="fa fa-user fa-1"></i>  <span class="text-uppercase">зарплата</span></a>
                    <a href="{{ URL::to( $project_id.'/rasxodi/materials') }}" class="list-group-item"> <i class="fa fa-connectdevelop"></i>  <span class="text-uppercase">материалы</span></a>
                    <a href="{{ URL::to( $project_id.'/rasxodi/transport') }}" class="list-group-item"> <i class="fa fa-car"></i>  <span class="text-uppercase">транспорт</span></a>
                    <a href="{{ URL::to( $project_id.'/rasxodi/otherrasxodi') }}" class="list-group-item"> <i class="fa fa-star"></i>  <span class="text-uppercase">другии расходы</span></a>
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
                            <col width="30%"/>
                            <col width="8%"/>
                            <col width="8%"/>
                            <col width="8%"/>
                            <col width="8%"/>
                            <col width="8%"/>
                            <col width="8%"/>
                        </colgroup>
                        <tbody>
                            @foreach($rasxodi as $rasxod)
                                <tr id="rasxod_id{{$rasxod->id}}">
                                    <td class="text-center">
                                    @switch($rasxod->rasxod_type)
                                        @case(1)
                                            <i class="fa fa-user-o"></i>
                                        @break
                                        @case(2)
                                            <i class="fa fa fa-connectdevelop"></i>
                                        @break
                                        @case(3)
                                            <i class="fa fa fa-car"></i>
                                        @break
                                        @case(4)
                                            <i class="fa fa fa-star"></i>
                                        @break
                                        @default
                                            <i class="fa fa-exclamation"></i>
                                        @break
                                    @endswitch
                                    </td>
                                    <td id="person_name"> {{ $rasxod->name }}</td>
                                    @if($rasxod->res)
                                        <td>{{ $rasxod->res }}</td>
                                    @endif
                                    @if($rasxod->chenak)
                                        <td>{{ $rasxod->chenak }}</td>
                                    @endif
                                    @if($rasxod->mikdor)
                                        <td>{{ $rasxod->mikdor }}</td>
                                    @endif
                                    @if($rasxod->narx)
                                        <td>{{ $rasxod->narx }}</td>
                                    @endif
                                    <td class="text-center"> <span id="person_summa">{{ $rasxod->summa }}</span> сом</td>
                                    <td class="text-center" id="data">{{ $rasxod->data }}</td>
                                    <td class="text-center">
                                        @if($rasxod->comments)
                                            <button type="button" data-toggle="modal" data-target="#{{{$rasxod->id}}}" class="textpreviewbutton">
                                                <p class="hidden commentext" id="comment_text">
                                                    {{ $rasxod->comments }}
                                                </p>
                                                <i class="fa fa-comments-o"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(count($rasxod->photos)>0)
                                            <button class="shofotosmodal" type="button" data-toggle="modal" data-target="#{{{$rasxod->id}}}">
                                                @foreach($rasxod->photos as $photo)
                                                    <img src="/images/rasxodi/{{$photo->photo_path}}" style="display:none;">
                                                @endforeach
                                                <i class="fa fa-camera"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center" > <button class="editzarplata" type="button" value="{{ $rasxod->id }}" data-toggle="modal" data-target="#{{{$rasxod->id}}}"> <i class="fa fa-pencil-square-o"></i></button></td>

                                    <td class="text-center">
                                        <button value="{{$rasxod->id}}" class="deletezarplata" type="button" data-toggle="modal" data-target="#{{{$rasxod->id}}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rasxodi->links() }}
                </div>
            </div>
        </div>
    </div>
<!-- End Rasxod Body -->

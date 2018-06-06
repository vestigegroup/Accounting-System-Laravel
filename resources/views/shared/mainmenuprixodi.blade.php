<!-- All Rasxod  Body -->
    <div class="container-fluid rasxod-page">
        <div class="">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 rasxod-menu rasxod-menu-prixod">
                <div class="list-group">
                    <a href="{{ URL::to('/prixodi/bank') }}" class="list-group-item"> <i class="fa fa-bank fa-1"></i>  <span class="text-uppercase">Bank</span></a>
                    <a href="{{ URL::to('/prixodi/karz') }}" class="list-group-item"> <i class="fa fa-money"></i>  <span class="text-uppercase">Karz</span></a>
                    <a href="{{URL::to('/prixodi/otherprixodi') }}" class="list-group-item"> <i class="fa fa-cc-visa"></i>  <span class="text-uppercase">другии расходы</span></a>
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
                            <col width="4%"/>
                            <col width="30%"/>
                            <col width="16%"/>
                            <col width="25%"/>
                            <col width="5%"/>
                            <col width="5%"/>
                            <col width="5%"/>
                            <col width="5%"/>
                        </colgroup>
                        <tbody>
                            @foreach($prixodi as $prixod)
                                <tr id="rasxod_id{{$prixod->id}}">
                                    <td class="text-center">
                                    @switch($prixod->prixod_type)
                                        @case(1)
                                            <i class="fa fa-bank"></i>
                                        @break
                                        @case(2)
                                            <i class="fa fa-money"></i>
                                        @break
                                        @case(3)
                                            <i class="fa fa-cc-visa"></i>
                                        @break
                                        @default
                                            <i class="fa fa-exclamation"></i>
                                        @break
                                    @endswitch
                                    </td>
                                    <td id="person_name"> {{ $prixod->name }}</td>
                                    <td class="text-center"> <span id="person_summa">{{ $prixod->summa }}</span> сом</td>
                                    <td class="text-center" id="data">{{ $prixod->data }}</td>
                                    <td class="text-center">
                                        @if($prixod->comments)
                                            <button type="button" data-toggle="modal" data-target="#{{{$prixod->id}}}" class="textpreviewbutton">
                                                <p class="hidden commentext" id="comment_text">
                                                    {{ $prixod->comments }}
                                                </p>
                                                <i class="fa fa-comments-o"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(count($prixod->photos)>0)
                                            <button class="shofotosmodal" type="button" data-toggle="modal" data-target="#{{{$prixod->id}}}">
                                                @foreach($prixod->photos as $photo)
                                                    <img src="/images/prixodi/{{$photo->photo_path}}" style="display:none;">
                                                @endforeach
                                                <i class="fa fa-camera"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="text-center" > <button class="editzarplata" type="button" value="{{ $prixod->id }}" data-toggle="modal" data-target="#{{{$prixod->id}}}"> <i class="fa fa-pencil-square-o"></i></button></td>

                                    <td class="text-center">
                                        <button value="{{$prixod->id}}" class="deletezarplata" type="button" data-toggle="modal" data-target="#{{{$prixod->id}}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $prixodi->links() }}
                </div>
            </div>
        </div>
    </div>
<!-- End Rasxod Body -->

<table class="table table-striped table-bordered table-hover" id="sample_1">
          <thead>
            <tr>
              <th style="text-align: center;">@Lang('news.admin_stt')</th>
              <th style="text-align: center;">Tên bến xe:</th>
              <th style="text-align: center;">Số điện thoại:</th>
              <th style="text-align: center;">Email:</th>
              <th style="text-align: center;">Thông tin bến xe:</th>
              <th style="text-align: center;">@Lang('admin.admin_func')</th>
            </tr>

          </thead>
          <tbody>
            @if(count($datas)>0) @foreach($datas as $key=>$st)
            <tr>
              <td style="text-align: center;">{{$key+1}}</td>
              <td style="text-align: center;">{{$st->name}}</td>
              <td style="text-align: center;">{{$st->phone}}</td>
              <td style="text-align: center;">{{$st->email}}</td>
              <td style="text-align: center;">{!! str_limit($st->infomation , $limit = 50, $end = '...') !!}</td>
              <td class="text-center"> 
                <a href="{{route('admin.station.show',$st->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                  <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}} 
                </a>
                <a href="{{route('admin.station.edit',$st->id)}}" class="btn btn-outline btn-circle green btn-sm purple">
                  <i class="fa fa-edit"></i>  {{trans('admin.admin_edit')}}
                </a>
                <form action="#" method="DELETE "  style="display: initial;">
                  <a href="#" type="submit" onclick="alertDel({{$st->id}})" class="btn btn-outline btn-circle dark btn-sm red">
                    <i class="fa fa-trash-o"></i> {{trans('admin.admin_del')}} 
                  </a>
                </form>

              </td>
            </tr>

            @endforeach @else
            <tr>
              <td colspan="6" class="text-center"> {{trans('admin.admin_no')}} </td>
            </tr>
            @endif

          </tbody>

        </table>
      {{$datas->links()}}
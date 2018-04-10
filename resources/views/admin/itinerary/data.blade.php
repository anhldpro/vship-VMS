  <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                  <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                  <th style="text-align: center;">Điểm Xuất Phát</th>
                  <th style="text-align: center;">Điểm Đến</th>
                  <th style="text-align: center;">Lộ Trình</th>
                  <th style="text-align: center;">Giá Vé</th>
                  <th style="text-align: center;">{{trans('admin.admin_func')}}</th>
                </tr>
                
            </thead>
            <tbody>
                      <?php $id=1 ?>
                      @if($data) @foreach($data as $key => $list)
        
                      <tr>
                        <td style="text-align: center;">{{$id++}}</td>
                        <td style="text-align: center;">{{ $list->departPlace }}</td>
                        <td style="text-align: center;">{{ $list->destination }}</td>
                        <td style="text-align: center;">{{ $list->slug }}</td>
                        <td style="text-align: center;">{{ $list->ticket_fare }}</td>
                  
                    <td class="text-center"> 
                        <a href="{{route('admin.itinerary.show',$list->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}} 
                        </a>
                        <a href="{{route('admin.itinerary.edit',$list['id'])}}" class="btn btn-outline btn-circle green btn-sm purple">
                            <i class="fa fa-edit"></i>  {{trans('admin.admin_edit')}}
                        </a>
                        <form action="#" method="DELETE" style="display: initial;">
                          <a href="#" type="submit" onclick="alertDel({{$list->id}})" class="btn btn-outline btn-circle dark btn-sm red">
                            <i class="fa fa-trash-o"></i> {{trans('admin.admin_del')}} 
                          </a>
                        </form>
                        
                    </td>
                   
                </tr>
                @endforeach @else
                  <tr>
                    <td colspan="4" class="text-center"> {{trans('admin.admin_no')}} </td>
                  </tr>
                @endif
             
            </tbody>
               
        </table>
        {{$data->links()}}

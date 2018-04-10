<table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
             
                <tr>
                  <th style="text-align: center;">{{trans('bookTicket.admin_stt')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_itinerary')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_car_company')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_date_start')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_customer')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_phone')}}</th> 
                  <th style="text-align: center;">{{trans('bookTicket.admin_email')}}</th> 
                  {{-- <th style="text-align: center;">{{trans('bookTicket.admin_code')}}</th> --}}
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">{{trans('admin.admin_func')}}</th>
                </tr>
                
            </thead>
            <tbody>
                     <?php $id=1 ?>
                      @if($datas) @foreach($datas as $key => $list)
        
                      <tr>
                        <td style="text-align: center;">{{$id++}}</td>
                        <td style="text-align: center;">{{ $list->itinerary['slug'] }}</td>
                        <td style="text-align: center;">{{  $list->car_company['name'] }}</td>
                        <td style="text-align: center;">{{ $list->date_start}}</td>
                        <td style="text-align: center;">{{ $list->name}}</td>
                        <td style="text-align: center;">{{ $list->phone}}</td>
                        <td style="text-align: center;">{{ $list->email}}</td>
                        {{-- <td style="text-align: center;">{{ $list->code}}</td> --}}
                        <td style="text-align: center;">@if( $list->status ==1)Đã thanh toán @elseif($list->status ==2)Chưa thanh toán @else Đã hủy @endif</td>
                        <td class="text-center"> 
                        <a href="{{route('admin.listBookTicket.show',$list['id'])}}" class="btn btn-outline btn-circle btn-sm blue">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}}  
                        </a>
                        <a href="{{route('admin.listBookTicket.edit',$list['id'])}}" class="btn btn-outline btn-circle green btn-sm purple">
                            <i class="fa fa-edit"></i> {{trans('admin.admin_edit')}}
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
                    <td colspan="4" class="text-center"> {{trans('admin.admin_no')}}</td>
                  </tr>
                @endif
             
            </tbody>
               
        </table>
        {{$datas->links()}}
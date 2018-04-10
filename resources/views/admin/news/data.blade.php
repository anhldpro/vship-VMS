<table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                  <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_title')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_describe')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_img')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_author')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_createat')}}</th>
                  <th style="text-align: center;">{{trans('admin.admin_func')}}</th>
                </tr>
            </thead>
            <tbody>
                      <?php $id=1 ?>
                      @if(count($datas)>0) @foreach($datas as $key => $list)
        
                      <tr>
                        <td style="text-align: center;">{{$id++}}</td>
                        <td style="text-align: center;">{{ $list->title }}</td>
                        <td style="text-align: center;">{{ str_limit($list->describe , $limit = 100, $end = '...') }}</td>
                        <td ><img src="{{URL::asset($list->images)}}"  class="img-responsive" style="width: 100px" /></td>
                        <td style="text-align: center;">{{ $list->user_id}}</td>
                        <td style="text-align: center;">{{ $list->created_at}}</td>
                    <td class="text-center"> 
                        <a href="{{route('admin.news.show',$list->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}} 
                        </a>
                        @permission('news-edit')
                        <a href="{{route('admin.news.edit',$list['id'])}}" class="btn btn-outline btn-circle green btn-sm purple">
                            <i class="fa fa-edit"></i>  {{trans('admin.admin_edit')}}
                        </a>
                        @endpermission
                        @permission('news-edit')
                        <form action="#" method="DELETE" style="display: initial;">
                          <a href="#" type="submit" onclick="alertDel({{$list->id}})" class="btn btn-outline btn-circle dark btn-sm red">
                            <i class="fa fa-trash-o"></i> {{trans('admin.admin_del')}} 
                          </a>
                        </form>
                        @endpermission
                        
                    </td>
                   
                </tr>
                @endforeach @else
                  <tr>
                    <td colspan="7" class="text-center"> {{trans('admin.admin_no')}} </td>
                  </tr>
                @endif
             
            </tbody>
               
        </table>
        {{$datas->links()}}
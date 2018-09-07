@extends('layouts.app')

@if (isset($client->id)) 
@section('breadcrumbs')
{{ Breadcrumbs::render('client.edit', $client) }}
@endsection
@endif

@section('content')
<div class="page-container">
        <form id="clientForm" action="" method="post">
            {{ csrf_field() }}
            <table class="table table-border table-bordered table-bg">
                <tbody>
                    <tr class="text-c">
                        <th colspan="2" style="text-align:center">客户资料</th>
                        <th>险种</th>
                        <th>保额</th>
                        <th>保费</th>
                        <th>车损不计免赔</th>
                        <td><input class="input-text" name="insure_damage_nd" id="insure_damage_nd" type="text" value="{{ $client->insure_damage_nd }}" placeholder="车损不计免赔保费"/></td>
                        <th>上年坐席</th>
                        <td>{{ $client->prev_service }}</td>
                    </tr>
                    <tr class="text-c">
                        <th><span class="c-red">*</span>客户姓名</th>
                        <td class="formControls">
                                    <input class="input-text" name="name" required id="name" type="text" value="{{ $client->name }}" placeholder="输入客户姓名"/></td>
                            
                        <th>车辆损失险</th>
                        <td><input class="input-text" name="insure_damage_limit" id="insure_damage_limit" type="text" value="{{ $client->insure_damage_limit }}" placeholder="输入车损险"/></td>
                        <td><input class="input-text" name="insure_damage_fee" id="insure_damage_fee" type="text" value="{{ $client->insure_damage_fee }}" placeholder="损失险保费"/></td>
                        <th>三者不计免赔</th>
                        <td><input class="input-text" name="insure_third_nd" id="insure_third_nd" type="text" value="{{ $client->insure_third_nd }}" placeholder="三者不计免赔保费"/></td>
                        <th>所属坐席</th>
                        <td>
                                <select class="input-text" name="belong_service" id="belong_service">
                                        <option value="0" >未选</option>
                                        @foreach (App\User::all() as $user)
                                            <option value="{{ $user->id }}" {{ $client->belong_service == $user->id ? 'selected="selected"' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                        </td>
                    </tr>
                    <tr class="text-c">
                        <th><span class="c-red">*</span>电话1</th>
                        <td class="formControls">
                            <input class="input-text" name="phone1" required id="phone1" type="text" value="{{ $client->phone1 }}" style="width:100%" placeholder="输入电话1"/>
                        </td>
                        <th>三者责任险</th>
                        <td>
                            <select class="input-text" name="insure_third_limit" id="insure_third_limit">
                                <option value="0" >未投保</option>
                                @foreach (setting('insure_third_limits') as $item)
                                    <option value="{{ $item }}" {{ $client->insure_third_limit == $item ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="input-text" name="insure_third_fee" id="insure_third_fee" type="text" value="{{ $client->insure_third_fee }}" placeholder="三者险保费"/></td>
                        <th>盗抢不计免赔</th>
                        <td><input class="input-text" name="insure_loss_nd" id="insure_loss_nd" type="text" value="{{ $client->insure_loss_nd }}" placeholder="盗抢不计免赔保费"/></td>
                        <th>行驶证车主</th>
                        <td><input class="input-text" name="car_owner" id="car_owner" type="text" value="{{ $client->car_owner }}" placeholder="输入行驶证车主"/></td>
                    </tr>
                    <tr class="text-c">
                        <th>电话2</th>
                        <td>
                            <input class="input-text" name="phone2" id="phone2" type="text" value="{{ $client->phone2 }}" style="width:100%" placeholder="输入电话2"/>
                        </td>
                        <th>全车盗抢险</th>
                        <td><input class="input-text" name="insure_loss_limit" id="insure_loss_limit" type="text" value="{{ $client->insure_loss_limit }}" placeholder="输入盗抢险"/></td>
                        <td><input class="input-text" name="insure_loss_fee" id="insure_loss_fee" type="text" value="{{ $client->insure_loss_fee }}" placeholder="盗抢险保费"/></td>
                        <th>附加不计免赔</th>
                        <td><input class="input-text" name="insure_add_nd" id="insure_add_nd"type="text" value="{{ $client->insure_add_nd }}" placeholder="附加不计免赔保费"/></td>
                        <th>投保人</th>
                        <td><input class="input-text" name="insure_by" id="insure_by" type="text" value="{{ $client->insure_by }}" placeholder="输入投保人"/></td>
                    </tr>
                    <tr class="text-c">
                        <th><span class="c-red">*</span>车牌</th>
                        <td class="formControls"><input class="input-text" required name="plate_number" id="plate_number"   type="text" value="{{ $client->plate_number }}" placeholder="输入车牌"/></td>
                        <th>司机位</th>
                        <td><input class="input-text" name="insure_driver_limit" id="insure_driver_limit" type="text" value="{{ $client->insure_driver_limit }}" placeholder="输入司机位"/></td>
                        <td><input class="input-text" name="insure_driver_fee" id="insure_driver_fee" type="text" value="{{ $client->insure_driver_fee }}" placeholder="司机位保费"/></td>
                        <th>交强险</th>
                        <td><input class="input-text" name="forced_insure" id="forced_insure" type="text" value="{{ $client->forced_insure }}" placeholder="输入交强险"/></td>
                        <th>发票信息</th>
                        <td><input class="input-text" name="invoice" id="invoice" type="text" value="{{ $client->invoice }}" placeholder="输入发票信息"/></td>
                    </tr>
                    <tr class="text-c">
                        <th>车型</th>
                        <td><input class="input-text" name="car" id="car" type="text" value="{{ $client->car }}" placeholder="输入车型"/></td>
                        <th>乘客位</th>
                        <td><input class="input-text" name="insure_passengers_limit" id="insure_passengers_limit" type="text" value="{{ $client->insure_passengers_limit }}" placeholder="输入乘客位"/></td>
                        <td><input class="input-text" name="insure_passengers_fee" id="insure_passengers_fee" type="text" value="{{ $client->insure_passengers_fee }}" placeholder="乘客位保费"/></td>
                        <th>车船税</th>
                        <td><input class="input-text" name="vvt" id="vvt" type="text" value="{{ $client->vvt }}" placeholder="输入车船税"/></td>
                        <th>上年承保日期</th>
                        <td id="edff" ><input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="prev_insure_create_at" id="prev_insure_create_at" value="{{ $client->prev_insure_create_at ? $client->prev_insure_create_at->toDateString() : '' }}" class="input-text Wdate"></td>
                    </tr>
                    <tr class="text-c">
                        <th>发动机号</th>
                        <td><input class="input-text" name="engine_number" id="engine_number" type="text" value="{{ $client->engine_number }}" placeholder="输入发动机号"/></td>
                        <th>自燃险</th>
                        <td><input class="input-text" name="insure_self_ignite_limit" id="insure_self_ignite_limit" type="text" value="{{ $client->insure_self_ignite_limit }}" placeholder="输入自燃险"/></td>
                        <td><input class="input-text" name="insure_self_ignite_fee" id="insure_self_ignite_fee" type="text" value="{{ $client->insure_self_ignite_fee }}" placeholder="自燃险保费"/></td>
                        <th>商业险</th>
                        <td><input class="input-text" name="commercial_insure" id="commercial_insure" type="text" value="{{ $client->commercial_insure }}" placeholder="输入商业险"/></td>
                        <th>上年商业险保险费</th>
                        <td>
                            <input class="input-text" name="prev_commercial_insure" id="prev_commercial_insure" type="text" value="{{ $client->prev_commercial_insure }}" placeholder="输入上年商业险保费"/>
                        </td>
                    </tr>
                    <tr class="text-c">
                        <th>车架号</th>
                        <td><input class="input-text" name="vin" id="vin" type="text" value="{{ $client->vin }}" placeholder="输入车架号"/></td>
                        <th>车辆划痕险</th>
                        <td>
                            <select class="input-text" style="width:100%" name="insure_scratch_limit" id="insure_scratch_limit">
                                <option value="0" >未投保</option>
                                @foreach (setting('insure_scratch_limits') as $item)
                                    <option value="{{ $item }}" {{ $client->insure_scratch_limit == $item ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="input-text" name="insure_scratch_fee" id="insure_scratch_fee" type="text" value="{{ $client->insure_scratch_fee }}" placeholder="划痕险保费"/></td>
                        <th id="abc" >状态</th>
                        <td id="edf" ><select class="input-text" style="width:100%" name="status" id="status">
                                <option value="0" >未选</option>
                                @foreach (setting('client_status') as $item)
                                    <option value="{{ $item }}" {{ $client->status == $item ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select></td>
                        <th>预约时间</th>
                        <td id="edff" ><input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="order_at" id="order_at" value="{{ $client->order_at ? $client->order_at->toDateString() : '' }}" class="input-text Wdate"></td>
                    </tr>
                    <tr class="text-c">
                        <th>批次</th>
                        <td><input class="input-text" name="from_batch" id="from_batch" type="text" value="{{ $client->from_batch }}" placeholder="输入批次"/></td>
                        <th>玻璃险</th>
                        <td>
                            <select class="input-text" style="width:100%" name="insure_glass_limit" id="insure_glass_limit">
                                <option value="0" >未投保</option>
                                @foreach (setting('insure_glass_limits') as $item)
                                    <option value="{{ $item }}" {{ $client->insure_glass_limit == $item ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="input-text" name="insure_glass_fee" id="insure_glass_fee" type="text" value="{{ $client->insure_glass_fee }}" placeholder="玻璃险保费"/></td>
                        <th id="abcf" >保险到期日</th>
                        <td id="edff" ><input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="insure_end_at" id="insure_end_at" value="{{ $client->insure_end_at ? $client->insure_end_at->toDateString() : '' }}" class="input-text Wdate"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="text-c">
                        <th><span class="c-red">*</span>初次登记</th>
                        <td class="formControls">
                            <input type="text" required onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="created_at" id="created_at" value="{{ $client->created_at ? $client->created_at->toDateString() : Carbon::now()->toDateString() }}" class="input-text Wdate">
                        </td>
                        <th>涉水险</th>
                        <td><input class="input-text" name="insure_wading_limit" id="insure_wading_limit" type="text" value="{{ $client->insure_wading_limit }}" placeholder="输入涉水险保费"/></td>
                        <td></td>
                        <th>保单类型</th>
                        <td>
                            <select class="input-text" name="insure_type" id="insure_type">
                                <option value="0" >未选</option>
                                @foreach (setting('insure_types') as $item)
                                    <option value="{{ $item }}" {{ $client->insure_type == $item ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <th>出险次数</th>
                        <td><input class="input-text" name="risk_times" id="risk_times" type="text" value="{{ $client->risk_times }}" placeholder="输入出险次数"/></td>
                    </tr>
                    <tr class="text-c">
                        <th><span class="c-red">*</span>保险起保</th>
                        <td class="formControls">
                            <input type="text" required onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="insure_created_at" id="insure_created_at" value="{{ $client->insure_created_at ? $client->insure_created_at->toDateString() : Carbon::now()->toDateString() }}" class="input-text Wdate">
                        </td>
                        <th>第三方特约</th>
                        <td><input class="input-text" name="insure_thrid_contributing_fee" id="insure_thrid_contributing_fee" type="text" value="{{ $client->insure_thrid_contributing_fee }}" placeholder="输入第三方特约"/></td>
                        <td></td>
                        <th>录入渠道</th>
                        <td>
                            <select class="input-text" name="create_channel" id="create_channel">
                                <option value="0" >未选</option>
                                @foreach (setting('create_channels') as $item)
                                    <option value="{{ $item }}" {{ $client->create_channel == $item ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <th>商业险投保</th>
                        <td>{{ $client->commercial_insure_time ? $client->commercial_insure_time->toDateString() : '' }}</td>
                    </tr>
                    <tr class="text-c">
                        <th>身份证</th>
                        <td><input class="input-text" name="id_card" id="id_card" type="text" value="{{ $client->id_card }}" maxlength="18" placeholder="输入18位身份证"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>送单时间</th>
                        <td>
                            <input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="insure_sent_at" id="insure_sent_at" value="{{ $client->insure_sent_at ? $client->insure_sent_at->toDateString() : '' }}" class="input-text Wdate" style="width:100%;">
                        </td>
                        <th>交强险投保</th>
                        <td>{{ $client->forced_insure_time ? $client->forced_insure_time->toDateString() : '' }}</td>
                    </tr>
                    <tr class="text-c">
                        <th>客户地址</th>
                        <td colspan="4"><input class="input-text" name="address" id="address" type="text" value="{{ $client->address }}" style="width:100%;" placeholder="输入客户地址"/></td>
                        <th>送单地址</th>
                        <td colspan="3"><input class="input-text" name="send_address" id="send_address" type="text" value="{{ $client->send_address }}" placeholder="输入送单地址"/></td>
                    </tr>
                </tbody>
            </table>
             
             
            <div style="position: fixed;
                        bottom: 100px;
                        right: 2px;
                        border-radius:5px; 
                        height:20px; 
                        line-height:40px; 
                        text-align:center; 
                        ">
                @if (!empty($client->id))
                    <button type="button" class="btn btn-primary radius" id="service-trace-button">追踪</button>
                    <br/>
                @endif
                @if (auth()->user()->can('编辑客户'))
                    <button type="submit" class="btn btn-success radius" id="admin-role-save">保存</button>
                    <br/> 
                @endif
                <button type="button" onClick="javascript:history.go(-1);" class="btn btn-default radius">返回</button>
                <br/>
                 
            </div>
        </form>
        {!! $trace !!}
    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('/lib/My97DatePicker/4.8/WdatePicker.js') }}"></script> 

    <script>
        $.validator.setDefaults({
            submitHandler: function() {
                $.ajax({
                    type: "{{ isset($client->id) ? 'PUT' : 'POST' }}",
                    url: "{{ isset($client->id) ? route('client.update', $client->id) : route('client.store') }}",
                    dataType: 'json',
                    data: $("#clientForm").serialize(),
                    success: function(data) {
                        window.history.go(-1);
                    },
                    error:function(error) {
                        console.log(error)
                    },
                });		
            }
        });
        var traceLayerIndex;
        $().ready(function() {
            $("#clientForm").validate();
            $("#service-trace-button").on('click', function() {
                traceLayerIndex = layer.open({
                    type: 2,
                    title: '追踪客户',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['480px', '510px'],
                    content: '{{ isset($client->id) ? route('trace.create', ['client_id' => $client->id]) : '' }}' //iframe的url
                }); 
            })
        })
    </script>
@endsection